<?php

namespace Unisa\BasalamProxy\DTOs;

use BasalamSDK\Model\AttributesResponse;

class ProductAttributeResponse
{
    protected $data;

    public static function make(AttributesResponse $attributesResponse){
        // $data = new self();
        // foreach($attributes->getData() as $attributesGroup){
        //     echo $attributesGroup->getTitle();
        //     foreach($attributesGroup->getAttributes() as $attribute){
        //         dd([$attribute->getId(),
        //         $attribute->getUnit(),
        //         $attribute->getType()->getName(),
        //         $attribute->getType()->getValue(),
        //         $attribute->getType()->getDescription(),
        //         $attribute->getTitle(),
        //         $attribute->getValue(),
        //         $attribute->getSelectedValues(),
        //         $attribute->getRequired()]);
        //     }
        // }
    }


}
