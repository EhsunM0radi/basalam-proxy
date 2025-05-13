<?php

use Unisa\BasalamProxy\Exceptions\ValidationException;

class RequestValidator
{
    public static function validateCreateProduct(array $data): void
    {
        $required = [
            'name', 'status', 'weight', 'unit_type', 'photo',
            'category_id', 'is_wholesale', 'unit_quantity', 'package_weight',
            'description', 'preparation_days', 'product_attribute',
            'photos', 'shipping_city_ids', 'variants'
        ];

        foreach ($required as $field) {
            if (!isset($data[$field])) {
                throw new ValidationException("Missing required field: {$field}");
            }
        }

        if (!is_array($data['product_attribute'])) {
            throw new ValidationException("product_attribute must be an array.");
        }

        if (!is_array($data['variants'])) {
            throw new ValidationException("variants must be an array.");
        }

        if (!is_array($data['photos']) || count($data['photos']) === 0) {
            throw new ValidationException("photos must be a non-empty array.");
        }

        foreach ($data['variants'] as $variant) {
            if (!isset($variant['price']) || !is_numeric($variant['price'])) {
                throw new ValidationException("Each variant must have a numeric price.");
            }

            if (!isset($variant['stock']) || !is_numeric($variant['stock'])) {
                throw new ValidationException("Each variant must have a numeric stock.");
            }
        }
    }
}
