<?php

namespace Qbhy\AcrCloud\Resources;

use Qbhy\AcrCloud\Api;

class Project extends Api
{
    /**
     * @param        $type
     * @param array  $buckets
     * @param        $audioType
     * @param        $externalId
     * @param string $region
     * @return array|null
     */
    public function add($type, array $buckets, $audioType, $externalId, $region = 'ap-southeast-1')
    {
        return self::decodeResponse(
            $this->getHttp()->json('/v1/projects', [
                'type'        => $type,
                'buckets'     => $buckets,
                'audio_type'  => $audioType,
                'external_id' => $externalId,
                'region'      => $region,
            ])
        );
    }

    /**
     * @param       $name
     * @param array $buckets
     * @return array|null
     */
    public function update($name, array $buckets)
    {
        return self::decodeResponse(
            $this->getHttp()->json('/v1/projects/' . $name, [
                'buckets'     => $buckets,
            ])
        );
    }

    /**
     * @param       $name
     * @return array|null
     */
    public function delete($name)
    {
        return self::decodeResponse(
            $this->getHttp()->delete('/v1/projects/' . $name)
        );
    }
}