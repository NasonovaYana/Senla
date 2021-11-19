<?php
//Практика с функциями:
//Сделайте функцию arrayFill, которая будет заполнять массив заданными значениями. Первым параметром функция принимает значение, которым заполнять массив, а вторым - сколько элементов должно быть в массиве. Пример: arrayFill('x', 5) сделает массив ['x', 'x', 'x', 'x', 'x'].
function arrayFill($elemVal, $countElem)
{
    $arr = [];
    for ($i = 0; $i < $countElem; $i++) {
        $arr[$i] = $elemVal;
    }
    return $arr;
}

$arr = arrayFill('x', 5);
var_dump($arr);

//Сделайте функцию принимающую двухмерный массив с числами, например [[1, 2, 3], [4, 5], [6]]. Найдите сумму элементов этого массива. Массив, конечно же, может быть произвольным.
function sumArray($arr)
{
    $sum = 0;
    foreach ($arr as $elem) {
        foreach ($elem as $elemLevel) {
            $sum += $elemLevel;
        }
    }
    return $sum;
}

$arr = [[1, 2, 3], [4, 5], [6]];
$sum = sumArray($arr);
var_dump($sum);

//Сделайте функцию принимающую трехмерный массив с числами, например [[[1, 2], [3, 4]], [[5, 6], [7, 8]]]. Найдите сумму элементов этого массива. Массив, конечно же, может быть произвольным.
function sumArrayDimens($arr)
{
    $sum = 0;
    foreach ($arr as $elem) {
        foreach ($elem as $elemLevel) {
            foreach ($elemLevel as $elemNextLevel)
                $sum += $elemNextLevel;
        }
    }
    return $sum;
}

unset($arr);
$arr = [[[1, 2], [3, 4]], [[5, 6], [7, 8]]];
$sum = sumArrayDimens($arr);
var_dump($sum);

//Сделайте функцию принимающую два параметра, кол-во элементов в массиве на втором уровне вложенности и кол-во эллемнтов. С помощью двух циклов эта функция должна создавать массив такого вида [[1, 2, 3], [4, 5, 6], [7, 8, 9]], данный пример для входных параметров (3, 9).
//Сделала для случаев деления с остатком второго параметра на первый.
function makeArray($countIn, $countOut)
{
    $k = 1;
    $arr = [];
    for ($i = 0; $i < ($countOut / $countIn); $i++) {
        for ($j = 0; $j < $countIn; $j++) {
            $arr[$i][$j] = $k;
            $k++;
            if ($k == $countOut + 1) {
                break;
            }
        }
    }
    return $arr;;
}

$arr = makeArray(4, 10);
var_dump($arr);
