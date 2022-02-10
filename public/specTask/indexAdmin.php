<?php
include "code/passWrong.php";
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
<div class="menu">
    <div class="menu-item"><a href="indexGuest.php">Войти как гость</a></div>
</div>
<main>
    <form method="post" action="code/authorizationAdmin.php">
        <input name='adminName' placeholder="Введите имя">
        <input name="adminPass" type="password" placeholder="Введите пароль">
        <input type="submit" value="Войти">
    </form>
    <?php if ($_SESSION['passWrong'] == 1): ?>
        <h1> Неверный логин или пароль! </h1>
        <?php
        unset($_SESSION['passWrong']);
    endif; ?>
</main>
</body>
</html>
