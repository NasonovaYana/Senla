<?php
if (isset($_SESSION['status'])) {
    $new_url = 'http://localhost:8080/specTask/list.php';
    header('Location: ' . $new_url);
}
if (empty($_SESSION['passWrong'])){
    $_SESSION['passWrong'] = 0;
}