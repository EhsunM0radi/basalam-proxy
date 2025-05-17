<?php

namespace Unisa\BasalamProxy\Proxies;

use BasalamSDK\Model\ApiSchemasV4ProductSchemaCreateProductSchema;
use Unisa\BasalamProxy\Contracts\ProductProxyInterface;
use Unisa\BasalamProxy\DTOs\ProductRequest;
use Unisa\BasalamProxy\Proxies\Behavior\CreateProduct;
use Unisa\BasalamProxy\Proxies\Behavior\GetProductAttributes;
use Unisa\BasalamProxy\Proxies\Behavior\ReadProduct;
use Unisa\BasalamProxy\Proxies\Behavior\UpdateProduct;

class ProductProxy implements ProductProxyInterface
{
    public function __construct(
        protected CreateProduct $createProdcut,
        protected UpdateProduct $updateProduct,
        protected GetProductAttributes $getProductAttributes,
        protected ReadProduct $readProduct
        ) {}

    public function create(int $vendorId, $productRequest)
    {
        // پروداکت اتریبیوتس هم نیاز داری https://core.basalam.com/api_v2/category/364/attributes?vendor_id=1211445&exclude_multi_selects=true
        // status تایپ داره. این فکر کنم همون پروداکت استتوسه
        // unit_type هم که همون پروداکت یونیت اینامزه
        // استان ها از با ای پی آی گرفته میشه آیدی هاش
        // موجودی و قیمت وقتی محصول دارای ورینت (تنوع) میشه نال فرستاده میشن
        return $this->createProdcut->call($vendorId,$productRequest);
    }

    public function getAttributes(string $title, $categoryId=null)
    {
        dd($this->getProductAttributes->call($title,$categoryId));
    }

    public function update(int $productId, $productRequest)
    {
        return $this->updateProduct->call($productId,$productRequest);
    }

    public function read(int $productId)
    {
        return $this->readProduct->call($productId);
    }
}
