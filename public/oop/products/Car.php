<?php

namespace Products;
use \Modules\Products;

class Car extends Products
{
    public $color;
    public $fuelTankCapacity;
    private $fuelBalance;

    public function __construct($color, $fuelTankCapacity)
    {
        $this->color = $color;
        $this->fuelTankCapacity = $fuelTankCapacity;
        $this->fuelBalance = $fuelTankCapacity;
    }

    public function ride()
    {
        $this->fuelBalance--;
        echo "Остаток топлива: " . $this->fuelBalance;
    }

}