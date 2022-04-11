<?php
$forms = include './sessions_forms.phtml';
if(isset($_SESSION['usersCountry'])){
    echo $_SESSION['usersCountry'];
}else{
    echo "Страна не установлена, перейдите на indexAdmin.php";
    echo $forms['hrefIndex'];
}