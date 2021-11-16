<?php
//1. функции работы со строками в PHP
//    Работа с регистром символов:
//Дана строка 'php'. Сделайте из нее строку 'PHP'.
$str = 'php';
echo strtoupper($str) . '<br>';
//Дана строка 'PHP'. Сделайте из нее строку 'php'.
$str = 'PHP';
echo strtolower($str) . '<br>';
//Дана строка 'london'. Сделайте из нее строку 'London'.
$str = 'london';
echo ucfirst($str) . '<br>';
//Дана строка 'London'. Сделайте из нее строку 'london'.
$str = 'London';
echo lcfirst($str) . '<br>';
//Дана строка 'london is the capital of great britain'. Сделайте из нее строку 'London Is The Capital Of Great Britain'.
$str = 'london is the capital of great britain';
echo ucwords($str) . '<br>';
//Дана строка 'LONDON'. Сделайте из нее строку 'London'.
$str = 'LONDON';
echo ucfirst(strtolower($str)) . '<br>';;

//Кол-во символов:
//Дана строка 'html css php'. Найдите количество символов в этой строке.
$str = 'html css php';
echo strlen($str) . '<br>';
//Дана переменная $password, в которой хранится пароль пользователя. Если количество символов пароля больше 5-ти и меньше 10-ти, то выведите пользователю сообщение о том, что пароль подходит, иначе сообщение о том, что нужно придумать другой пароль.
$password = 'sfassad';
$passLen = strlen($password);
if ($passLen > 5 and $passLen < 10) {
    echo "Пароль подходит<br>";
} else {
    echo "Придумайте другой пароль<br>";
}
echo '<br><br>';

//Работа с подстроками:
// Дана строка 'html css php'. Вырежьте из нее и выведите на экран слово 'html', слово 'css' и слово 'php'.
$str = 'html css php';
echo substr($str, 0, 4) . '<br>';
echo substr($str, 5, 3) . '<br>';
echo substr($str, 9, 3) . '<br>';
//Дана строка. Вырежите и выведите на экран последние 3 символа этой строки.
$str = 'qwerty';
echo substr($str, -3, 3) . '<br>';
//Дана строка. Проверьте, что она начинается на 'http://'. Если это так, выведите 'да', если не так - 'нет'.
$str = 'http://qwerty';
if (substr($str, 0, 7) === 'http://') {
    echo 'Да<br>';
} else {
    echo 'Нет<br>';
};
//Дана строка. Проверьте, что она заканчивается на '.png'. Если это так, выведите 'да', если не так - 'нет'.
$str = 'qwerty.png';
if (substr($str, -4, 4) === '.png') {
    echo 'Да<br>';
} else {
    echo 'Нет<br>';
};
//Дана строка. Проверьте, что она заканчивается на '.png' или на '.jpg'. Если это так, выведите 'да', если не так - 'нет'.
$str = 'qwerty.jpg';
$subStr = substr($str, -4, 4);
if ($subStr === '.png' or $subStr === '.jpg') {
    echo 'Да<br>';
} else {
    echo 'Нет<br>';
};
//Дана строка. Если в этой строке более 5-ти символов - вырежите из нее первые 5 символов, добавьте троеточие в конец и выведите на экран. Если же в этой строке 5 и менее символов - просто выведите эту строку на экран.
$str = 'wsddwef';
$strLength = strlen($str);
if ($strLength > 5) {
    $str = substr($str, 0, 5) . '...';
}
echo $str . '<br><br>';

//Замена символов (str_replace):
//Дана строка '31.12.2013'. Замените все точки на дефисы.
$str = '31.12.2013';
echo str_replace('.', '-', $str) . '<br>';
//Дана строка $str. Замените в ней все буквы 'a' на цифру 1, буквы 'b' - на 2, а буквы 'c' - на 3.
$str = 'qwbjvfevahjkhcc';
$search = ['a', 'b', 'c'];
$replace = ['1', '2', '3'];
echo str_replace($search, $replace, $str) . '<br>';
//Дана строка с буквами и цифрами, например, '1a2b3c4b5d6e7f8g9h0'. Удалите из нее все цифры. То есть в нашем случае должна получится строка 'abcbdefgh'.
$str = '1a2b3c4b5d6e7f8g9h0';
$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 0];
echo str_replace($numbers, '', $str) . '<br>';

//Замена символов (strtr):
//Дана строка $str. Замените в ней все буквы 'a' на цифру 1, буквы 'b' - на 2, а буквы 'c' - на 3. Решите задачу двумя способами работы с функцией strtr (массив замен и две строки замен)
$str = 'qwbjvfevahjkhcc';
echo strtr($str, ['a' => 1, 'b' => 2, 'c' => 3]) . '<br>';
echo strtr(strtr(strtr($str, 'a', 1), 'b', 2), 'c', 3) . '<br><br>';

//Нахождение позиций подстроки:
//Дана строка 'abc abc abc'. Определите позицию первой буквы 'b'.
$str = 'abc abc abc';
echo strpos($str, 'b') . '<br>';
//Дана строка 'abc abc abc'. Определите позицию последней буквы 'b'.
echo strrpos($str, 'b') . '<br>';
//Дана строка 'aaa aaa aaa aaa aaa'. Определите позицию второго пробела.
$str = 'aaa aaa aaa aaa aaa';
$a = strpos($str, ' ');
$b = strpos($str, ' ', $a + 1);
echo $b . '<br>';
//Проверьте, что в строке есть две точки подряд. Если это так - выведите 'есть', если не так - 'нет'.
$str = 'weowoeiwoei..wewwewewe';
$firstSPoint = strpos($str, '.');
$secondPoint = strpos($str, '.', $firstSPoint + 1);
if ($secondPoint - $firstSPoint == 1) {
    echo 'Да' . '<br>';
} else {
    echo 'Нет' . '<br>';
};
//Проверьте, что строка начинается на 'http://'. Если это так - выведите 'да', если не так - 'нет'.
$str = 'http://qweeqe';
$checkPosition = strpos($str, 'http://');
if ($checkPosition === 0) {
    echo 'Да' . '<br>';
} else {
    echo 'Нет' . '<br>';
};

//Объединение и разивание строк:
//Дана строка 'html css php'. С помощью функции explode запишите каждое слово этой строки в отдельный элемент массива.
$str = 'html css php';
$arrStr = explode(' ', $str);
var_dump($arrStr);
//В переменной $date лежит дата в формате '2013-12-31'. Преобразуйте эту дату в формат '31.12.2013'.
$str = '2013-12-31';
$arr = explode('-', $str);
$arr = array_reverse($arr);
$str = implode('.', $arr);
echo $str . '<br><br>';

//Преобразует строку в массив:
//Дана строка '1234567890'. Разбейте ее на массив с элементами '12', '34', '56', '78', '90'.
$str = '1234567890';
unset($arr);
$arr = str_split($str, 2);
var_dump($arr);
//Дана строка '1234567890'. Разбейте ее на массив с элементами '1', '2', '3', '4', '5', '6', '7', '8', '9', '0'.
unset($arr);
$arr = str_split($str, 1);
var_dump($arr);
echo '<br><br>';

//Очистка строк:
//Дана строка. Очистите ее от концевых пробелов.
$str = '   qwerty   ';
echo rtrim($str) . 'пробелов в конце нет<br>';
//Дана строка '/php/'. Сделайте из нее строку 'php', удалив концевые слеши.
$str = '/php/';
echo trim($str, '/') . '<br>';
//Дана строка 'слова слова слова.'. В конце этой строки может быть точка, а может и не быть. Сделайте так, чтобы в конце этой строки гарантировано стояла точка. То есть: если этой точки нет - ее надо добавить, а если есть - ничего не делать. Задачу решите через rtrim без всяких ифов.
$str = 'слова слова слова.';
$str = rtrim($str, '.') . '.';
echo $str . '<br><br>';

//Работа с strrev:
//Дана строка '12345'. Сделайте из нее строку '54321'.
$str = '12345';
$str = strrev($str);
echo $str . '<br>';
//Проверьте, является ли слово палиндромом (одинаково читается во всех направлениях, примеры таких слов: madam, otto, kayak, nun, level).
$str = 'madam';
$strReverse = strrev($str);
if ($str === $strReverse) {
    echo 'Является палиндромом' . '<br>';
} else {
    echo 'Не является палиндромом' . '<br>';
}

//Работа с number_format:
//Дана строка '12345678'. Сделайте из нее строку '12 345 678'.
$str = '12345678';
$str = number_format($str, 0, ' ', ' ');
echo $str . '<br><br>';


//Нарисуйте пирамиду, как показано ниже, только у вашей пирамиды должно быть 9 рядов, а не 5. Решите задачу с помощью одного цикла и функции str_repeat.

//            xx
//            xxx
//            xxxx
//            xxxxx
$str = 'x';
for ($i = 1; $i<5; $i++){
    echo str_repeat($str, $i).'<br>';
}
echo '<br>';
//Нарисуйте пирамиду, как показано ниже. Решите задачу с помощью одного цикла и функции str_repeat.
//1
//22
//333
//4444
//55555
//666666
//7777777
//88888888
//999999999
for ($i = 1; $i<10; $i++){
    $str = $i;
    echo str_repeat($str, $i).'<br>';
}
echo '<br>';

//Работа с strip_tags и htmlspecialchars
//Дана строка 'html, <b>php</b>, js'. Удалите теги из этой строки.
$str = 'html, <b>php</b>, js';
echo strip_tags($str).'<br>';
//Дана строка $str. Удалите все теги из этой строки, кроме тегов <b> и <i>.
$str = '<strong>html<br>, <b>php</b><br>, <i>js</i></strong>';
echo strip_tags($str, '<b><i>')."<br>";
//Дана строка 'html, <b>php</b>, js'. Выведите ее на экран 'как есть': то есть браузер не должен преобразовать <b> в жирный.
$str = 'html, <b>php</b>, js';
echo htmlspecialchars($str).'<br>';
echo '<br>';

//Доп задачи:
//Преобразуйте строку 'var_test_text' в 'varTestText'. Скрипт, конечно же, должен работать с любыми аналогичными строками.
$str = 'var_test_text';
$arr = explode('_', $str);
for ($i=1; $i<count($arr); $i++){
    $arr[$i] = ucfirst($arr[$i]);
}
$str = implode('',$arr);
echo $str . '<br><br>';
//Дан массив с числами. Выведите на экран все числа, в которых есть цифра 3.
unset($arr);
$arr = [123, 534,153,127, 276, 3467, 652];
foreach ($arr as $elem){
    if (strpbrk($elem, '3')){
        echo $elem.'<br>';
    }
}
echo '<br>';