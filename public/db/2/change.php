<?php
session_start();
include 'connection.php';
/** @var $connection  Object|null */
$_SESSION['id'] = $_GET['id'];
$id = $_GET['id'];
$result = mysqli_query($connection, "SELECT * from workers WHERE id=$id");
while ($mass = mysqli_fetch_array($result)) {
    $id = $mass['id'];
    $name = $mass['name'];
    $age = $mass['age'];
    $salary = $mass['salary'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="prec onnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,200;0,400,500;1,100&display=swap"
          rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<form method="post" action="changeDb.php">
    <label><?=$name?></label>
    <input name ="changeName" placeholder="Имя">
    <label><?=$age?></label>
    <input name="changeAge" placeholder="Возраст">
    <label><?=$salary?></label>
    <input name ="changeSalary" placeholder="Зарплата">
    <input type="submit">
</form>
<a href="index.php">Главная</a>
</body>
</html>