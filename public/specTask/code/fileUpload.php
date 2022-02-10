<?php
function validJson($test){
    $string = file_get_contents($test);
    return is_string( $string) && is_array(json_decode($string, true)) && (json_last_error() == JSON_ERROR_NONE) ? true : false;
}
$new_url='';

    if (isset($_POST['fileName']) and isset($_FILES['newTest']['tmp_name'])) {
        if(!validJson($_FILES['newTest']['tmp_name'])){
            $_SESSION['jsonError'] = 0;
            $new_url = 'http://localhost:8080/specTask/admin.php';
            header('Location: ' . $new_url);
            exit;
        }
        elseif (substr($_FILES['newTest']['name'], -5) != ".json") {
            $_SESSION['fileError'] = 0;
            $new_url = 'http://localhost:8080/specTask/admin.php';
        } else {
            $fileName = $_POST['fileName'];
            $tmpPath = $_FILES['newTest']['tmp_name'];
            move_uploaded_file($tmpPath, "upload_tests/" . $fileName . ".json");
            $new_url = 'http://localhost:8080/specTask/list.php';

        }

}
header('Location: ' . $new_url);