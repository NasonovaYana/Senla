<?php
session_start();
if (empty($_SESSION['status'])) {
    $new_url = 'http://localhost:8080/specTask/indexGuest.php';
    header('Location: ' . $new_url);
}
