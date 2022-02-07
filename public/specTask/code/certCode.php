<?php
session_start();
if($_SESSION['openCert'] == 1){
$path = $_SESSION['certificatePath'];
$_SESSION['openCert'] = 0;}
else{
    $new_url = 'http://localhost:8080/specTask/list.php';
    header('Location: '.$new_url);
}