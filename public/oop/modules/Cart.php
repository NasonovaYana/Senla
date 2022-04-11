<?php

namespace Modules;


class Cart
{
    public $productCount;
    public array $products;

    /**
     * @param Products $product
     */
    public function addProduct(Products $product):void
    {
        $this->productCount++;
        $this->products[] = $product;
    }


    public function cartSum():int
    {
        $sumPrice = 0;
        echo "<br>";
        foreach ($this->products as $product) {
            $sumPrice += $product->getPrice();
        };
        return $sumPrice;
    }

    public function deleteProduct($product):void
    {
        /**
         * @var  Products $elem
         */
        foreach ($this->products as $key => $elem) {
            if ($elem == $product) {
                unset($this->products[$key]);
                $this->productCount--;
            }

        }
    }
}