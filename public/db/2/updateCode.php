<?php
$id = $_SESSION['id'];
include 'codeDB.php';

//TODO ИСПРАВЛЕНО вернётся одна запись, цикл не нужен,
$workers = getById($id);
$id = $workers['id'];
$name = $workers['name'];
$age = $workers['age'];
$salary = $workers['salary'];

if(!isset($name)){
    http_response_code(404);
    exit();
}
