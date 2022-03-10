<?php
include 'addCode.php';
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
<form method="post" action="addCode.php">
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
