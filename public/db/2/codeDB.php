<?php
session_start();
//обязательно прописывать типы входящих переменных
function connectionToDb()
{
    $connection = mysqli_connect('localhost', 'root', '1234', 'workers');
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $connection;
}



function get($offset, $limit):array
{
    $connection = connectionToDb();
    if ($limit == '' and $offset == '') {
        $result = mysqli_query($connection, "SELECT * from workers");
    } else {
        $result = mysqli_query($connection, "SELECT * from workers LIMIT $offset, $limit");

    }
    return mysqli_fetch_all($result);
}

function countRow(){
    $connection = connectionToDb();
    $qw = mysqli_query($connection, "SELECT COUNT(*) as count from workers");
    return mysqli_fetch_assoc($qw)['count'];
}

function deleteFromDb($id){
    $connection = connectionToDb();
    $query = "DELETE FROM workers WHERE id = $id";
    return mysqli_query($connection, $query);
}

//не перезаписывать переменные и не назывть их post
function create($namePost, $agePost, $salaryPost)// name, age
{
    $connection = connectionToDb();
    $namePost = mysqli_real_escape_string($connection, $_POST["workerName"]);//prepare
    $agePost = mysqli_real_escape_string($connection, $_POST["workerAge"]);
    $salaryPost = mysqli_real_escape_string($connection, $_POST["workerSalary"]);
    $query = "INSERT INTO workers (name, age,salary) VALUES ('$namePost', $agePost, $salaryPost)";
    if (mysqli_query($connection, $query)) {
        $new_url = 'index.php';
        header('Location: ' . $new_url);
    } else {
        echo "Ошибка: " . mysqli_error($connection);
    }
}

function getById($id):array{
    $connection = connectionToDb();
    $result = mysqli_query($connection, "SELECT * from workers WHERE id=$id");
    return mysqli_fetch_array($result);
}

function update($id, $namePost, $agePost, $salaryPost){
    $connection = connectionToDb();
    $query = "UPDATE workers SET name='$namePost', age=$agePost ,salary=$salaryPost where id=$id";
    return mysqli_query($connection, $query);
}

