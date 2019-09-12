<?php

namespace Qbhy\AcrCloud;

use GuzzleHttp\Client;
use Hanson\Foundation\AbstractAPI;
use Psr\Http\Message\ResponseInterface;

abstract class Api extends AbstractAPI
{
    protected $app;

    /**
     * @var Http
     */
    protected $http;

    protected $dataType;

    public function __construct(AcrCloud $app)
    {
        $this->app = $app;
    }

    public function getDataType()
    {
        return $this->dataType;
    }

    public function getHttp()
    {
        return $this->http ?? $this->http = (new Http($this));
    }

    /**
     * @param ResponseInterface $response
     * @return array|null
     */
    public static function decodeResponse(ResponseInterface $response)
    {
        return @json_decode($response->getBody()->__toString(), true);
    }

    public function getHost()
    {
        return $this->app->getConfig('console_host');
    }

    public function getAccessKey()
    {
        return $this->app->getConfig('console_access_key');
    }

    public function getSecretKey()
    {
        return $this->app->getConfig('console_secret_key');
    }
}