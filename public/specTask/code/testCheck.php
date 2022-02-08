<?php
$_SESSION['openCert'] = 1;
$nameUser = $_SESSION['userName'];
$userAns = $_POST;
$userAns = array_values($userAns);
$count = 0;
$nameTest = $_SESSION['test'];
$json = file_get_contents("upload_tests/" . $nameTest);
$testArr = json_decode($json, true);
$minPoints = $testArr["minimal"];
$allQw = count($testArr["right"]);
$rightAns = $testArr["right"];
$mistakes = [];
$_SESSION['allQw'] = $allQw;

foreach ($userAns as $key => $elem) {
    if ($elem == $rightAns[$key]) {
        $count++;
    } else {
        $mistakes[] = [$testArr["questions"][$key], $elem, $rightAns[$key]];
    }
}

$_SESSION['count'] = $count;