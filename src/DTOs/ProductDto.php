<?php

namespace Unisa\BasalamProxy\DTOs;

use App\Enums\BasalamProductStatusEnums;
use Unisa\BasalamProxy\Constants\BasalamProductUnitEnums;

class ProductDto
{
    public function __construct(
        public readonly string $name,
        public readonly int $status,
        public readonly int $weight,
        public readonly int $unitType,
        public readonly ?int $categoryId,
        public readonly bool $isWholesale,
        public readonly string $unitQuantity,
        public readonly int $packageWeight,
        public readonly string $description,
        public readonly int $preparationDays,
        public readonly ?int $stock,
        public readonly ?int $price,
        public readonly BinaryFileDto $photo,
        public readonly array $photos,
        public readonly array $productAttributes,
        public readonly ?array $shippingCityIds,
        public readonly array $variants,
        public readonly ?BinaryFileDto $video,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'],
            status: $data['status'],
            weight: $data['weight'],
            unitType: $data['unit_type'],
            categoryId: $data['category_id']??null,
            isWholesale: $data['is_wholesale'],
            unitQuantity: $data['unit_quantity'],
            packageWeight: $data['package_weight'],
            description: $data['description'],
            preparationDays: $data['preparation_days'],
            stock: $data['stock'] ?? null,
            price: $data['price'] ?? null,
            photo: $data['photo'],
            photos: $data['photos'] ?? [],
            productAttributes: $data['product_attribute'] ?? [],
            shippingCityIds: $data['shipping_city_ids'] ?? null,
            variants: $data['variants'] ?? [],
            video: $data['video'] ?? null
        );
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'status' => $this->status,
            'weight' => $this->weight,
            'unit_type' => $this->unitType,
            'category_id' => $this->categoryId,
            'is_wholesale' => $this->isWholesale,
            'unit_quantity' => $this->unitQuantity,
            'package_weight' => $this->packageWeight,
            'description' => $this->description,
            'preparation_days' => $this->preparationDays,
            'stock' => $this->stock,
            'price' => $this->price,
            'photo' => $this->photo,
            'photos' => $this->photos,
            'product_attribute' => $this->productAttributes,
            'shipping_city_ids' => $this->shippingCityIds,
            'variants' => $this->variants,
            'video' => $this->video,
        ];
    }
}
