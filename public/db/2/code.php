<?php
session_start();
function connectionToDb()
{
    $connection = mysqli_connect('localhost', 'root', '1234', 'workers');
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $connection;
}



function get($offset = '', $limit = '')
{
    $connection = connectionToDb();
    if ($limit == '' and $offset == '') {
        $result = mysqli_query($connection, "SELECT * from workers");
    } else {
        $result = mysqli_query($connection, "SELECT * from workers LIMIT $offset, $limit");

    }
    return $result;
}

function countRow(){
    $connection = connectionToDb();
    $qw = mysqli_query($connection, "SELECT COUNT(*) as count from workers");
    $result = mysqli_fetch_assoc($qw)['count'];
    return $result;
}

function deleteFromDb($id){
    $connection = connectionToDb();
    $query = "DELETE FROM workers WHERE id = $id";
    $qw = mysqli_query($connection, $query);
    return $qw;
}

function create($namePost, $agePost, $salaryPost)
{
    $connection = connectionToDb();
    $namePost = mysqli_real_escape_string($connection, $_POST["workerName"]);
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
if (isset($_POST["workerName"]) && isset($_POST["workerAge"]) && isset($_POST["workerSalary"])) {
    create($_POST["workerName"], $_POST["workerAge"], $_POST["workerSalary"]);
}

function getById($id){
    $connection = connectionToDb();
    $result = mysqli_query($connection, "SELECT * from workers WHERE id=$id");
    return $result;
}

function update($id, $namePost, $agePost, $salaryPost){
    $connection = connectionToDb();
    $query = "UPDATE workers SET name='$namePost', age=$agePost ,salary=$salaryPost where id=$id";
    $qw = mysqli_query($connection, $query);
    return $qw;
}

if (isset($_POST["changeName"]) && isset($_POST["changeAge"]) && isset($_POST["changeSalary"])) {
    $id = $_SESSION['id'];
    $connection = connectionToDb();
    $namePost = mysqli_real_escape_string($connection, $_POST["changeName"]);
    $agePost = mysqli_real_escape_string($connection, $_POST["changeAge"]);
    $salaryPost = mysqli_real_escape_string($connection, $_POST["changeSalary"]);
    $qw = update($id, $namePost, $agePost, $salaryPost);
    if($qw){
        $new_url = 'index.php';
        header('Location: ' . $new_url);
    } else{
        http_response_code(404);
    }
}