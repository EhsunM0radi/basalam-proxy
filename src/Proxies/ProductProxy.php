<?php

namespace Unisa\BasalamProxy\Proxies;

use App\Enums\BasalamProductStatusEnums;
use Unisa\BasalamProxy\Constants\BasalamProductUnitEnums;
use Unisa\BasalamProxy\Contracts\ProductProxyInterface;
use Unisa\BasalamProxy\Contracts\SdkAdapterInterface;
use Unisa\BasalamProxy\DTOs\CreateProductRequest;

class ProductProxy implements ProductProxyInterface
{
    public function __construct(protected SdkAdapterInterface $sdkAdapter) {}

    public function create(int $vendorid, $createProductRequest)
    {
        // پروداکت اتریبیوتس هم نیاز داری https://core.basalam.com/api_v2/category/364/attributes?vendor_id=1211445&exclude_multi_selects=true
        // status تایپ داره. این فکر کنم همون پروداکت استتوسه
        // unit_type هم که همون پروداکت یونیت اینامزه
        // استان ها از با ای پی آی گرفته میشه آیدی هاش
        // موجودی و قیمت وقتی محصول دارای ورینت (تنوع) میشه نال فرستاده میشن
        // $category = $createProductRequest->category_id ?? $this->sdkAdapter->predictCategory($createProductRequest->title)[0];
        // dd($createProductRequest->photo->file);
        $photo = $this->sdkAdapter->uploadFile(config('basalam-proxy.access_token'),$createProductRequest->photo->file,$createProductRequest->photo->file_type);
        dd($photo->getId());
        $photos = [];
        foreach($createProductRequest->photos as $photoObject){
            $photos[] = $this->sdkAdapter->uploadFile(config('basalam-proxy.access_token'),$photoObject->photo->file,$photoObject->photo->file_type);
        }

        $this->sdkAdapter->createProduct();
    }

    public function update(int $productId, $updateProductRequest)
    {
        return '';
    }

    public function read(int $productId)
    {
        return '';
    }
}
