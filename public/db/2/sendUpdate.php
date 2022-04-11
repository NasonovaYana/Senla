<?php
//убрать функции mysqli в codeDB
include 'codeDB.php';
if (isset($_POST['updateId'])){
$id = $_POST["updateId"];}
//обязательна валидация
if (isset($_POST["changeName"]) && isset($_POST["changeAge"]) && isset($_POST["changeSalary"])) {
    $connection = connectionToDb();
    $namePost = mysqli_real_escape_string($connection, $_POST["changeName"]);
    $agePost = mysqli_real_escape_string($connection, $_POST["changeAge"]);
    $salaryPost = mysqli_real_escape_string($connection, $_POST["changeSalary"]);
    $qw = update($id, $namePost, $agePost, $salaryPost);
  if($qw){
        $new_url = 'index.php';
        header('Location: ' . $new_url);
    } else{
        http_response_code(404);
    }
}