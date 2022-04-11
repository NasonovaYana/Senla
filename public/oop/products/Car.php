<?php

namespace Products;
use \Modules\Products;

class Car extends Products
{
    public string $color;
    public int $fuelTankCapacity;
    private int $fuelBalance;

    public function __construct($color, $fuelTankCapacity)
    {
        $this->color = $color;
        $this->fuelTankCapacity = $fuelTankCapacity;
        $this->fuelBalance = $fuelTankCapacity;
    }

    public function ride():void
    {
        $this->fuelBalance--;
        echo "Остаток топлива: " . $this->fuelBalance;
    }

}