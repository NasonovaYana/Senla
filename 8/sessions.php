<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);
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

//Запишите в сессию время захода пользователя на сайт. При обновлении страницы выводите сколько секунд назад пользователь зашел на сайт.
if (!isset($_SESSION['firstTime'])) {
    $_SESSION['firstTime'] = time();
}
$timeToFirstTime = time() - $_SESSION['firstTime'];
echo "Вы впервые зашли на сайт $timeToFirstTime секунд назад";
//Спросите у пользователя email с помощью формы. Затем сделайте так, чтобы в другой форме (поля: имя, фамилия, пароль, email) при ее открытии поле email было автоматически заполнено.
if (!isset($_POST['usersMail'])) {
    //echo $forms['usersMail'];
} else {
    $_SESSION['usersMail'] = $_POST['usersMail'];
    $usersMail = $_SESSION['usersMail'];
    echo "<form method='post'><input name='name' placeholder='Имя'><input name='lastName' placeholder='Фамилия'><input name='mail' value='$usersMail'><input type='submit'> </form>";
}



