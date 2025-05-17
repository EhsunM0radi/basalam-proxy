<?php

namespace Unisa\BasalamProxy\Proxies\Behavior;

use Unisa\BasalamProxy\Contracts\SdkAdapterInterface;

class ReadProduct
{
    public function __construct(protected SdkAdapterInterface $sdkAdapter)
    {}
    public function call($productId){
        return $this->sdkAdapter->readProduct($productId);
    }
}
