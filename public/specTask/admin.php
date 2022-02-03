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
    <form method="post" enctype="multipart/form-data">
        <input required name="fileName" placeholder="название теста">
        <input required type="file" name='newTest'>
        <input type="submit">
    </form>
    <?php
    if (isset($_POST['fileName']) and isset($_FILES['newTest']['tmp_name'])) {
        $fileName = $_POST['fileName'];
        $tmpPath = $_FILES['newTest']['tmp_name'];
        move_uploaded_file($tmpPath, "upload_tests\\" . $fileName . ".json");
        $new_url = 'http://localhost:63342/senla_rep/public/%D0%A1%D0%BF%D0%B5%D1%86%D0%B7%D0%B0%D0%B4%D0%B0%D0%BD%D0%B8%D0%B5/list.php';
        header('Location: '.$new_url);
    }
    ?>
</main>
</body>
</html>
