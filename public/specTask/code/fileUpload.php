<?php
if (session_status() != 2 or empty($_SESSION['status'])) {
    http_response_code(403);
    exit;
}
if ($_SESSION['status'] == "admin") {
    if (isset($_POST['fileName']) and isset($_FILES['newTest']['tmp_name'])) {
        if (substr($_FILES['newTest']['name'], -5) != ".json") {
            $_SESSION['fileError'] = 0;
            $new_url = 'http://localhost:8080/specTask/admin.php';
            header('Location: ' . $new_url);
        } else {
            $fileName = $_POST['fileName'];
            $tmpPath = $_FILES['newTest']['tmp_name'];
            move_uploaded_file($tmpPath, "upload_tests/" . $fileName . ".json");
            $new_url = 'http://localhost:8080/specTask/list.php';
            header('Location: ' . $new_url);

        }
    }
} else {
    http_response_code(403);
    exit;
}
