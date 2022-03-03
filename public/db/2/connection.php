<?php
$connection = mysqli_connect('localhost', 'root', '1234', 'workers');
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
