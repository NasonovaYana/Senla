<?php
$id = $_GET['blockId'];
$task = $_GET['task'];
echo "Block ID = $id<br>";
echo "task = $task<br><br>";

//Задачи на формы:
//Спросите имя пользователя с помощью формы. Результат запишите в переменную $name. Выведите на экран фразу 'Привет, %Имя%'.
echo "
<form action = '' method='get'>
<input placeholder='Введите имя' name = 'name'> 
<input type='submit' value = 'Отправить'>
</form>
";
if (isset($_GET['name'])) {
    $name = $_GET['name'];
    echo "Привет, $name!<br><br>";
}

//Спросите у пользователя имя, возраст, а также попросите его ввести сообщение (его сделайте в textarea). Выведите эти данные на экран в формате, приведенном под данной задачей. Позаботьтесь о том, чтобы пользователь не мог вводить теги (просто удаляйте их) и таким образом сломать сайт.

echo "
<form action = '' method='get'>
<input placeholder='Введите имя' name = 'userName'> 
<input placeholder='Введите возраст' name = 'userAge'> <br><br>
<textarea name = 'message' placeholder='Введите ваше сообщение'></textarea><br><br>
<input type='submit' value = 'Отправить'>
</form>
";
if (isset($_GET['userName']) and isset($_GET['userAge']) and isset($_GET['message'])) {
    $userName = $_GET['userName'];
    $age = $_GET['userAge'];
    $message = strip_tags($_GET['message']);
    echo "Привет, $userName, $age лет.<br> Твоё сообщение: $message<br><br>";
}

//Спросите возраст пользователя. Если форма была отправлена и введен возраст, то выведите его на экран, а форму уберите. Если же форма не была отправлена (это будет при первом заходе на страницу) - просто покажите ее.

if (!isset($_GET['age'])) {
    echo "
<form action = '' method='get'>
<input placeholder='Введите возраст' name = 'age'> <br><br>
<input type='submit' value = 'Отправить'>
</form>
";
} else {
    $age = $_GET['age'];
    echo $age . '<br><br>';
}
//Спросите у пользователя логин и пароль (в браузере должен быть звездочками). Сравните их с логином $login и паролем $pass, хранящихся в файле. Если все верно - выведите 'Доступ разрешен!', в противном случае - 'Доступ запрещен!'. Сделайте так, чтобы скрипт обрезал концевые пробелы в строках, которые ввел пользователь.
echo "
<form action = '' method='get'>
<input placeholder='Введите логин' name = 'login'> <br><br>
<input placeholder='Введите пароль' type='password' name = 'password'> <br><br>
<input type='submit' value = 'Отправить'>
</form>
";
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
    echo "
<form action = '' method='get'>
<input placeholder='Введите имя'  name = 'nameUser'>
<input type='submit' value = 'Отправить'>
</form>
";
} else {
    $nameUser = $_GET['nameUser'];

    echo "
<form action = '' method='get'>
<input placeholder='Введите имя'  name = 'nameUser' value=$nameUser>
<input type='submit' value = 'Отправить'>
</form>
";
    echo $nameUser;
}

//Спросите у пользователя имя, а также попросите его ввести сообщение (textarea). Сделайте так, чтобы после отправки формы значения его полей не пропадали.
if (!isset($_GET['nameUserAgain']) and !isset($_GET['userMassage'])) {
    echo "
<form action = '' method='get'>
<input placeholder='Введите имя'  name = 'nameUserAgain'><br>
<textarea name ='userMessage'></textarea><br>
<input type='submit' value = 'Отправить'>
</form>
";
} else {
    $a = 'gy';
    $nameUserAgain = $_GET['nameUserAgain'];
    $userMessage = $_GET['userMessage'];
    echo "
<form action = '' method='get'>
<input placeholder='Введите имя'  name = 'nameUserAgain' value=$nameUserAgain><br>
<textarea name ='userMessage'>$userMessage</textarea><br>
<input type='submit' value = 'Отправить'>
</form>
";
}
