# acrcloud
acrcloud php sdk,支持laravel/lumen

## 安装 - install
* composer 安装
```bash
$ composer require 96qbhy/acrcloud
```

## 使用 - usage
```php
<?php
use Qbhy\AcrCloud\AcrCloud;

require 'vendor/autoload.php';

$config = [
    'debug'=>true,
    'host'       => 'https://cn-api.acrcloud.com',
    'access_key' => 'ACR_ACCESS_KEY',
    'secret_key' => 'ACR_SECRET_KEY',
];

$acr = new AcrCloud($config);

dump($acr->bucket->getAll());
dump($acr->audio->getAll('your_bucket_name'));
dump($acr->channel->getAll('your_bucket_name'));
```


## 关于 - about
author: 96qbhy@gmail.com