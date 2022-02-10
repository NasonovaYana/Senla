<?php
session_start();
if (isset($_POST['adminName']) and isset($_POST['adminPass'])) {
    // $json = file_get_contents("admin/" . $_POST['adminName'].'.json');
    $json = file_get_contents("../admin/admin.json");
    $admin = json_decode($json, true);
    if ($_POST['adminName'] == $admin["login"] and $_POST['adminPass'] == $admin['pass']) {
        $_SESSION['status'] = 'admin';
        $_SESSION['userName'] = $_POST['adminName'];
        $new_url = 'http://localhost:8080/specTask/list.php';
        header('Location: ' . $new_url);
    } else {
        $_SESSION['passWrong'] = 1;
        $new_url = 'http://localhost:8080/specTask/indexAdmin.php';
        header('Location: ' . $new_url);
    }
}