<?php

session_start();

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
    <div class="menu-item"><a href="indexAdmin.php">Войти как администратор</a></div>
</div>
<main>
    <form method="post" action="code/authorizationGuest.php">
        <input required name = 'userName' placeholder="Введите имя">
        <input type="submit" value="Войти">
    </form>
</main>
</body>
</html>