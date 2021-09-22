<?php

use Dotenv\Dotenv;
use Dotenv\Environment\Adapter\EnvConstAdapter;
use Dotenv\Environment\Adapter\PutenvAdapter;
use Dotenv\Environment\Adapter\ServerConstAdapter;
use Dotenv\Environment\DotenvFactory;

require_once __DIR__ . '/../vendor/autoload.php';

Dotenv::create(
    __DIR__ . '/..',
    '.env',
    new DotenvFactory([new EnvConstAdapter, new PutenvAdapter, new ServerConstAdapter])
)->load();

