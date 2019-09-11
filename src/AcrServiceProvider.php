<?php

namespace Qbhy\AcrCloud;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Qbhy\AcrCloud\Resources\Audio;
use Qbhy\AcrCloud\Resources\Bucket;
use Qbhy\AcrCloud\Resources\Channel;
use Qbhy\AcrCloud\Resources\ChannelPlayback;
use Qbhy\AcrCloud\Resources\Identification;
use Qbhy\AcrCloud\Resources\Monitor;
use Qbhy\AcrCloud\Resources\Project;

class AcrServiceProvider implements ServiceProviderInterface
{
    public function register(Container $pimple)
    {
        $pimple['identification']   = function (AcrCloud $acrCloud) {
            return new Identification($acrCloud);
        };
        $pimple['audio']            = function (AcrCloud $acrCloud) {
            return new Audio($acrCloud);
        };
        $pimple['channel']          = function (AcrCloud $acrCloud) {
            return new Channel($acrCloud);
        };
        $pimple['channel_playback'] = function (AcrCloud $acrCloud) {
            return new ChannelPlayback($acrCloud);
        };
        $pimple['bucket']           = function (AcrCloud $acrCloud) {
            return new Bucket($acrCloud);
        };
        $pimple['monitor']          = function (AcrCloud $acrCloud) {
            return new Monitor($acrCloud);
        };
        $pimple['project']          = function (AcrCloud $acrCloud) {
            return new Project($acrCloud);
        };
    }
}