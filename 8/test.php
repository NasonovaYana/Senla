<?php
session_start();
$forms = include './sessions_forms.phtml';
if(isset($_SESSION['usersCountry'])){
    echo $_SESSION['usersCountry'];
}else{
    echo "Страна не установлена, перейдите на index.php";
    echo $forms['hrefIndex'];
}