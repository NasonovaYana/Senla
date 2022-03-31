<?php


namespace Modules;


class OrderException extends \Exception
{
    public function __construct()
    {
        parent::__construct("Ошибка получения деталей заказа(объект не пренадлежит классу Cart)");
    }
}