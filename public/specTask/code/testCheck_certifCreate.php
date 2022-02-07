<?php
session_start();
$nameUser = $_SESSION['userName'];
$userAns = $_POST;
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
imagepng($pic, "certificates/".$nameUser."_". str_replace('.json','',$_SESSION['test']).time().".png");
imagedestroy($pic);
$_SESSION['certificatePath'] = "certificates/".$nameUser."_". str_replace('.json','',$_SESSION['test']).time().".png";