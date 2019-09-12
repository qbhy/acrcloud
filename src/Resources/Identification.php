<?php

namespace Qbhy\AcrCloud\Resources;

use http\Exception\InvalidArgumentException;
use Qbhy\AcrCloud\Api;

class Identification extends Api
{
    protected $dataType = 'audio';

    /**
     * @param $sample '文件
     * @return array|null
     */
    public function query($sample)
    {
        return self::decodeResponse(
            $this->getHttp()->upload('/v1/identify', [], ['sample' => $sample], ['data_type' => $this->dataType])
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

    public function getHost()
    {
        $config = $this->app->getConfig();
        return $config['project'][$config['use']]['host'];
    }

    public function getAccessKey()
    {
        $config = $this->app->getConfig();
        return $config['project'][$config['use']]['access_key'];
    }

    public function getSecretKey()
    {
        $config = $this->app->getConfig();
        return $config['project'][$config['use']]['secret_key'];
    }
}