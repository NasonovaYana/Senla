<?php
session_start();
//$testFileName = $_SESSION['test'];

if (isset($_GET["test"])) {
    $chosenTest = $_GET["test"].'.json';
    $_SESSION['test'] = $chosenTest;
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
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="menu">
    <div class="menu-item"><a href="admin.php">Загрузка тестов</a></div>
    <div class="menu-item"><a href="list.php">Список тестов</a></div>
</div>
<main>
    <h1>Тест: <?= str_replace('.json', '', $chosenTest) ?></h1>
    <form method="post" action="check.php">
        <?php
        $json = file_get_contents("upload_tests\\" . $chosenTest);
        $testObj = json_decode($json, true);
        $testForm = $testObj;
        foreach ($testForm

        as $qw => $answers): ?>
        <p><?= $qw ?><p>
            <?php if ($answers[0] == "free"): ?>
                <input type="text" name="<?= $qw ?>"><br>
            <?php else: ?>
                <?php $randAnswers = $answers;
                shuffle($randAnswers);
                foreach ($randAnswers as $ans): ?>
                    <input type="radio" name="<?= $qw ?>" value="<?= $ans ?>"><?= $ans ?><br>
                <?php endforeach; endif;
            endforeach; ?>
            <input type="submit" value="Завершить тест">
    </form>
</main>
</body>
</html>