<?php

namespace Unisa\BasalamProxy\Proxies;

class ProductProxy
{
    private $hello;

    public function __construct(string $hello)
    {
        $this->hello = $hello;
    }

    public function sayHello(){
        return "hello, ".$this->hello;
    }
}
