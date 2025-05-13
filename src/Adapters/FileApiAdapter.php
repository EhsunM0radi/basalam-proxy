<?php

namespace Unisa\BasalamProxy\Adapters;

use BasalamSDK\Api\FileApi;
use BasalamSDK\Api\OpenApiFileApi;
use BasalamSDK\Model\BulkDeleteFileSchema;
use BasalamSDK\Model\UserUploadFileTypeEnum;
use SplFileObject;
use Unisa\BasalamProxy\Exceptions\ApiException;

class FileApiAdapter
{
    public function __construct(protected FileApi $fileApi, protected OpenApiFileApi $oFileApi)
    {}

    public function create(string $authorization, $file, $file_type)
    {
        try {
            return $this->oFileApi->createFileV3FilesPost($authorization,$file,$file_type);
        } catch (\Throwable $e) {
            throw ApiException::fromSdk($e);
        }
    }

    public function delete(int $id, string $service_secret)
    {
        try {
            return $this->fileApi->deleteFileApiV2FilesIdDelete($id,$service_secret);
        } catch (\Throwable $e) {
            throw ApiException::fromSdk($e);
        }
    }

    public function bulkDelete(string $service_secret, BulkDeleteFileSchema $bulk_delete_file_schema)
    {
        try {
            return $this->fileApi->bulkDeleteFileApiV2FilesDelete($service_secret,$bulk_delete_file_schema);
        } catch (\Throwable $e) {
            throw ApiException::fromSdk($e);
        }
    }
}
