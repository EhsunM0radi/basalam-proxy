<?php

namespace Unisa\BasalamProxy\Facades;

use Illuminate\Support\Facades\Facade;

class Product extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Unisa\BasalamProxy\Contracts\ProductProxyInterface::class;
    }
}
