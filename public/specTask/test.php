<?php
include "code/find_test.php";
/** @var $chosenTest string|null */
/** @var $testObj array|null */
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
    <?php if ($certExist==0):?>
    <h1>Тест: <?= str_replace('.json', '', $chosenTest) ?></h1>
    <form method="post" action="check.php">
        <?php
        foreach ($testObj["questions"] as $key => $elem):?>
            <p><?= $elem ?></p>
            <?php
            foreach ($testObj["answers"][$key] as $ans):?>
                <?php if ($ans == "free"): ?>
                    <input type="text" name="<?= $elem ?>"><br>
                <?php else: ?>
                    <input required type="radio" name="<?= $elem ?>" value="<?= $ans ?>"><?= $ans ?><br>
                <?php endif; endforeach; endforeach; ?>
        <input type="submit" value="Завершить тест">
    </form>
    <?php else:?>
        <h1>Вы уже прошли тест: <?= str_replace('.json', '', $chosenTest) ?></h1>
        <img src="<?= "certificates/".$certName?>">
    <?php endif;?>
</main>
</body>
</html>