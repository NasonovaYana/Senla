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

//Сделайте функцию принимающую трехмерный массив с числами, например [2, [[1, 2], 1, [3, 4]], [[5, 6], [7, 8]]]. Найдите сумму элементов этого массива. Массив, конечно же, может быть произвольным.
// todo ПРИНЯТО обсудить рекурсивное решение
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
            // todo лучше использовать неравенство >. Обсудить решение с while.
            if ($k == $countOut + 1) {
                break;
            }
        }
    }
    return $arr;;
}
echo "<br>";
$arr = makeArray(4, 10);
var_dump($arr);

//Сделайте функцию isNumberInRange, которая параметром принимает число и проверяет, что оно больше нуля и меньше 10. Если это так - пусть функция возвращает true, если не так - false.
function isNumberInRange($num)
{
    // todo ИСПРАВЛЕНО в файле 6 уже был комментарий на подобную ситуацию
    $res = false;
    if ($num > 0 and $num < 10) {
        $res = true;
    } ;
    return $res;
}

$res = isNumberInRange(6);
var_dump($res);
echo '<br>';
//Дан массив с числами. Запишите в новый массив только те числа, которые больше нуля и меньше 10-ти. Для этого используйте вспомогательную функцию isNumberInRange из предыдущей задачи.
$array = [12, 13, 15, 6, 10, 1, -3, 23, -14];
// todo 1. ИСПРАВЛЕНО нужно в новый массив записать
// todo 2. ИСПРАВЛЕНО реши с помощью встроенной в php функции array_filter
$arrayResult = array_filter($array, 'isNumberInRange');
var_dump($arrayResult);
echo '<br>';
//Сделайте функцию getDigitsSum (digit - это цифра), которая параметром принимает целое число и возвращает сумму его цифр.
function getDigitsSum($digit)
{
    $arr = str_split($digit, 1);
    $sum = array_sum($arr);
    return $sum;
}

$sum = getDigitsSum(123);
echo $sum . '<br><br>';
//Найдите все года от 1 до 2021, сумма цифр которых равна 13. Для этого используйте вспомогательную функцию getDigitsSum из предыдущей задачи.
// todo ИСПРАВЛЕНО тоже попробуй с помощью array_filter решить
function checkSum($a){
    $res=false;
    if(getDigitsSum($a)===13){
        $res=true;
    }
    return $res;
}

$arrYears = range(1,2021);
$arrYears = array_filter($arrYears,'checkSum');
var_dump($arrYears);
echo '<br><br>';
//Сделайте функцию getDivisors, которая параметром принимает число и возвращает массив его делителей (чисел, на которое делится данное число).
// todo 1. что будет если не попадем в условие $num % $i === 0?
// todo 2. тоже реши с помощью array_filter, подсказка: для внедрения внешней переменной в колл бэк функцию, используется ключевое слово use.
function getDivisors($num)
{
    $arr =  range(1,ceil($num / 2));

    return array_filter($arr, fn ($item) => ($num % $item === 0));

//    for ($i = 1; $i < $num; $i++) {
//        if ($num % $i === 0) {
//            $arr[] = $i;
//        }
//    }
//    return $arr;
}

$arrDiv = getDivisors(15);
var_dump($arrDiv);
echo '<br><br>';
//Сделайте функцию getCommonDivisors, которая параметром принимает 2 числа, а возвращает массив их общих делителей. Для этого используйте вспомогательную функцию getDivisors из предыдущей задачи.
function getCommonDivisors($num1, $num2)
{
    $arr1 = getDivisors($num1);
    $arr2 = getDivisors($num2);
    return array_intersect($arr1, $arr2);
}

$result = getCommonDivisors(12, 36);
var_dump($result);
echo '<br><br>';
//Дружественные числа - два различных числа, для которых сумма всех собственных делителей первого числа равна второму числу и наоборот, сумма всех собственных делителей второго числа равна первому числу.
//Например, 220 и 284. Делители для 220 это 1, 2, 4, 5, 10, 11, 20, 22, 44, 55 и 110, сумма делителей равна 284. Делители для 284 это 1, 2, 4, 71 и 142, их сумма равна 220.
//Задача: найдите все пары дружественных чисел в промежутке от 1 до 10000. Для этого сделайте вспомогательную функцию, которая находит все делители числа и возвращает их в виде массива. Также сделайте функцию, которая параметром принимает массив, а возвращает его сумму.
function sumArr($arr)
{
    $sum = 0;
    foreach ($arr as $elem) {
        $sum += $elem;
    }
    return $sum;
}

// todo у меня здесь все виснет
// todo зачем $i < 10001 (чтобы проверить все числа в диапазоне из условия) ?
//for ($i = 2; $i < 10001; $i++) {
//    unset($a1);
//    $a1 = getDivisors($i);
//    for ($j = 2; $j < $i; $j++) {
//        unset($a2);
//        $a2 = getDivisors($j);
//        if (sumArr($a1) == $j and sumArr($a2) == $i) {
//            echo "$i - $j<br>";
//        }
//    }
//}

function getAmicableNumbers($numbers) {
    // создаем массив, где ключ - число, а значение - сумма его делителей
    $numbersDivisors = [];
    $amicableNumbers = [];
    for ($i = 2; $i <= $numbers; $i++) {
        $divisors = getDivisors($i);
        $numbersDivisors[$i] = array_sum($divisors);
    }

    // проходим по массиву $numbersDivisors и ищем ключи, равные значениям и проверяем, что значения найденных ключей равны текущему ключу (это и будут дружественные числа)
//     foreach ($numbersDivisors as $number => $sumDivisors) {
//         if (array_key_exists($sumDivisors, $numbersDivisors) && $number === $numbersDivisors[$sumDivisors] && $number !==$sumDivisors) {
//             // ключ
//             $amicableNumbers[$number] = $sumDivisors;
//         }
//     }
//
//     return $amicableNumbers;

    //тоже самое но компактнее
    return array_filter(
        $numbersDivisors,
        fn ($sumDivisors, $number) => (array_key_exists($sumDivisors, $numbersDivisors) && $number === $numbersDivisors[$sumDivisors] && $number !==$sumDivisors),
        ARRAY_FILTER_USE_BOTH
    );
}


echo '<br>';
////Значения по умолчанию
//Сделайте функцию cut, которая первым параметром будет принимать строку, а вторым параметром - сколько первых символов оставить в этой строке. Второй параметр должен быть необязательным и по умолчанию принимать значение 10.
function cut($str, $num = 10)
{
    // todo ИСПРАВЛЕНО можно сразу возвращать результат substr
    return substr($str, 0, $num);;
}

$str = '1234567890123';
echo cut($str) . '<br><br>';
//Работа с рекурсией
//Дан массив с числами. Выведите последовательно его элементы используя рекурсию и не используя цикл.
unset($arr);
$arr = [1, 2, 3, 4, 5];
function recOut($arr, $i)
{
    // todo 1. ИСПРАВЛЕНО На последнем вызове будет warning, т.к. проверка $i < $count должна быть до обращения к $arr[$i]
    // todo 2. ИСПРАВЛЕНО можно подсократить код, перенеся count($arr) в условие, а $i++ в вызов функции recOut, т.к. ты эти значения больше нигде не используешь.
    echo $arr[$i];
    if ($i < count($arr)-1) {
        recOut($arr, ++$i);
    }
}

recOut($arr, 0);
echo '<br><br>';
//Дано число. Сложите его цифры. Если сумма получилась более 9-ти, опять сложите его цифры. И так, пока сумма не станет однозначным числом (9 и менее).

// todo ПРИНЯТО обсудить, что здесь происходит, и как сделать так, чтобы функция возвращала искомое число, а не просто его выводила.
function recSum($num)
{
    $arr = str_split($num, 1);
    $sum = array_sum($arr);
    if ($sum > 10) {
        recSum($sum);
    } else {
        echo "sum = $sum<br>";
        return $sum;
    }
}

recSum(182);
