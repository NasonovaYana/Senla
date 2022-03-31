<?php

use Products\Pen;
use Products\TV;
use Modules\Order;
use Modules\Cart;
use Products\Car;

spl_autoload_register();
$myCar = new Car("красная", 30);

$myCar->setPrice(1500000);
$myCar->setProductId(217);
$myCar->title = 'красная машина';


$lastCar = new Car("белая", 40);

$blackPen = new Pen("чёрный");

$blackPen->setPrice(500);
$blackPen->setProductId(132);
$blackPen->title = 'чёрная ручка';
echo $blackPen->getPricePosition();

$newCart = new Cart();
$newCart->addProduct($blackPen);

echo $newCart->cartSum();
echo '<br>';

$newCart->addProduct($myCar);

echo $newCart->cartSum();
echo '<br>';

//$newCart->deleteProduct($myCar);

//echo $newCart->cartSum();
echo '<br>';

$bluePen = new Pen("синий");

$firstTV = new TV(1);
$secondTV = new TV(0);

$order = new Order(1434, $newCart);
$order->orderList();

$wrongOrder = new Order(1434, $firstTV);
$wrongOrder->orderList();
var_dump($wrongOrder);

