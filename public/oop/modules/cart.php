<?php
namespace Modules;


class Cart
{
    public $productCount;
    private $products;
    public function addProduct($product){
        $this->productCount++;
        $this->products[]= $product;
    }

    public function cartSum(){
        $sumPrice = 0;
        echo "<br>";
        foreach($this->products as $product){
            $product = (array)$product;
            $sumPrice+=$product['price'];
        };
        return $sumPrice;
    }

    public function deleteProduct($product){
        $productsList = $this->products;
        foreach($this->products as $key=>$elem){
            if ($elem==$product){
                unset($this->products[$key]);
            }
        };
    }
}