<?php

namespace Unisa\BasalamProxy\Providers;

use Unisa\BasalamProxy\Proxies\ProductProxy;
use Illuminate\Support\ServiceProvider;

class ProxyServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(ProductProxy::class, function ($app) {
            return new ProductProxy('hossein');
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/basalam-proxy.php' => config_path('basalam-proxy.php'),
        ], 'config');
    }
}
