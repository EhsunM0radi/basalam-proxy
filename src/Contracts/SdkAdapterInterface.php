<?php

namespace Unisa\BasalamProxy\Contracts;
interface SdkAdapterInterface
{
    public function createProduct(int $vendorId, $productCreateSchema);

    public function updateProduct(int $productId,$productPatchSchema);

    public function readProduct(int $productId);

    public function updateVariationProduct(int $productId, int $variationId, $updateProductVariationSchema);

    public function predictCategory(string $title);

    public function uploadFile(string $authorization, $file, $file_type);

    public function deleteFile(int $id, string $secret_service);

    public function bulkDeleteFile(string $secret_service, $bulk_delete_file_schema);
}
