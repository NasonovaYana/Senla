<?php
include 'code.php';

///** @var $connection  Object|null */

$limit = 2;
$result = get();
$pageCount = countRow();
//$pageCount = mysqli_num_rows($result);
$pageCount = round($pageCount / $limit);
if (isset($_GET['pageCurrent'])) {
    $nav = $_GET['pageCurrent'];
} else {
    $nav = 0;
}
$nav = intval($nav);
//include "delete.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="prec onnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,200;0,400,500;1,100&display=swap"
          rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<h3>Навигация</h3>
<?php
for ($i = 1; $i <= $pageCount; $i++):
    if ($i != $nav):?>
        <a href="index.php?pageCurrent=<?= $i ?>"><?= $i ?></a>
    <?php
    else:?>
        <span><?= $i ?></span>
    <?php endif; endfor;
?>
<hr>
<table>
    <tr>
        <td>id</td>
        <td>Имя</td>
        <td>Возраст</td>
        <td>Зарплата</td>
    </tr>
    <?php
    if (!isset($_GET['pageCurrent'])) {
        $page = 0;
    } else {
        $page = $_GET['pageCurrent'] * $limit - $limit;
    }
    $num = $page + 2;
    $result = get($page,$num);
    while ($workers = mysqli_fetch_array($result)):?>
        <tr>
            <td><p><b><?= $workers['name'] ?></b></p></td>
            <td><p><?= $workers['age'] ?></td>
            <td><p><?= $workers['salary'] ?></td>
            </p>
            <td><a href='delete.php?id=<?= $workers['id'] ?>'>Удалить</a></td>
            <td><a href='update.php?id=<?= $workers['id']?>'>Редактировать</a></td>
        </tr>
    <?php endwhile; ?>
</table>
<br>
<a href="add.php">Добавить сотрудника</a>
</body>
</html>
