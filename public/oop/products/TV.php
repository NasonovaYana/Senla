<?php

namespace Products;
use \Modules\Products;

class TV extends \Modules\Products
{
    private $isColorful;

    public function __construct(bool $isColorful)
    {
        $this->isColorful = $isColorful;
    }

}