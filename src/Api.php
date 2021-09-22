<?php

namespace Qbhy\AcrCloud;

use GuzzleHttp\Client;
use Hanson\Foundation\AbstractAPI;
use Hanson\Foundation\Foundation;
use Psr\Http\Message\ResponseInterface;

/**
 * Class Api
 *
 * @property-read AcrCloud $app
 * @package Qbhy\AcrCloud
 */
abstract class Api extends AbstractAPI
{
    protected $app;

    public function __construct(AcrCloud $app)
    {
        $this->app = $app;
    }

    protected $dataType;

    public function getDataType()
    {
        return $this->dataType;
    }

    public function getHttp()
    {
        return $this->app->http;
    }
}