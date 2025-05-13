<?php

namespace Unisa\BasalamProxy\Factories;

use BasalamSDK\Configuration;
use GuzzleHttp\Client;
use Unisa\BasalamProxy\Config\ProxyConfig;

class CoreClientFactory
{
    public static function make(ProxyConfig $config): array
    {
        $client = new Client();
        $configuration = new Configuration();
        $configuration->setHost($config->getCoreServiceConfig()['base_url']);
        $configuration->setAccessToken($config->getAccessToken());

        return [$client, $configuration];
    }
}
