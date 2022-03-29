<?php
namespace Modules;

interface pricePosition
{
    public function getPricePosition();
}

class Products implements pricePosition
{
    public $title;
    public $price;
    private $productId;

public function getPricePosition()
{
    $title = $this->title;
    $price = $this->price;
    $productId = $this->productId;
   return $productId.' '.$title.' '.$price;
}
    public function setProductId($productId){
        $this->productId = $productId;
    }

    public function getPrice(){
    return$this->price;
}
    public function setPrice($price)
    {
        $this->price = $price;
    }
}