<?php

namespace Products;

use \Modules\Products;

class Pen extends Products
{
    public string $color;

    public function __construct($color)
    {
        $this->color = $color;
    }

    public function write($text)
    {
        echo "($this->color):$text<br>";
    }
}