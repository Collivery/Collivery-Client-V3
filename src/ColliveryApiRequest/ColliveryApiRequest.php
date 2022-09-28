<?php

namespace Mds\Collivery\ColliveryApiRequest;

class ColliveryApiRequest extends ApiRequest
{
    private array $config;

    public function __construct(array $config)
    {
        $this->config = $config;
    }

    public function getHost(): string
    {
        return 'api.collivery.co.za';
    }

    public function getProtocol(): string
    {
        return 'https';
    }

    public function getHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'X-App-Name' => $this->config['app_name'],
            'X-App-Version' => $this->config['app_version'],
            'X-App-Host' => $this->config['app_host'],
            'X-App-Lang' => $this->config['app_lang'],
            'X-App-Url' => $this->config['app_url'],
        ];
    }
}
