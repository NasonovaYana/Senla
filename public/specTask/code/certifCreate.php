<?php
function certificatePng($nameUser, $count, $allQw){
$img = "img/certificate.png";
$font = "fonts/arial.ttf";
$font_size = 34;
$degree = 0;
//$nameUser = $_SESSION['userName'];
$text = "$nameUser";
$y = 240;
$center = 350;
$box = imagettfbbox($font_size, 0, $font, $text);
$x = $center - round(($box[2] - $box[0]) / 2);
$pic = imagecreatefrompng($img);
$color = imagecolorallocate($pic, 99, 99, 99);

imagettftext($pic, $font_size, 0, $x, $y, $color, $font, $text);

$y = 360;
$font_size = 28;
//$text = $_SESSION['count'] . " из " . $_SESSION['allQw'];
$text = $count . " из " . $allQw;
$box = imagettfbbox($font_size, 0, $font, $text);
$x = $center - round(($box[2] - $box[0]) / 2);

imagettftext($pic, $font_size, $degree, $x, $y, $color, $font, $text);
imagepng($pic, "certificates/" . $nameUser . "_" . str_replace('.json', '', $_SESSION['test']) . ".png");
imagedestroy($pic);
$_SESSION['certificatePath'] = "certificates/" . $nameUser . "_" . str_replace('.json', '', $_SESSION['test']) . ".png";}