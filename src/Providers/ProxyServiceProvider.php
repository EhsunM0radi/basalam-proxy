<?php

namespace Unisa\BasalamProxy\Providers;

use Unisa\BasalamProxy\Proxies\ProductProxy;
use Illuminate\Support\ServiceProvider;
use Unisa\BasalamProxy\Adapters\DefaultSdkAdapter;
use Unisa\BasalamProxy\Contracts\LabelingProxyInterface;
use Unisa\BasalamProxy\Contracts\ProductProxyInterface;
use Unisa\BasalamProxy\Contracts\SdkAdapterInterface;
use Unisa\BasalamProxy\Proxies\LabelingProxy;

class ProxyServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(SdkAdapterInterface::class, DefaultSdkAdapter::class);

        $this->app->bind(ProductProxyInterface::class, function ($app) {
            return new ProductProxy($app->make(SdkAdapterInterface::class));
        });

        $this->app->bind(LabelingProxyInterface::class, function ($app) {
            return new LabelingProxy($app->make(SdkAdapterInterface::class));
        });

    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/basalam-proxy.php' => config_path('basalam-proxy.php'),
        ], 'config');
    }
}
