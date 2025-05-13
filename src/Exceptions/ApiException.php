<?php

namespace Unisa\BasalamProxy\Exceptions;

class ApiException extends ProxyException
{
    protected $code = 500;

    public static function fromSdk(\Throwable $e): self
    {
        return new self("SDK Error: " . $e->getMessage(), $e->getCode(), $e);
    }
}
