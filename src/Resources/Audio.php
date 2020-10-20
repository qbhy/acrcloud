<?php

namespace Qbhy\AcrCloud\Resources;

use Qbhy\AcrCloud\Api;

class Audio extends Api
{
    /**
     * 上传音频
     * @param        $file
     * @param        $id
     * @param        $bucket
     * @param        $title
     * @param array  $extras
     * @param string $dataType
     * @return array
     */
    public function upload($file, $id, $bucket, $title, $extras = [], $dataType = 'audio')
    {
        return $this->app->decodeResponse(
            $this->getHttp()->upload('/v1/audios', [], [
                'audio_file' => $file,
            ], [
                'bucket_name'  => $bucket,
                'audio_id'     => $id,
                'data_type'    => $dataType,
                'title'        => $title,
                'custom_key'   => array_keys($extras),
                'custom_value' => array_values($extras),
            ])
        );
    }

    /**
     * GET /v1/audios?bucket_name=:bucket_name&page=1
     * @param     $bucket
     * @param int $page
     * @return array
     * @throws \Hanson\Foundation\Exception\HttpException
     */
    public function getAll($bucket, $page = 1)
    {
        return $this->app->decodeResponse(
            $this->getHttp()->get('/v1/audios', [
                'bucket_name' => $bucket,
                'page'        => $page
            ])
        );
    }

    /**
     * GET /v1/audios/:acr_id
     * @param $acrId
     * @return array
     * @throws \Hanson\Foundation\Exception\HttpException
     */
    public function find($acrId)
    {
        return $this->app->decodeResponse(
            $this->getHttp()->get('/v1/audios/' . $acrId)
        );
    }

    /**
     * DELETE /v1/audios/:acr_id
     * @param $acrId
     * @return array
     * @throws \Hanson\Foundation\Exception\HttpException
     */
    public function delete($acrId)
    {
        return $this->app->decodeResponse(
            $this->getHttp()->delete('/v1/audios/' . $acrId)
        );
    }
}