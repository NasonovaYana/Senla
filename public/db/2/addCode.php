<?php
include "codeDB.php";
function inputCreate($name){
    echo "<input name =$name required>";
}

if (isset($_POST["workerName"]) && isset($_POST["workerAge"]) && isset($_POST["workerSalary"])) {
    create($_POST["workerName"], $_POST["workerAge"], $_POST["workerSalary"]);
}
