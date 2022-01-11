<?php
$input = [];
$s=1;
function countArray($a)
{
        for ($i =0;$i<4;$i++){
    $arr[] = $a;
    $a++;}
        return $arr;

}

$input = countArray($s);
var_dump($input);
