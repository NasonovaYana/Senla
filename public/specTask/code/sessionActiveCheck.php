<?php
if (session_status() != 2) {
    $new_url = 'http://localhost:8080/specTask/indexGuest.php';
    header('Location: ' . $new_url);
}