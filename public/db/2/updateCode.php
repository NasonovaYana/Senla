<?php
include 'codeDB.php';
$id = $_GET['id'];
var_dump($id);
//TODO ИСПРАВЛЕНО вернётся одна запись, цикл не нужен,
$workers = getById($id);
$id = $workers['id'];
$name = $workers['name'];
$age = $workers['age'];
$salary = $workers['salary'];

if(is_null($workers)){
    http_response_code(404);
    exit();
}
