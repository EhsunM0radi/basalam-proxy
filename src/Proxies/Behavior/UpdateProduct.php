<?php

namespace Unisa\BasalamProxy\Proxies\Behavior;

use BasalamSDK\Model\ApiSchemasV4ProductSchemaPatchUpdateProductSchema;
use Unisa\BasalamProxy\Contracts\SdkAdapterInterface;
use Unisa\BasalamProxy\DTOs\ProductRequest;

class UpdateProduct
{
    public function __construct(protected SdkAdapterInterface $sdkAdapter)
    {}

    public function call($productId,$productRequest)
    {
        $categoryId = $productRequest->category_id?? $this->sdkAdapter->predictCategory($productRequest->title);

        $photo = $this->sdkAdapter->uploadFile(config('basalam-proxy.access_token'),$productRequest->photo->file,$productRequest->photo->file_type);
        $photos = [];
        foreach($productRequest->photos as $photoObject){
            $photos[] = $this->sdkAdapter->uploadFile(config('basalam-proxy.access_token'),$photoObject->photo->file,$photoObject->photo->file_type);
        }
        if($productRequest->video){
            $video = $this->sdkAdapter->uploadFile(config('basalam-proxy.access_token'),$productRequest->video->file,$productRequest->video->file_type);
        }

        $array = new ProductRequest(
            $productRequest->name,
            $productRequest->status,
            $productRequest->weight,
            $productRequest->unitType,
            $photo,
            $categoryId,
            $productRequest->isWholesale,
            $video,
            $productRequest->unitQuantity,
            $productRequest->packageWeight,
            $productRequest->description,
            $productRequest->preparationDays,
            $productRequest->stock,
            $productRequest->price,
            $productRequest->productAttributes,
            $photos,
            $productRequest->shippingCityIds,
            $productRequest->variants
        );
        $array = $array->toArray();
        $request = new ApiSchemasV4ProductSchemaPatchUpdateProductSchema($array);

        $this->sdkAdapter->updateProduct($productId,$request);
    }

}
