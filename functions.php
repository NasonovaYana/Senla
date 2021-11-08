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
//        Дана строка 'html css php'. Найдите количество символов в этой строке.
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
if ($subStr==='.png' or $subStr==='.jpg') {
    echo 'Да<br>';
} else {
    echo 'Нет<br>';
};
//Дана строка. Если в этой строке более 5-ти символов - вырежите из нее первые 5 символов, добавьте троеточие в конец и выведите на экран. Если же в этой строке 5 и менее символов - просто выведите эту строку на экран.
$str = 'wsddwef';
$strLength=strlen($str);
if($strLength>5){
    $str=substr($str,0,5).'...';
}
echo $str.'<br><br>';

