<?php

namespace Products;
use Modules\Products;

class TV extends Products
{
    private bool $isColorful;

    public function __construct(bool $isColorful)
    {
        $this->isColorful = $isColorful;
    }

}