<?php

namespace Qbhy\AcrCloud;

use GuzzleHttp\RequestOptions;

/**
 * Class Http
 *
 * @property-read AcrCloud $app
 * @package Qbhy\AcrCloud
 */
class Http extends \Hanson\Foundation\Http
{
    protected $app;

    private $signatureVersion = '1';

    /**
     * @param AcrCloud $app
     */
    public function __construct(AcrCloud $app)
    {
        $this->app = $app;
    }

    public function getDataTypeString($dataType = null)
    {
        return $dataType ? $dataType . "\n" : '';
    }

    public function parseDataType(array $options)
    {
        if (isset(($options[RequestOptions::QUERY] ?? [])['data_type'])) {
            return $options[RequestOptions::QUERY]['data_type'];
        }
        if (isset(($options[RequestOptions::FORM_PARAMS] ?? [])['data_type'])) {
            return $options[RequestOptions::FORM_PARAMS]['data_type'];
        }
        if (isset(($options[RequestOptions::JSON] ?? [])['data_type'])) {
            return $options[RequestOptions::JSON]['data_type'];
        }
        return (collect($options['multipart'])->where('name', 'data_type')->first() ?? [])['contents'] ?? null;
    }

    public function request($method, $url, $options = [])
    {
        $method = strtoupper($method);

        $accessKey = $this->app->getAccessKey();
        $secretKey = $this->app->getSecretKey();
        $host = $this->app->getHost();

        $timestamp = time();
        $uri = $url;
        $signatureVersion = $this->signatureVersion;
        $dataType = $this->parseDataType($options);
        $signatureString = $method . "\n" . $uri . "\n" . $accessKey . "\n" . $this->getDataTypeString($dataType) . $signatureVersion . "\n" . $timestamp;
        $signature = base64_encode(hash_hmac("sha1", $signatureString, $secretKey, true));

        $authMetadata = [
            'access-key' => $accessKey,
            'signature' => $signature,
            'signature-version' => $signatureVersion,
            'timestamp' => $timestamp,
        ];


        if ($dataType) {
            $authMetadata = [
                "access_key" => $accessKey,
                "signature" => $signature,
                "signature_version" => $signatureVersion,
                "timestamp" => $timestamp
            ];

            foreach ($authMetadata as $name => $contents) {
                $options['multipart'][] = compact('name', 'contents');
            }
        } else {
            $options['headers'] = array_merge($options['headers'] ?? [], $authMetadata);
        }


        return parent::request($method, $host . $url, $options);
    }

    public function delete($url, array $options = [])
    {
        return $this->request('DELETE', $url, $options);
    }
}