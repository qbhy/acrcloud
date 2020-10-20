<?php

namespace Qbhy\AcrCloud\Resources;

use Qbhy\AcrCloud\Api;

class Monitor extends Api
{
    /**
     * @param        $url
     * @param        $stream
     * @param        $project
     * @param bool   $realtime
     * @param bool   $record
     * @param string $region
     * @return array|null
     */
    public function add($url, $stream, $project, bool $realtime, bool $record, $region = 'ap-southeast-1')
    {
        return $this->app->decodeResponse(
            $this->getHttp()->post('/v1/monitor-streams', [
                'url'          => $url,
                'stream_name'  => $stream,
                'project_name' => $project,
                'realtime'     => (int)$realtime,
                'record'       => (int)$record,
                'region'       => $region,
            ])
        );
    }

    /**
     * @param        $id
     * @param        $url
     * @param        $stream
     * @param bool   $realtime
     * @param bool   $record
     * @param string $region
     * @return array|null
     */
    public function update($id, $url, $stream, bool $realtime, bool $record, $region = 'ap-southeast-1')
    {
        return $this->app->decodeResponse(
            $this->getHttp()->post('/v1/monitor-streams/' . $id, [
                'url'         => $url,
                'stream_name' => $stream,
                'realtime'    => (int)$realtime,
                'record'      => (int)$record,
                'region'      => $region,
            ])
        );
    }

    /**
     * @param $project
     * @return array|null
     * @throws \Hanson\Foundation\Exception\HttpException
     */
    public function getAll($project)
    {
        return $this->app->decodeResponse(
            $this->getHttp()->get('/v1/monitor-streams', ['project_name' => $project])
        );
    }

    /**
     * @param $id
     * @return array|null
     * @throws \Hanson\Foundation\Exception\HttpException
     */
    public function find($id)
    {
        return $this->app->decodeResponse(
            $this->getHttp()->get('/v1/monitor-streams/' . $id)
        );
    }

    /**
     * @param $id
     * @return array|null
     */
    public function delete($id)
    {
        return $this->app->decodeResponse(
            $this->getHttp()->delete('/v1/monitor-streams/' . $id)
        );
    }

    /**
     * @param $id
     * @param $action 'action in [pause,restart]
     * @return array|null
     */
    public function action($id, $action)
    {
        return $this->app->decodeResponse(
            $this->getHttp()->request('PUT', '/v1/monitor-streams/' . $id . '/' . $action)
        );
    }
}