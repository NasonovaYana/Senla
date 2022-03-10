<?php
include "codeDB.php";

$limit = 2;
$pages = countRow();
//TODO ИСПРАВЛЕНО не перезаписывать переменную
$pageCount = round($pages / $limit);
if (isset($_GET['pageCurrent'])) {
    $nav = $_GET['pageCurrent'];
} else {
    $nav = 0;
}
$nav = intval($nav);

if (!isset($_GET['pageCurrent'])) {
    $page = 0;
} else {
    $page = $_GET['pageCurrent'] * $limit - $limit;
}
$num = $page + 2;

$workers = get($page,$num);
