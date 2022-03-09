<?php
include 'code.php';
$_SESSION['id'] = $_GET['id'];
$id = $_GET['id'];
$result = getById($id);

while ($workers = mysqli_fetch_array($result)) {
    $id = $workers['id'];
    $name = $workers['name'];
    $age = $workers['age'];
    $salary = $workers['salary'];
}

if(!isset($name)){
    http_response_code(404);
    exit();
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
<form method="post" action="code.php">
    <label>Имя</label>
    <input name="changeName" placeholder="Имя" value="<?= $name ?>">
    <label>Возраст</label>
    <input name="changeAge" placeholder="Возраст" value="<?= $age ?>">
    <label>Зарплата</label>
    <input name="changeSalary" placeholder="Зарплата" value="<?= $salary ?>">
    <input type="submit">
</form>
<a href="index.php">Главная</a>
</body>
</html>