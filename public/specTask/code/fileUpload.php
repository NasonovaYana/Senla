<?php
session_start();
if (isset($_POST['fileName']) and isset($_FILES['newTest']['tmp_name'])) {
    $fileName = $_POST['fileName'];
    $tmpPath = $_FILES['newTest']['tmp_name'];
    move_uploaded_file($tmpPath, "upload_tests/" . $fileName . ".json");
    $new_url = 'http://localhost:8080/specTask/list.php';
    header('Location: '.$new_url);
}