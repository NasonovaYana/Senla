<?php
session_start();
$arr = $_POST;
$allQw = count($arr);
$count = 0;
$testArr = $_SESSION['testArr'];
foreach ($arr as $qw => $ans) {

    if ($ans == $testArr[$qw][array_key_last($testArr[$qw])]) {
        $count++;
    }
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,200;0,400,500;1,100&display=swap"
          rel="stylesheet">
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="menu">
    <div class="menu-item"><a href="admin.php">Загрузка тестов</a></div>
    <div class="menu-item"><a href="list.php">Список тестов</a></div>
</div>
<main>
    <?php
    echo "Ваш результат: $count из $allQw баллов";
    $img="certificate.png";
    //$pic = ImageCreateFromPng($img);

    ?>
</main>
</body>
</html>
