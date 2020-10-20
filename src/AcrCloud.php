<?php

namespace Qbhy\AcrCloud;

use Hanson\Foundation\Foundation;
use Psr\Http\Message\ResponseInterface;
use Qbhy\AcrCloud\Resources\Audio;
use Qbhy\AcrCloud\Resources\Bucket;
use Qbhy\AcrCloud\Resources\Channel;
use Qbhy\AcrCloud\Resources\ChannelPlayback;
use Qbhy\AcrCloud\Resources\Identification;
use Qbhy\AcrCloud\Resources\Monitor;
use Qbhy\AcrCloud\Resources\Project;

/**
 * Class AcrCloud
 *
 * @property-read Audio           $audio
 * @property-read Bucket          $bucket
 * @property-read Channel         $channel
 * @property-read ChannelPlayback $channel_playback
 * @property-read Monitor         $monitor
 * @property-read Project         $project
 * @property-read Identification  $identification
 *
 * @package Qbhy\AcrCloud
 */
class AcrCloud extends Foundation
{
    protected $providers = [
        AcrServiceProvider::class,
    ];

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