<?php

namespace Qbhy\AcrCloud;

class Http extends \Hanson\Foundation\Http
{
    private $app;

    private $signatureVersion = '1';

    private $dataType;

    /**
     * Http constructor.
     */
    public function __construct(AcrCloud $app, $dataType)
    {
        $this->app      = $app;
        $this->dataType = $dataType;
    }

    public function getDataTypeString()
    {
        return $this->dataType ? $this->dataType . "\n" : '';
    }

    public function request($method, $url, $options = [])
    {
        $method    = strtoupper($method);
        $accessKey = $this->app->getConfig('console_access_key');
        $secretKey = $this->app->getConfig('console_secret_key');
        $timestamp        = time();
        $uri              = $url;
        $signatureVersion = $this->signatureVersion;
        $signatureString  = $method . "\n" . $uri . "\n" . $accessKey . "\n" . $this->getDataTypeString() . $signatureVersion . "\n" . $timestamp;
        $signature        = base64_encode(hash_hmac("sha1", $signatureString, $secretKey, true));

        $options['headers'] = array_merge($options['headers'] ?? [], [
            'access-key'        => $accessKey,
            'signature'         => $signature,
            'signature-version' => $signatureVersion,
            'timestamp'         => $timestamp,
        ]);

        return parent::request($method, $url, $options); // TODO: Change the autogenerated stub
    }

    public function delete($url, array $options = [])
    {
        return $this->request('DELETE', $url, $options);
    }
}