<?php
//Повторение:
echo '<br>Повторение:<br>';
$forms = include './sessions_forms.phtml';
//Создайте массив $arr с элементами 2, 5, 3, 9. Умножьте первый элемент массива на второй, а третий элемент на четвертый. Результаты сложите, присвойте переменной $result. Выведите на экран значение этой переменной.
$arr = [1 => 2, 5, 3, 9];
$result = $arr[1] * $arr[2] + $arr[3] * $arr[4];
echo $result . '<br>';
//С помощью двух вложенных циклов нарисуйте следующую пирамидку:
//        1
//        22
//        333
//        4444
//        55555
//        666666
//        7777777
//        88888888
//        999999999
for ($i = 1; $i < 10; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo $i;
    }
    echo '<br>';
}
//Даны 2 инпута и кнопка. В инпуты вводятся числа. По нажатию на кнопку выведите список общих делителей этих двух чисел.
echo $forms['form1'];
if( isset($_POST['firstNum']) and isset($_POST['secondNum'])) {
    $firstNum = $_POST['firstNum'];
    $secondNum = $_POST['secondNum'];
    function getDivisors($num)
    {
        $arr = range(1, ceil($num / 2));
        return array_filter($arr, fn($item) => ($num % $item === 0));
    }

    function getCommonDivisors($num1, $num2)
    {
        $arr1 = getDivisors($num1);
        $arr2 = getDivisors($num2);
        return array_intersect($arr1, $arr2);
    }
    var_dump(getCommonDivisors($firstNum, $secondNum));
}

//Напишите скрипт, который будет считать факториал числа. Само число вводится в инпут и после нажатия на кнопку пользователь должен увидеть результат.
function fact($num){
    $res = 1;
    while ($num>1){
        $res*=$num;
        $num--;
    }
    // todo DONE while
    return $res;
}
echo $forms['factNum'];
if(isset($_POST['factNum'])) {
    echo "Факториал ".$_POST['factNum'].": ".fact($_POST['factNum'])."<br>";
}

//Задайте дату-время в формате '2025-12-31T12:13:59'. С помощью функции strtotime и функции date преобразуйте ее в формат '12:13:59 31.12.2025'.
$str = '2025-12-31T12:13:59';
echo "<br>".date('H:i:s d.m.Y',strtotime($str))."<br>";
//Пусть в директории со скриптом лежит папка dir, а в ней какие-то текстовые файлы. Переберите эти файлы циклом и выведите их тексты в браузер.
$arr =  array_diff(scandir('dir'), ['..', '.']);
foreach ($arr as $elem){
    echo file_get_contents('dir/'.$elem).'<br>';
}
//Пусть в директории со скриптом лежит файл test.txt, в котором записано некоторое число. Откройте этот файл, возведите число в квадрат и запишите обратно в файл.
$num = file_get_contents('test.txt');
var_dump($num);
$num*=$num;
file_put_contents('test.txt',$num);

//С помощью preg_match определите, что переданная строка является доменом 3-го уровня. Примеры доменов: hello.site.ru, hello.site.com, hello.my-site.com.
$str = 'hello.site.ru';
var_dump(preg_match('#^[a-z]+\.[a-z]+\.[a-z]+$#', $str));
//С помощью позитивного и негативного просмотра найдите все строки по шаблону любая буква, но не b, затем 3 буквы a и поменяйте 3 буквы a на знак '!'. То есть из, к примеру, 'waaa' нужно сделать 'w!', а 'baaa' не поменяется.
$str = 'waaa baaa';
echo "<br>".preg_replace('#(?<=[^b])(aaa)#','!',$str);