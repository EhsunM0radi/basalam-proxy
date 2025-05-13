<?php

namespace Unisa\BasalamProxy\Facades;

use Illuminate\Support\Facades\Facade;

class Labeling extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Unisa\BasalamProxy\Contracts\LabelingProxyInterface::class;
    }
}
