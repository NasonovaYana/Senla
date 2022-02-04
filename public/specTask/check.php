<?php
session_start();
$nameUser = $_POST['userName'];
$userAns = $_POST;;
unset($userAns['userName']);
$userAns = array_values($userAns);
$count = 0;
$nameTest = $_SESSION['test'];
$json = file_get_contents("upload_tests/" . $nameTest);
$testArr = json_decode($json, true);
$minPoints = $testArr["minimal"];
$allQw = count($testArr["right"]);
$rightAns=$testArr["right"];
$mistakes = [];
foreach ($userAns as $key=>$elem){
    if($elem == $rightAns[$key]){
        $count++;
    }else{
        $mistakes[]=[$testArr["questions"][$key],$elem,$rightAns[$key]];
    }
}
$img="img/certificate.png";
$font = "fonts/arial.ttf";
$font_size = 34;
$degree = 0;
$text = "$nameUser";
$y = 240;
$x = 295;
$pic = imagecreatefrompng($img);
$color = imagecolorallocate($pic, 99, 99, 99);
imagettftext($pic, $font_size, $degree, $x, $y, $color, $font, $text);
$y = 360;
$x = 290;
$font_size = 28;
$text = "$count из $allQw";
imagettftext($pic, $font_size, $degree, $x, $y, $color, $font, $text);
imagepng($pic, "certificates/".time().".png");
imagedestroy($pic);
$_SESSION['certificatePath'] = "certificates/".time().".png";
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
    <div class="menu-item"><a href="admin.php">Загрузка тестов</a></div>
    <div class="menu-item"><a href="list.php">Список тестов</a></div>
</div>

<main>
    <p>Ваш результат: <?=$count?> из <?=$allQw?> баллов</p>
    <?php
    foreach ($mistakes as $mistake): ?>
    <p> Ошибка в вопросе <?=$mistake[0]?></p>
    <p style="color: red">Ваш ответ: <?=$mistake[1]?></p>
    <p style="color: green">Верный ответ:<?=$mistake[2]?></p>
    <?php endforeach;?>
    <?php if ($count>=$minPoints):?>
    <form action="certificate.php">
        <input class="certif" type="submit" value="Скачать сертификат">
    </form>
    <?php else:?>
    <p>Вы не набрали достаточно баллов для получения сертификата.</p>
    <?php endif;?>
</main>
</body>
</html>
