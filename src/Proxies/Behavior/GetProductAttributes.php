<?php

namespace Unisa\BasalamProxy\Proxies\Behavior;

use Unisa\BasalamProxy\Contracts\SdkAdapterInterface;

class GetProductAttributes
{
    public function __construct(protected SdkAdapterInterface $sdkAdapter)
    {}
    public function call($title,$categoryId)
    {
        if(is_null($categoryId)){
            $categoryId = $this->sdkAdapter->predictCategory($title)->result[0]->cat_id;
        }
        return $this->sdkAdapter->getProductAttributes($categoryId);
    }
}
