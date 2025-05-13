<?php

namespace Unisa\BasalamProxy\Adapters;

use BasalamSDK\Api\FileApi;
use Unisa\BasalamProxy\Config\ProxyConfig;
use Unisa\BasalamProxy\Factories\CategoryDetectionClientFactory;
use BasalamSDK\Api\LabelingApi;
use BasalamSDK\Api\OpenApiFileApi;
use BasalamSDK\Api\V4ProductApi;
// use BasalamSDK\Model\ApiSchemasV4ProductSchemaCreateProductSchema;
// use BasalamSDK\Model\ApiSchemasV4ProductSchemaPatchUpdateProductSchema;
// use BasalamSDK\Model\ApiSchemasV4ProductSchemaUpdateProductVariantsSchema;
use Unisa\BasalamProxy\Contracts\SdkAdapterInterface;
use Unisa\BasalamProxy\Factories\CoreClientFactory;
use Unisa\BasalamProxy\Factories\UploadioClientFactory;

class DefaultSdkAdapter implements SdkAdapterInterface
{
    protected LabelingApiAdapter $labeling;
    protected ProductApiAdapter $product;
    protected FileApiAdapter $file;

    public function __construct(protected ProxyConfig $config)
    {
        [$cdetectionClient, $cdetectionConf] = CategoryDetectionClientFactory::make($this->config);
        [$coreClient, $coreConf] = CoreClientFactory::make($this->config);
        [$uploadioClient, $uploadioConf] = UploadioClientFactory::make($this->config);

        $this->labeling = new LabelingApiAdapter(new LabelingApi($cdetectionClient, $cdetectionConf));
        $this->product = new ProductApiAdapter(new V4ProductApi($coreClient, $coreConf));
        $this->file = new FileApiAdapter(new FileApi($uploadioClient, $uploadioConf),new OpenApiFileApi($uploadioClient, $uploadioConf));
    }

    public function predictCategory(string $title)
    {
        return $this->labeling->predict($title);
    }

    public function updateProduct(int $productId, $productPatchSchema)
    {
        return $this->product->update($productId,$productPatchSchema);
    }

    public function createProduct(int $vendorId, $productCreateSchema)
    {
        return $this->product->create($vendorId,$productCreateSchema);
    }

    public function readProduct(int $productId)
    {
        return $this->product->read($productId);
    }

    public function updateVariationProduct(int $productId, int $variationId, $updateProductVariationSchema)
    {
        return $this->product->updateVariation($productId,$variationId,$updateProductVariationSchema);
    }

    public function uploadFile(string $authorization, $file, $file_type)
    {
        return $this->file->create($authorization,$file,$file_type);
    }

    public function deleteFile(int $id, string $secret_service)
    {
        return $this->file->delete($id,$secret_service);
    }

    public function bulkDeleteFile(string $secret_service, $bulk_delete_file_schema)
    {
        return $this->file->bulkDelete($secret_service,$bulk_delete_file_schema);
    }
}
