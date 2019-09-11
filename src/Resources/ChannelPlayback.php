<?php

namespace Qbhy\AcrCloud\Resources;

use Qbhy\AcrCloud\Api;

class ChannelPlayback extends Api
{
    /**
     * @param $channel
     * @param $time
     * @param $bucket
     * @return array|null
     */
    public function upload($channel, $time, $bucket)
    {
        return self::decodeResponse(
            $this->getHttp()->post('/v1/channel-timeshift', [
                'channel_id' => $channel,
                'time'       => $time,
                'bucket'     => $bucket,
            ])
        );
    }

    /**
     * @param $channel
     * @return array|null
     * @throws \Hanson\Foundation\Exception\HttpException
     */
    public function find($channel)
    {
        return self::decodeResponse(
            $this->getHttp()->get('/v1/channel-timeshift/' . $channel)
        );
    }

    /**
     * @param $stream
     * @return array|null
     * @throws \Hanson\Foundation\Exception\HttpException
     */
    public function findTimeShift($stream)
    {
        return self::decodeResponse(
            $this->getHttp()->get('/v2/lost-timeshift/' . $stream)
        );
    }

    /**
     * @param $channel
     * @return array|null
     */
    public function delete($channel)
    {
        return self::decodeResponse(
            $this->getHttp()->delete('/v1/channel-timeshift/' . $channel)
        );
    }

    /**
     * @param $bucket
     * @return array|null
     * @throws \Hanson\Foundation\Exception\HttpException
     */
    public function getAll($bucket)
    {
        return self::decodeResponse(
            $this->getHttp()->get("/v1/buckets/{$bucket}/channels")
        );
    }
}