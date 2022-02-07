<?php
session_start();
if (isset($_GET["test"])) {
    $chosenTest = $_GET["test"].'.json';
    $_SESSION['test'] = $chosenTest;
}
if(!file_exists("upload_tests/" .$_SESSION['test'])){
    header("HTTP/1.0 404 Not Found");
    exit;
}
$json = file_get_contents("upload_tests/" . $chosenTest);
$testObj = json_decode($json, true);