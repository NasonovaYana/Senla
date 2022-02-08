<?php

if (isset($_GET["test"])) {
    $chosenTest = $_GET["test"].'.json';
    $_SESSION['test'] = $chosenTest;
}
if(!file_exists("upload_tests/" .$_SESSION['test'])){
    http_response_code(404);
    exit;
}
$certificates = scandir("certificates");
$certName = $_SESSION['userName']."_".str_replace(".json",'',$_SESSION['test']).".png";

foreach ($certificates as $elem){
    if ($elem == $certName){
        $certExist = 1;
        break;
    }
else{$certExist = 0;}}
$json = file_get_contents("upload_tests/" . $chosenTest);
$testObj = json_decode($json, true);