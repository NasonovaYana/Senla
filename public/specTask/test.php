<?php
session_start();
//$testFileName = $_SESSION['test'];

if (isset($_GET["test"])) {
    $chosenTest = $_GET["test"].'.json';
    $_SESSION['test'] = $chosenTest;
}
if(!file_exists("upload_tests/" .$_SESSION['test'])){
    header("HTTP/1.0 404 Not Found");
    exit;
}

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
    <div class="menu-item"><a href="admin.php">Загрузка тестов</a></div>
    <div class="menu-item"><a href="list.php">Список тестов</a></div>
</div>
<main>
    <h1>Тест: <?= str_replace('.json', '', $chosenTest) ?></h1>
    <form method="post" action="check.php">
        <input required name = 'userName' placeholder="Введите имя">
        <?php
        $json = file_get_contents("upload_tests/" . $chosenTest);
        $testObj = json_decode($json, true);
        foreach ($testObj["questions"] as $key=>$elem):?>
            <p><?=$elem?></p>
            <?php
            foreach ($testObj["answers"][$key] as $ans):?>
                <?php if ($ans == "free"):?>
                    <input type="text" name="<?=$elem?>"><br>
                <?php else:?>
                    <input required type="radio" name="<?=$elem?>" value="<?= $ans ?>"><?= $ans ?><br>
                <?php endif; endforeach; endforeach;?>
            <input type="submit" value="Завершить тест">
    </form>
</main>
</body>
</html>