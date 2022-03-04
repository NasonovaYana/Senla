<?php
$connection = mysqli_connect('localhost', 'root', '1234');
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
$query = "CREATE DATABASE senla;
USE senla;
CREATE TABLE workers(
id INT,
name VARCHAR(10),
age INT,
salary int,
login varchar(10),
date DATETIME,
description varchar(100),
primary key (id) );
INSERT INTO workers (id, name, age, salary, login, desription, date) VALUES (1, 'Дима', 23, 400, 'aaaaaaaaaaaaaaaa', NOW());
INSERT INTO workers (id, name, age, salary, login, desription, date) VALUES (2, 'Петя', 25, 500, 'bbbbbbbbbbbbbbbb', NOW());
INSERT INTO workers (id, name, age, salary, login, desription, date) VALUES (3, 'Вася', 23, 500, 'cccccccccccccccc', NOW());
INSERT INTO workers (id, name, age, salary, login, desription, date) VALUES (4, 'Коля', 30, 1000, 'dddddddddddddddd', NOW());
INSERT INTO workers (id, name, age, salary, login, desription, date) VALUES (5, 'Иван', 27, 500, 'dddddddddddddddd', NOW());
INSERT INTO workers (id, name, age, salary, login, desription, date) VALUES (6, 'Кирилл', 28, 1000, 'eeeeeeeeeeeeeee', NOW())";

$qw = mysqli_query($connection, $query);