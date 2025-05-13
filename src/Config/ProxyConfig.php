<?php

namespace Unisa\BasalamProxy\Config;

use Unisa\BasalamProxy\Adapters\DefaultSdkAdapter;

class ProxyConfig
{
    public function getSdkAdapterClass(): string
    {
        return config('basalam-proxy.sdk_adapter', DefaultSdkAdapter::class);
    }

    public function getVendorId(): ?string
    {
        return config('basalam-proxy.vendor_id');
    }

    public function getAccessToken(): ?string
    {
        return config('basalam-proxy.access_token');
    }

    public function getCoreServiceConfig(): array
    {
        return config('basalam-proxy.services.core', []);
    }
    public function getCategoryDetectionServiceConfig(): array
    {
        return config('basalam-proxy.services.categorydetection', []);
    }
    public function getUploadioServiceConfig(): array
    {
        return config('basalam-proxy.services.uploadio', []);
    }

    public function isResponseValidationEnabled(): bool
    {
        return (bool) config('basalam-proxy.response_validation', true);
    }

    public function isRequestValidationEnabled(): bool
    {
        return (bool) config('basalam-proxy.request_validation', true);
    }

    public function getLoggerChannel(): ?string
    {
        return config('basalam-proxy.logger_channel');
    }
}
