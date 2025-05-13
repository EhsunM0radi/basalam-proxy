<?php

namespace Unisa\BasalamProxy\Adapters;

use BasalamSDK\Api\LabelingApi;
use Unisa\BasalamProxy\Exceptions\ApiException;

class LabelingApiAdapter
{
    public function __construct(
        protected LabelingApi $labelingApi
    ) {}

    public function predict(string $title)
    {
        try {
            return $this->labelingApi->predictLabelsCategoryDetectionApiV20PredictGet($title);
        } catch (\Throwable $e) {
            throw ApiException::fromSdk($e);
        }
    }
}
