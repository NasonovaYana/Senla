<?php
include 'connection.php';
/** @var $connection  Object|null */

if(isset($_GET['id'])){
    $id = $_GET['id'];
    echo $id;
    $query = "DELETE FROM workers WHERE id = $id";
    $qw = mysqli_query($connection, $query);
    if ($qw) {
        echo "<p>Удалено.</p>";
    } else {
        echo '<p>Произошла ошибка: ' . mysqli_error($connection) . '</p>';
    }
    $new_url = 'index.php';
    header('Location: ' . $new_url);
}
