<?php

namespace Modules;


class orderException extends \Exception {
    public function __construct() {
        parent::__construct("Ошибка получения деталей заказа(объект не пренадлежит классу Cart)");
    }
}
class Order{
    private $orderId;
    public Cart $orderCart;

    public function __construct($orderId, $orderCart){
        $e = new orderException();
        if(!($orderCart instanceof Cart)){
            throw $e;
        }
        try{
        $this->orderId=$orderId;
        $this->orderCart=$orderCart;}
        catch (orderException $e){
            $e->getMessage();
        }
    }

    public function orderList()
    {

        echo "Заказ номер " . $this->orderId . "<br>";

        $orderList = "";


       $list = (array)$this->orderCart;
       $count = $list['productCount'];
       $list=array_values($list);
       foreach ($list[1] as $elem){
           $elem=(array)$elem;
           $orderList .= "Наименование товара:<br>".$elem['title']."<br>Характеристика:<br>".$elem['color']."<br>Цена:<br>".$elem['price']."<br><br>";
       }

       echo "Количество товаров в заказе: $count<br><br>$orderList";


    }
}