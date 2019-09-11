<?php

namespace Qbhy\AcrCloud\Resources;

use Qbhy\AcrCloud\Api;

class Bucket extends Api
{
    /**
     * @param        $name
     * @param        $scale
     * @param string $type
     * @param string $contentType
     * @param string $region
     * @return array|null
     */
    public function add($name, $scale, $type = 'File', $contentType = 'Music', $region = 'ap-southeast-1')
    {
        return self::decodeResponse(
            $this->getHttp()->post('/v1/buckets', [
                'name'         => $name,
                'scale'        => $scale,
                'type'         => $type,
                'region'       => $region,
                'content_type' => $contentType,
            ])
        );
    }

    /**
     * @return array|null
     * @throws \Hanson\Foundation\Exception\HttpException
     */
    public function getAll()
    {
        return self::decodeResponse($this->getHttp()->get('/v1/buckets'));
    }

    /**
     * @param $bucket
     * @return array|null
     * @throws \Hanson\Foundation\Exception\HttpException
     */
    public function delete($bucket)
    {
        return self::decodeResponse($this->getHttp()->delete('/v1/buckets/' . $bucket));
    }
}