<?php

namespace Unisa\BasalamProxy\Proxies;

use Unisa\BasalamProxy\Contracts\LabelingProxyInterface;
use Unisa\BasalamProxy\Contracts\SdkAdapterInterface;

class LabelingProxy implements LabelingProxyInterface
{
    public function __construct(protected SdkAdapterInterface $sdkAdapter) {}

    public function predict(string $title)
    {
        return $this->sdkAdapter->predictCategory($title);
    }
}
