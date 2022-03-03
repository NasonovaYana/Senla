<?php
session_start();
include "saveValue.php";
/** @var $valueName  string|null */
/** @var $valueAge  string|null */
/** @var $valueSalary  string|null */
$formName = (isset($valueName)) ?  $valueName: '';
$_SESSION['workerName']=$formName;
$formAge = (isset($valueAge)) ?  $valueAge: '';
$_SESSION['workerAge']=$formAge;
$formSalary = (isset($valueSalary)) ? $valueSalary: '';
$_SESSION['workerSalary']=$formSalary;

function inputCreate($name){
    $value = $_SESSION[$name];
    echo "<input name =$name value =$value>";
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
<form method="post" action="addToDb.php">
    <label>Имя</label>
    <?php inputCreate('workerName');?>
    <label>Возраст</label>
    <?php inputCreate('workerAge');?>
    <label>Зарплата</label>
    <?php inputCreate('workerSalary');?>
    <input type="submit">
</form>
<a href="index.php">Главная</a>
</body>
</html>
