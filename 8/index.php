<?php
$forms = include './sessions_forms.phtml';
echo $forms['countryUser'];
if( isset($_POST['usersCountry'])) {
    $usersCountry = $_POST['usersCountry'];
    $_SESSION['usersCountry'] = $usersCountry;
}
echo $forms['hrefTest'];