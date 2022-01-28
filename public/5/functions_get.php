<?php
/*$id = $_GET['blockId'];
$task = $_GET['task'];
echo "Block ID = $id<br>";
echo "task = $task<br><br>";*/

// todo переписать на нормальную интеграцию php и html
//Задачи на формы:
//Спросите имя пользователя с помощью формы. Результат запишите в переменную $name. Выведите на экран фразу 'Привет, %Имя%'.

$forms = include './forms_for_get.phtml';
echo $forms['form1'];

if (isset($_GET['name'])) {
    $name = $_GET['name'];
    echo "Привет, $name!<br><br>";
}
/*
//Спросите у пользователя имя, возраст, а также попросите его ввести сообщение (его сделайте в textarea). Выведите эти данные на экран в формате, приведенном под данной задачей. Позаботьтесь о том, чтобы пользователь не мог вводить теги (просто удаляйте их) и таким образом сломать сайт.

echo $forms['form2'];
if (isset($_GET['userName']) and isset($_GET['userAge']) and isset($_GET['message'])) {
    $userName = $_GET['userName'];
    $age = $_GET['userAge'];
    $message = strip_tags($_GET['message']);
    echo "Привет, $userName, $age лет.<br> Твоё сообщение: $message<br><br>";
}

//Спросите возраст пользователя. Если форма была отправлена и введен возраст, то выведите его на экран, а форму уберите. Если же форма не была отправлена (это будет при первом заходе на страницу) - просто покажите ее.
if (!isset($_GET['age'])) {
    echo $forms['form3'];
} else {
    $age = $_GET['age'];
    echo $age . '<br><br>';
}
//Спросите у пользователя логин и пароль (в браузере должен быть звездочками). Сравните их с логином $login и паролем $pass, хранящихся в файле. Если все верно - выведите 'Доступ разрешен!', в противном случае - 'Доступ запрещен!'. Сделайте так, чтобы скрипт обрезал концевые пробелы в строках, которые ввел пользователь.
echo $forms['form4'];
$login = 'qwerty';
$pass = '12345';

if (isset($_GET['login']) and isset($_GET['password'])) {
    $loginUsers = trim($_GET['login']);
    $password = trim($_GET['password']);
    if ($password == $pass and $loginUsers == $login) {
        echo "Доступ разрешён!<br>";
    } else {
        echo "Доступ запрещён!<br>";
    }
}

//Спросите имя пользователя с помощью формы. Результат запишите в переменную $name. Сделайте так, чтобы после отправки формы значения ее полей не пропадали.
if (!isset($_GET['nameUser'])) {
    echo $forms['form5'];
} else {
    $nameUser = $_GET['nameUser'];
    echo $forms['form6'];
    echo $nameUser;
}

//Спросите у пользователя имя, а также попросите его ввести сообщение (textarea). Сделайте так, чтобы после отправки формы значения его полей не пропадали.
if (!isset($_GET['nameUserAgain']) and !isset($_GET['userMassage'])) {
    echo $forms['form7'];
} else {
    $a = 'gy';
    $nameUserAgain = $_GET['nameUserAgain'];
    $userMessage = $_GET['userMessage'];
    echo $forms['form8'];
}
*/