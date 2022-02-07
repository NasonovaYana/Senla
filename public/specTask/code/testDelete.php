<?php
session_start();
if (isset($_GET["testDelete"])) {
    $chosenTest = $_GET["testDelete"];
    if (!file_exists("../upload_tests/" . $chosenTest)) {
        header("HTTP/1.0 404 Not Found");
        exit;
    } else {
        unlink("../upload_tests/" . $chosenTest);
        $new_url = 'http://localhost:8080/specTask/delete.php';
        header('Location: ' . $new_url);
    }
}
