<?php

namespace Modules;


class Products implements PricePosition
{
    public string $title;
    private int $price;
    private int $productId;

    public function getPricePosition(): string
    {
        return $this->productId . ' ' . $this->title . ' ' . $this->getPrice();
    }

    public function setProductId($productId)
    {
        $this->productId = $productId;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function setPrice($price):void
    {
        $this->price = $price;
    }
}