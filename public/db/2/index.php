<?php
include 'connection.php';
include "delete.php";
/** @var $connection  Object|null */

$count = 2;
$result = mysqli_query($connection, "SELECT * from workers");
$pageNum = mysqli_num_rows($result);
$pageNum = round($pageNum / $count);
if (isset($_GET['str'])) {
    $nav = $_GET['str'];
} else {
    $nav = 0;
}
$nav = intval($nav);
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
for ($i = 1; $i <= $pageNum; $i++):
    if ($i != $nav):?>
        <a href="index.php?str=<?= $i ?>"><?= $i ?></a>
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
    if (!isset($_GET['str'])) {
        $str = 0;
    } else {
        $str = $_GET['str'] * $count - $count;
    }
    $num = $str + 2;
    $result = mysqli_query($connection, "SELECT * FROM workers LIMIT $str, $num");
    while ($mass = mysqli_fetch_array($result)):?>
        <tr>
            <td><p><?= $mass['id'] ?></p></td>
            <td><p><b><?= $mass['name'] ?></b></p></td>
            <td><p><?= $mass['age'] ?></td>
            <td><p><?= $mass['salary'] ?></td>
            </p>
            <td><a href='delete.php?del_id=<?= $mass['id'] ?>'>Удалить</a></td>
            <td><a href='change.php?change_id=<?= $mass['id'] ?>'>Редактировать</a></td>
        </tr>
    <?php endwhile; ?>
</table>
<br>
<a href="add.php">Добавить сотрудника</a>
</body>
</html>
