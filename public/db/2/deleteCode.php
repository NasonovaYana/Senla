<?php
include 'codeDB.php';
function deleteRow(): bool
{
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        return deleteFromDb($id);
    }
}

$qw = deleteRow();