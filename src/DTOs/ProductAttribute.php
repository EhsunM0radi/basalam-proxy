<?php

namespace Unisa\BasalamProxy\DTOs;

class ProductAttribute
{
    public function __construct(
        public readonly int $attribute_id,
        public readonly ?array $selected_values,
        public readonly ?string $value,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            attribute_id: $data['attribute_id'],
            selected_values: $data['selected_values'],
            value: $data['value'],
        );
    }

    public function toArray(): array
    {
        return [
            'attribute_id' => $this->attribute_id,
            'selected_values' => $this->selected_values,
            'value' => $this->value,
        ];
    }
}
