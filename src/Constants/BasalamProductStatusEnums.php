<?php

namespace Unisa\BasalamProxy\Constants;

use BenSampo\Enum\Enum;

class BasalamProductStatusEnums extends Enum
{
    public const AVAILABLE = 2976;
    public const NOT_PUBLISHED = 3790;
    public const ILLEGAL = 4184;
    public const PENDING = 3568;

    public static function hello()
    {
        dd('ge');
    }
}
