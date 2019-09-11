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
    public function query($sample)
    {
        return self::decodeResponse(
            $this->getHttp()->upload('/v1/identify', [], ['sample' => $sample,], ['data_type' => $this->dataType])
        );
    }
}