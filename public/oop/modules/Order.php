<?php

namespace Modules;

class Order
{
    private int $orderId;
    public Cart $orderCart;

    public function __construct($orderId, $orderCart)
    {
        try {
            $e = new OrderException();

            if (!($orderCart instanceof Cart)) {
                throw $e;
            }

            $this->orderId = $orderId;
            $this->orderCart = $orderCart;
        } catch (OrderException $e) {
            echo $e->getMessage();
            exit();
        }
    }

    public function orderList():void
    {
        echo "Заказ номер " . $this->orderId . "<br>";
        $orderList = "";
        $list = $this->orderCart;
        $count = $list->productCount;
        foreach ($list->products as $elem) {
            $orderList .= "Наименование товара:<br>" . $elem->title . "<br>Характеристика:<br>" . $elem->color . "<br>Цена:<br>" . $elem->getPrice() . "<br><br>";
        }
        echo "Количество товаров в заказе: $count<br><br>$orderList";
    }
}