<?php

namespace Unisa\BasalamProxy\DTOs;

class ProductRequest
{
    public function __construct(
        public readonly string $name,
        public readonly int $status,
        public readonly int $weight,
        public readonly int $unitType,
        public readonly int $photo,
        public readonly int $categoryId,
        public readonly bool $isWholesale,
        public readonly ?int $video,
        public readonly string $unitQuantity,
        public readonly int $packageWeight,
        public readonly string $description,
        public readonly int $preparationDays,
        public readonly ?int $stock,
        public readonly ?int $price,
        public readonly array $productAttributes,
        public readonly array $photos,
        public readonly ?array $shippingCityIds,
        public readonly array $variants,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'],
            status: $data['status'],
            weight: $data['weight'],
            unitType: $data['unit_type'],
            photo: $data['photo'],
            categoryId: $data['category_id'],
            isWholesale: $data['is_wholesale'],
            video: $data['video'] ?? null,
            unitQuantity: $data['unit_quantity'],
            packageWeight: $data['package_weight'],
            description: $data['description'],
            preparationDays: $data['preparation_days'],
            stock: $data['stock'] ?? null,
            price: $data['price'] ?? null,
            productAttributes: $data['product_attribute'] ?? [],
            photos: $data['photos'] ?? [],
            shippingCityIds: $data['shipping_city_ids'] ?? [],
            variants: $data['variants'] ?? [],
        );
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'status' => $this->status,
            'weight' => $this->weight,
            'unit_type' => $this->unitType,
            'photo' => $this->photo,
            'category_id' => $this->categoryId,
            'is_wholesale' => $this->isWholesale,
            'video' => $this->video,
            'unit_quantity' => $this->unitQuantity,
            'package_weight' => $this->packageWeight,
            'description' => $this->description,
            'preparation_days' => $this->preparationDays,
            'stock' => $this->stock,
            'price' => $this->price,
            'product_attribute' => $this->productAttributes,
            'photos' => $this->photos,
            'shipping_city_ids' => $this->shippingCityIds,
            'variants' => $this->variants,
        ];
    }
}
