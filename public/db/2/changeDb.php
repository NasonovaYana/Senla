<?php
session_start();
include "connection.php";
/** @var $connection  Object|null */
//{$workerName},{$workerAge},{$workerSalary}
$id = $_SESSION['id'];

if (isset($_POST["changeName"]) && isset($_POST["changeAge"]) && isset($_POST["changeSalary"])) {
    $namePost = mysqli_real_escape_string($connection, $_POST["changeName"]);
    $agePost = mysqli_real_escape_string($connection, $_POST["changeAge"]);
    $salaryPost = mysqli_real_escape_string($connection, $_POST["changeSalary"]);
    $query = "UPDATE workers SET name='$namePost', age=$agePost ,salary=$salaryPost where id=$id";
    if(mysqli_query($connection, $query)){
        $new_url = 'index.php';
        header('Location: ' . $new_url);
    } else{
        echo "Ошибка: " . mysqli_error($connection);
    }
}

