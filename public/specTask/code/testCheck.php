<?php
if(empty($_POST)){
    $new_url = 'http://localhost:8080/specTask/list.php';
    header('Location: ' . $new_url);
}
$_SESSION['openCert'] = 1;
$nameUser = $_SESSION['userName'];
$userAns = $_POST;
$userAns = array_values($userAns);
$count = 0;
$nameTest = $_SESSION['test'];
$json = file_get_contents("upload_tests/" . $nameTest);
$testArr = json_decode($json, true);
$minPoints = $testArr["minimal"];
$allQw = count($testArr["questions"]);
$rightAns = [];
foreach ($testArr["questions"] as $elem){
    $rightAns[]=$elem['right'];
}
$mistakes = [];
$_SESSION['allQw'] = $allQw;

foreach ($userAns as $key => $elem) {
    if ($elem == $rightAns[$key]) {
        $count++;
    } else {
        $mistakes[] = [$testArr["questions"][$key]['qw'], $elem, $rightAns[$key]];
    }
}

$_SESSION['count'] = $count;