<?php
include 'indexCode.php';
/** @var $pageCount int|null */
/** @var $limit int|null */
/** @var $page int|null */
/** @var $nav int|null */
/** @var $page int|null */
/** @var $num int|null */
/** @var $workers array|null */

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
    //TODO ИСПРАВЛЕНО должен сразу вернуться массив

    foreach ($workers as $worker):?>
    <tr>
        <td><p><b><?= $worker[1] ?></b></p></td>
        <td><p><?= $worker[2] ?></td>
        <td><p><?= $worker[3] ?></td>
        </p>
        <td><a href='delete.php?id=<?= $worker[0] ?>'>Удалить</a></td>
        <td><a href='update.php?id=<?= $worker[0]?>'>Редактировать</a></td>
    </tr>
<?php endforeach;?>
</table>
<br>
<a href="add.php">Добавить сотрудника</a>
</body>
</html>
