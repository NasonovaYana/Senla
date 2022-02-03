<?php
session_start();
$arr = $_POST;
$nameUser = $arr['userName'];
$count = 0;
$nameTest = $_SESSION['test'];
$json = file_get_contents("upload_tests\\" . $nameTest);
$testArr = json_decode($json, true);
$allQw = count($testArr);
$mistakes = [];
foreach ($testArr as $task)
{
    $qw = $task["qw"];
    if ($task["right"]==$arr[$qw]){
        $count++;
    }else{
        $mistakes[] = [$qw, $arr[$qw], $task["right"]];
    }
}
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
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="menu">
    <div class="menu-item"><a href="admin.php">Загрузка тестов</a></div>
    <div class="menu-item"><a href="list.php">Список тестов</a></div>
</div>
<main>
    <?php

//    if(in_array('gd', get_loaded_extensions())) {
//
//        echo 'GD ON';
//
//    } else {
//
//        echo 'GD OFF';
//
//    }
    echo "Ваш результат: $count из $allQw баллов";
    $img="certificate.png";
    foreach ($mistakes as $mistake): ?>
    <p> Ошибка в вопросе <?=$mistake[0]?></p>
    <p style="color: red">Ваш ответ: <?=$mistake[1]?></p>
    <p style="color: green">Верный ответ:<?=$mistake[2]?></p>
    <?php endforeach;?>
</main>
</body>
</html>
