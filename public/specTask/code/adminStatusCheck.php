<?php
include "sessionActiveCheck.php";
if ($_SESSION['status'] != "admin") {
    http_response_code(403);
    exit;
}