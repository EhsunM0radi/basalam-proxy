<?php

namespace Unisa\BasalamProxy\Adapters;

use BasalamSDK\Api\V3CategoryApi;

class CategoryApiAdapter
{
    public function __construct(
        protected V3CategoryApi $categoryApi
    ) {}


    public function attributes(int $category_id)
    {
        try {
            return $this->categoryApi->readCategoryAttributeV3CategoriesCategoryIdAttributesGet($category_id);
        } catch (\Throwable $e) {
            throw ApiException::fromSdk($e);
        }
    }
}
