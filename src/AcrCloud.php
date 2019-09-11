<?php

namespace Qbhy\AcrCloud;

use Hanson\Foundation\Foundation;
use Qbhy\AcrCloud\Resources\Audio;
use Qbhy\AcrCloud\Resources\Bucket;
use Qbhy\AcrCloud\Resources\Channel;
use Qbhy\AcrCloud\Resources\ChannelPlayback;
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
 *
 * @package Qbhy\AcrCloud
 */
class AcrCloud extends Foundation
{
    protected $providers = [
        AcrServiceProvider::class,
    ];
}