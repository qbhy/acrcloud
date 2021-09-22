<?php

namespace Qbhy\AcrCloud\Resources;

use Qbhy\AcrCloud\Api;

class Identification extends Api
{
    protected $dataType = 'audio';

    /**
     * @param $sample '文件
     * @return array|null
     */
    public function query($sample, $title)
    {
        return $this->use('music')->app->decodeResponse(
            $this->getHttp()->upload('/v1/identify', [], ['sample' => $sample], [
                'data_type'    => $this->dataType,
                'sample_bytes' => filesize($sample),
                'title'        => $title,
            ])
        );
    }

    public function use($project)
    {
        $config = $this->app->getConfig();

        if (empty($config['project'][$project])) {
            throw new \InvalidArgumentException("project {$project} not defined");
        }

        $this->app->setConfig(array_merge($config, [
            'use' => $project,
        ]));

        return $this;
    }
}