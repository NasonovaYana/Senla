<?php
$connection = mysqli_connect('localhost', 'root', '1234');
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
$query = "CREATE DATABASE workers;
USE workers;
CREATE TABLE workers(
id INT AUTO_INCREMENT,
name VARCHAR(10),
age INT,
salary int,
primary key (id) );
INSERT INTO workers (name, age, salary) VALUES ('Коля', 23, 400);
INSERT INTO workers (name, age, salary) VALUES ('Вася', 24, 500);
INSERT INTO workers (name, age, salary) VALUES ('Петя', 25, 600)";

$qw = mysqli_query($connection, $query);

