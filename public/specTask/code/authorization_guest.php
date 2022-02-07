<?php
session_start();
if (isset($_POST['userName'])){
    $_SESSION['status'] = 'guest';
    $_SESSION['userName'] = $_POST['userName'];
    $new_url = 'http://localhost:8080/specTask/list.php';
    header('Location: '.$new_url);
}