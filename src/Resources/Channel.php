<?php

namespace Qbhy\AcrCloud\Resources;

use Qbhy\AcrCloud\Api;

class Channel extends Api
{
    /**
     * @param       $title
     * @param       $channelId
     * @param       $bucket
     * @param array $extras
     * @return array|null
     */
    public function upload($title, $channelId, $bucket, $extras = [])
    {
        return $this->app->decodeResponse(
            $this->getHttp()->post('/v1/channels/', [
                'channel_id'   => $channelId,
                'title'        => $title,
                'bucket_name'  => $bucket,
                'custom_key'   => array_keys($extras),
                'custom_value' => array_values($extras),
            ])
        );
    }

    /**
     * @param $acrId
     * @return array|null
     * @throws \Hanson\Foundation\Exception\HttpException
     */
    public function find($acrId)
    {
        return $this->app->decodeResponse(
            $this->getHttp()->get('/v1/channels/' . $acrId)
        );
    }

    /**
     * @param $acrId
     * @return array|null
     */
    public function delete($acrId)
    {
        return $this->app->decodeResponse(
            $this->getHttp()->delete('/v1/channels/' . $acrId)
        );
    }

    /**
     * @param $bucket
     * @return array|null
     * @throws \Hanson\Foundation\Exception\HttpException
     */
    public function getAll($bucket)
    {
        return $this->app->decodeResponse(
            $this->getHttp()->get('/v1/channels/' . $bucket . '/channels')
        );
    }
}