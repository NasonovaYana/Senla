<?php
include 'code.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $qw = deleteFromDb($id);
}
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
<?php if (!$qw):?>
    <p>Произошла ошибка.</p>
<?php else:?>
    <p>Удалено<p>
    <?php endif;?>
    <a href="index.php">Главная</a>
</body>
</html>
