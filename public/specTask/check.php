<?php
session_start();

include "code/sessionActiveCheck.php";
include "code/testCheck.php";
include "code/certifCreate.php";
/** @var $count int|null */
/** @var $allQw int|null */
/** @var $mistakes array|null */
/** @var $minPoints int|null */
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
    if ($_SESSION['status'] == 'admin'):?>
        <div class="menu-item"><a href="admin.php">Загрузка тестов</a></div>
        <div class="menu-item"><a href="delete.php">Удаление тестов</a></div>
    <?php
        endif;
    ?>
    <div class="menu-item"><a href="list.php">Список тестов</a></div>
</div>

<main>
    <p>Ваш результат: <?= $count ?> из <?= $allQw ?> баллов</p>
    <?php
        foreach ($mistakes as $mistake): ?>
        <p> Ошибка в вопросе <?= $mistake[0] ?></p>
        <p style="color: red">Ваш ответ: <?= $mistake[1] ?></p>
        <p style="color: green">Верный ответ:<?= $mistake[2] ?></p>
    <?php
        endforeach;
        ?>
    <?php if ($count >= $minPoints): ?>
        <form action="certificate.php">
            <input class="certif" type="submit" value="Скачать сертификат">
        </form>
    <?php else: ?>
        <p>Вы не набрали достаточно баллов для получения сертификата.</p>
    <?php
        endif;
        ?>
</main>
</body>
</html>
