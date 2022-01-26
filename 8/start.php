<?php include 'sessions.php';
include 'cookies.php';
ini_set("display_errors", 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<br><br>
<form method="post"><input name="usersMail" placeholder="Введите email"><input type="submit"></form>
<br><br>
<form method="post"><input name="usersBDay" placeholder="Введите дату рождения"><input type="submit"></form>
<br><br>
<br><br>
<br><a href="next.php">Следующая страница</a><br>
<br><a href="index.php">Страница index.php</a><br>
</body>
</html>