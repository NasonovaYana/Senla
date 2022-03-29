<?php
namespace Products;

class Car extends \Modules\Products
{
public $color;
public $fuelTankCapacity;
private $fuelBalance;

public function __construct($color, $fuelTankCapacity){
    $this->color=$color;
    $this->fuelTankCapacity=$fuelTankCapacity;
    $this->fuelBalance=$fuelTankCapacity;
}

public function ride(){
    $this->fuelBalance--;
    echo "Остаток топлива: ".$this->fuelBalance;
}

}