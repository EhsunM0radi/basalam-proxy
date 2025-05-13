<?php

namespace Unisa\BasalamProxy\Contracts;
interface ProductProxyInterface
{
    public function create(int $vendorid, $createProductRequest);

    public function update(int $productId, $updateProductRequest);

    // public function archive(int $productId);

    public function read(int $productId);
}
