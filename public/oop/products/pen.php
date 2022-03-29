<?php

namespace Products;

class Pen extends \Modules\Products
{
public $color;

public function __construct($color){
    $this->color=$color;
}
public function write($text){
    echo "($this->color):$text<br>";
}
}