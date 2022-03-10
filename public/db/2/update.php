<?php

include 'updateCode.php';
/** @var $name string|null */
/** @var $age string|null */
/** @var $salary string|null */

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
<form method="post" action="sendUpdate.php">
    <label>Имя</label>
    <input type="hidden" name="updateId" value="<?=$id?>">
    <input name="changeName" placeholder="Имя" value="<?= $name ?>">
    <label>Возраст</label>
    <input name="changeAge" placeholder="Возраст" value="<?= $age ?>">
    <label>Зарплата</label>
    <input name="changeSalary" placeholder="Зарплата" value="<?= $salary ?>">
    <input type="submit">
</form>
<a href="index.php">Главная</a>
</body>
</html>