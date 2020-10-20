<?php

namespace Qbhy\AcrCloud;

use GuzzleHttp\Client;
use Hanson\Foundation\AbstractAPI;
use Psr\Http\Message\ResponseInterface;

/**
 * Class Api
 *
 * @property-read AcrCloud $app
 * @package Qbhy\AcrCloud
 */
abstract class Api extends AbstractAPI
{
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