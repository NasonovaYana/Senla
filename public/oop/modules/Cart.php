<?php

namespace Modules;


class Cart
{
    public $productCount;
    public $products;

    public function addProduct($product)
    {
        $this->productCount++;
        $this->products[] = $product;
    }


    public function cartSum():int
    {
        $sumPrice = 0;
        echo "<br>";
        foreach ($this->products as $product) {
            $sumPrice += $product->price;
        };
        return $sumPrice;
    }

    public function deleteProduct($product)
    {
        foreach ($this->products as $key => $elem) {
            if ($elem == $product) {
                unset($this->products[$key]);
            }
        };
    }
}