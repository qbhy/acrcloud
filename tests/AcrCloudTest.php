<?php

use PHPUnit\Framework\TestCase;
use Qbhy\AcrCloud\AcrCloud;

class AcrCloudTest extends TestCase
{
    public function testExample()
    {
        $app = new AcrCloud($config = [
            'debug' => true,
            // console API
            'console_host' => 'https://cn-api.acrcloud.com',
            'console_access_key' => env('ACR_CONSOLE_ACCESS_KEY'),
            'console_secret_key' => env('ACR_CONSOLE_SECRET_KEY'),

            'use' => 'music',

            // identification API
            'project' => [
                'music' => [
                    'host' => env('ACR_MUSIC_HOST', 'https://identify-cn-north-1.acrcloud.com'),
                    'access_key' => env('ACR_MUSIC_ACCESS_KEY'),
                    'secret_key' => env('ACR_MUSIC_SECRET_KEY'),
                ]
            ]
        ]);

        dump($config);

        $voice = 'https://huliaoappcdn.vwvvwv.com/minapp/2020/03/24/202003242251552834510292wechatapp.mp3';
        $title = '不再联系';

        if (is_string($voice)) {
            file_put_contents($filename = sys_get_temp_dir() . md5($voice), file_get_contents($voice));
        }

        $result = $app->identification->query($filename, $title);

        @unlink($filename);

        $this->assertTrue(is_array($result));
    }
}
