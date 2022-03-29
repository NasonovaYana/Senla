<?php


spl_autoload_register();
$myCar = new \Products\Car("красная",30);

$myCar->setPrice(1500000);
$myCar->setProductId(217);
$myCar->title = 'красная машина';


$lastCar = new \Products\Car("белая", 40);

$blackPen = new \Products\Pen("чёрный");

$blackPen->setPrice(500);
$blackPen->setProductId(132);
$blackPen->title = 'чёрная ручка';
echo $blackPen->getPricePosition();

$newCart = new \Modules\Cart();
$newCart->addProduct($blackPen);

echo $newCart->cartSum();
echo '<br>';

$newCart->addProduct($myCar);

echo $newCart->cartSum();
echo '<br>';

//$newCart->deleteProduct($myCar);

//echo $newCart->cartSum();
echo '<br>';

$bluePen = new \Products\Pen("синий");

$firstTV = new \Products\TV(1);
$secondTV = new \Products\TV(0);

$order = new \Modules\Order(1434, $newCart);
$order->orderList();

$wrongOrder = new \Modules\Order(1434, $firstTV);
$wrongOrder->orderList();
var_dump($wrongOrder);

