<?php
include "connection.php";
/** @var $connection  Object|null */
//{$workerName},{$workerAge},{$workerSalary}

if (isset($_POST["workerName"]) && isset($_POST["workerAge"]) && isset($_POST["workerSalary"])) {
    $namePost = mysqli_real_escape_string($connection, $_POST["workerName"]);
    $agePost = mysqli_real_escape_string($connection, $_POST["workerAge"]);
    $salaryPost = mysqli_real_escape_string($connection, $_POST["workerSalary"]);
    $query = "INSERT INTO workers (name, age,salary) VALUES ('$namePost', $agePost, $salaryPost)";
 if(mysqli_query($connection, $query)){
     $new_url = 'index.php';
     header('Location: ' . $new_url);
  } else{
      echo "Ошибка: " . mysqli_error($connection);
   }
}

