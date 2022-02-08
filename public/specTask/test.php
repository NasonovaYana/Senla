<?php
session_start();
include "code/sessionActiveCheck.php";

include "code/findTest.php";

/** @var $chosenTest string|null */
/** @var $questions array|null */
/** @var $certExist bool|null */
/** @var $certName string|null */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,200;0,400,500;1,100&display=swap"
          rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="menu">
    <?php
    if ($_SESSION['status'] == 'admin'):
        ?>
        <div class="menu-item"><a href="admin.php">Загрузка тестов</a></div>
        <div class="menu-item"><a href="delete.php">Удаление тестов</a></div>
    <?php endif; ?>
    <div class="menu-item"><a href="list.php">Список тестов</a></div>
</div>
<main>
    <?php if ($certExist == 0): ?>
        <h1>Тест: <?= str_replace('.json', '', $chosenTest) ?></h1>
        <form method="post" action="check.php">
            <?php
            foreach ($questions as $key=>$task):?>
                <p> <?= $task["qw"]?></p>
                <?php if($task['free']==1):?>
                    <input type="text" name="<?= $key ?>"><br>
                <?php else: foreach ($task['ans'] as $ans):?>
                    <input required type="radio" name="<?= $key?>" value="<?= $ans ?>"><?= $ans ?><br>
                <?php endforeach; endif; endforeach;?>
            <input type="submit" value="Завершить тест">
        </form>
    <?php else: ?>
        <h1>Вы уже прошли тест: <?= str_replace('.json', '', $chosenTest) ?></h1>
        <img src="<?= "certificates/" . $certName ?>">
    <?php endif; ?>
</main>
</body>
</html>