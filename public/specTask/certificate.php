<?php
include "code/sessionActiveCheck.php";

include "code/certCode.php";
/** @var $path string|null */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,200;0,400,500;1,100&display=swap"
          rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="menu">
    <?php
    if ($_SESSION['status'] == 'admin'):
        ?>
        <div class="menu-item"><a href="admin.php">Загрузка тестов</a></div>
        <div class="menu-item"><a href="delete.php">Удаление тестов</a></div>
    <?php endif; ?>
    <div class="menu-item"><a href="list.php">Список тестов</a></div>
    <div class="menu-item"><a href="code/exit.php">Выйти</a></div>
</div>

<main>
    <img src="<?= $path ?>">
</main>
</body>
</html>