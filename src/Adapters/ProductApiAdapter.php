<?php

namespace Unisa\BasalamProxy\Adapters;

use BasalamSDK\Api\V4ProductApi;
use BasalamSDK\Model\ApiSchemasV4ProductSchemaPatchUpdateProductSchema;
use BasalamSDK\Model\ApiSchemasV4ProductSchemaCreateProductSchema;
use BasalamSDK\Model\ApiSchemasV4ProductSchemaUpdateProductVariantsSchema;

class ProductApiAdapter
{
    public function __construct(
        protected V4ProductApi $productApi
    ) {}


    public function create(int $vendorId, ApiSchemasV4ProductSchemaCreateProductSchema $productCreateSchema)
    {
        try {
            return $this->productApi->createProductV4VendorsVendorIdProductsPost($vendorId,$productCreateSchema);
        } catch (\Throwable $e) {
            throw ApiException::fromSdk($e);
        }
    }

    public function update(int $productId,ApiSchemasV4ProductSchemaPatchUpdateProductSchema $productPatchSchema)
    {
        try {
            return $this->productApi->patchUpdateProductV4ProductsProductIdPatch($productId, $productPatchSchema);
        } catch (\Throwable $e) {
            throw ApiException::fromSdk($e);
        }
    }

    public function read(int $productId)
    {
        try {
            return $this->productApi->readProductV4ProductsProductIdGet($productId);
        } catch (\Throwable $e) {
            throw ApiException::fromSdk($e);
        }
    }

    public function updateVariation(int $productId, int $variationId, ApiSchemasV4ProductSchemaUpdateProductVariantsSchema $updateProductVariantsSchema)
    {
        try {
            return $this->productApi->patchUpdateProductVariationV4ProductsProductIdVariationsVariationIdPatch($productId,$variationId,$updateProductVariantsSchema);
        } catch (\Throwable $e) {
            throw ApiException::fromSdk($e);
        }
    }
}
