<?php

namespace Unisa\BasalamProxy\Proxies\Behavior;

use BasalamSDK\Model\ApiSchemasV4ProductSchemaCreateProductSchema;
use Unisa\BasalamProxy\Contracts\SdkAdapterInterface;
use Unisa\BasalamProxy\DTOs\ProductRequest;

class CreateProduct
{
    public function __construct(protected SdkAdapterInterface $sdkAdapter)
    {}

    public function call($vendor_id,$createProductRequest)
    {
        $categoryId = $createProductRequest->category_id?? $this->sdkAdapter->predictCategory($createProductRequest->name)->result[0]->cat_id;
        $photo = $this->sdkAdapter->uploadFile(config('basalam-proxy.access_token'),$createProductRequest->photo->file,$createProductRequest->photo->file_type)->getId();
        $photos = [];
        foreach($createProductRequest->photos as $photoObject){
            $photos[] = $this->sdkAdapter->uploadFile(config('basalam-proxy.access_token'),$photoObject->photo->file,$photoObject->photo->file_type)->getId();
        }
        if($createProductRequest->video){
            $video = $this->sdkAdapter->uploadFile(config('basalam-proxy.access_token'),$createProductRequest->video->file,$createProductRequest->video->file_type)->getId();
        } else {
            $video = null;
        }

        $array = new ProductRequest(
            $createProductRequest->name,
            $createProductRequest->status,
            $createProductRequest->weight,
            $createProductRequest->unitType,
            $photo,
            $categoryId,
            $createProductRequest->isWholesale,
            $video,
            $createProductRequest->unitQuantity,
            $createProductRequest->packageWeight,
            $createProductRequest->description,
            $createProductRequest->preparationDays,
            $createProductRequest->stock,
            $createProductRequest->price,
            $createProductRequest->productAttributes,
            $photos,
            $createProductRequest->shippingCityIds,
            $createProductRequest->variants
        );
        $array = $array->toArray();
        $request = new ApiSchemasV4ProductSchemaCreateProductSchema($array);

        $this->sdkAdapter->createProduct($vendor_id,$request);
    }

}
