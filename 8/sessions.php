<?php
$forms = include './sessions_forms.phtml';
//Работа с сессиями
//По заходу на страницу запишите в сессию текст 'test'. Затем обновите страницу и выведите содержимое сессии на экран.
session_start();
if (!isset($_SESSION['test'])) {
    $_SESSION['test'] = 'test';
} else {
    echo $_SESSION['test'];
}
//Пусть у вас есть две страницы сайта. Запишите на первой странице что-нибудь в сессию, а затем выведите это при заходе на другую страницу.
if (!isset($_SESSION['firstPageText'])) {
    $_SESSION['firstPageText'] = 'Hello';
}
echo $forms['hrefNext'];

//Сделайте счетчик обновления страницы пользователем. Данные храните в сессии. Скрипт должен выводить на экран количество обновлений. При первом заходе на страницу он должен вывести сообщение о том, что вы еще не обновляли страницу.
if (!isset($_SESSION['count'])) {
    $_SESSION['count'] = 0;
    echo "Вы не обновляли страницу<br>";
} else {
    $_SESSION['count']++;
}
$count = $_SESSION['count'];
echo "Вы обновили страницу $count раз<br>";

//Сделайте две страницы: index.php и test.php. При заходе на index.php спросите с помощью формы страну пользователя, запишите ее в сессию (форма при этом должна отправится на эту же страницу). Пусть затем пользователь зайдет на страницу test.php - выведите там страну пользователя.
echo $forms['hrefIndex'];

//Запишите в сессию время захода пользователя на сайт. При обновлении страницы выводите сколько секунд назад пользователь зашел на сайт.
if (!isset($_SESSION['firstTime'])) {
    $_SESSION['firstTime'] = time();
}
$timeToFirstTime = time() - $_SESSION['firstTime'];
echo "Вы впервые зашли на сайт $timeToFirstTime секунд назад";
//Спросите у пользователя email с помощью формы. Затем сделайте так, чтобы в другой форме (поля: имя, фамилия, пароль, email) при ее открытии поле email было автоматически заполнено.
if (!isset($_POST['usersMail'])) {
    echo $forms['usersMail'];
} else {
    $_SESSION['usersMail'] = $_POST['usersMail'];
    $usersMail = $_SESSION['usersMail'];
    echo "<form method='post'><input name='name' placeholder='Имя'><input name='lastName' placeholder='Фамилия'><input name='mail' value='$usersMail'><input type='submit'> </form>";
}
//Работа со cookie
//По заходу на страницу запишите в куку с именем test текст '123'. Затем обновите страницу и выведите содержимое этой куки на экран.
if (!isset($_COOKIE['test'])) {
    setcookie('test', '123');
} else {
    echo $_COOKIE['test'];
}
//Удалите куку с именем test.
//setcookie('test','',time()-60);
//Сделайте счетчик посещения сайта посетителем. Каждый раз, заходя на сайт, он должен видеть надпись: 'Вы посетили наш сайт % раз!'.
$count = isset($_COOKIE['count'])?$_COOKIE['count']:0;
$count++;
setcookie('count',$count, time()+3600*24*365);
echo "<br> Вы посетили сайт ". $_COOKIE['count'] ." раз<br>";
//Спросите дату рождения пользователя. При следующем заходе на сайт напишите сколько дней осталось до его дня рождения. Если сегодня день рождения пользователя - поздравьте его!
echo $forms['usersBDay'];

if(!isset($_COOKIE['bday'])){
    if(isset($_POST['usersBDay'])){
        $strDB=$_POST['usersBDay'];
    }
    setcookie('bday',$strDB,time()+3600 );
}else {
    $timeStr = explode('.', $_COOKIE['bday']);
    $year = date('Y');
    $timeBD = (mktime(0, 0, 0, $timeStr[1], $timeStr[0], $year) - time()) / (3600 * 24);
    if ($timeBD < 0) {
        $year++;
        $timeBD = (mktime(0, 0, 0, $timeStr[1], $timeStr[0], $year) - time()) / (3600 * 24);
    }
    echo "<br>Дней до Дня рождения: ".ceil($timeBD)."<br>";
    if(ceil($timeBD)==0){
        echo "С Днём Рождения!<br>";
    }
}


//Повторение:
echo '<br>Повторение:<br>';
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
//
//Задайте дату-время в формате '2025-12-31T12:13:59'. С помощью функции strtotime и функции date преобразуйте ее в формат '12:13:59 31.12.2025'.
//
//Пусть в директории со скриптом лежит папка dir, а в ней какие-то текстовые файлы. Переберите эти файлы циклом и выведите их тексты в браузер.
//
//Пусть в директории со скриптом лежит файл test.txt, в котором записано некоторое число. Откройте этот файл, возведите число в квадрат и запишите обратно в файл.
//
//С помощью preg_match определите, что переданная строка является доменом 3-го уровня. Примеры доменов: hello.site.ru, hello.site.com, hello.my-site.com.
$str = 'hello.site.ru';
var_dump(preg_match('#^[a-z]+\.[a-z]+\.[a-z]+$#', $str));
//С помощью позитивного и негативного просмотра найдите все строки по шаблону любая буква, но не b, затем 3 буквы a и поменяйте 3 буквы a на знак '!'. То есть из, к примеру, 'waaa' нужно сделать 'w!', а 'baaa' не поменяется.
$str = 'waaa baaa';
echo "<br>".preg_replace('#(?<=[^b])(aaa)#','!',$str);