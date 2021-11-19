<?php
//Работа с логическими значениями:
//Сделайте функцию, которая параметрами принимает 2 числа. Если эти числа равны - пусть функция вернет true, а если не равны - false.
// todo match - в php8 это зарезервированное слово
function match($a, $b)
{
    // todo можно сразу верунть выражение $a === $b
    if ($a === $b) {
        return true;
    } else {
        return false;
    };
}

$result = match(7, 5);
var_dump($result);

//Сделайте функцию, которая параметром принимает число и проверяет - отрицательное оно или нет. Если отрицательное - пусть функция вернет true, а если нет - false.
function belowZero($a)
{
    if ($a < 0) {
        return true;
    } else {
        return false;
    };
}

$result = belowZero(-6);
var_dump($result);

//Дан массив с числами. Проверьте, что в этом массиве есть число 5. Если есть - выведите 'да', а если нет - выведите 'нет'.
function isFive($arr)
{
    foreach ($arr as $elem) {
        $result = false;
        if ($elem === 5) {
            $result = true;
            echo 'Да<br>';
            break;
        }

    }
    if (!$result) {
        echo 'Нет<br>';
    }
}

$arr = [1, 2, 3, 4, 5];
isFive($arr);


//Дано число, например 31. Проверьте, что это число не делится ни на одно другое число кроме себя самого и единицы. То есть в нашем случае нужно проверить, что число 31 не делится на все числа от 2 до 30. Если число не делится - пусть функция вернет false, а если делится - true.
function simpleNum($num)
{
    $result = null;
    $a = 0;
    for ($i = 2; $i < $num - 1; $i++) {
        // todo переменная а по сути вообще не нужна, $num % $i можно сразу в условие поставить
        $a = $num % $i;
        if ($a === 0) {
            $result = true;
            break;
        } else {
            $result = false;
        }
    }
    return $result;
}

$number = 13;
$res = simpleNum($number);
var_dump($res);

//Дан массив с числами. Проверьте, есть ли в нем два одинаковых числа подряд. Если есть - вернете true, а если нет - вернете false.
function sameNum($arr)
{
    // todo  $res можно сразу false присвоить и не перезаписывать на каждой итерации
    $res = null;
    $i = null;
    foreach ($arr as $elem) {
        if ($elem === $i) {
            $res = true;
            break;
        } else {
            $i = $elem;
            $res = false;
        };
    }
    return $res;
}

$array = [1, 2, 3, 3, 4, 5];
$result = sameNum($array);
var_dump($result);