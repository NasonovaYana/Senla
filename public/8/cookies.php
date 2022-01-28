<?php
//Работа со cookie
//По заходу на страницу запишите в куку с именем test текст '123'. Затем обновите страницу и выведите содержимое этой куки на экран.
if (!isset($_COOKIE['test'])) {
    setcookie('test', '123');
} else {
    echo $_COOKIE['test'];
}
//Удалите куку с именем test.
//setcookie('test','',time()-60);
//Сделайте счетчик посещения сайта посетителем. Каждый раз, заходя на сайт, он должен видеть надпись: 'Вы посетили наш сайт % раз!'.
$count = isset($_COOKIE['count'])?$_COOKIE['count']:1;
$count++;
setcookie('count',$count, time()+3600*24*365);
echo "<br> Вы посетили сайт ". $count ." раз<br>";
//Спросите дату рождения пользователя. При следующем заходе на сайт напишите сколько дней осталось до его дня рождения. Если сегодня день рождения пользователя - поздравьте его!
if(!isset($_COOKIE['bday'])){
    if(isset($_POST['usersBDay'])){
        $strDB=$_POST['usersBDay'];
    }
    setcookie('bday',$strDB,time()+3600 );
}else {
    $timeStr = explode('.', $_COOKIE['bday']);
    $year = date('Y');
    $timeBD = (mktime(0, 0, 0, $timeStr[1], $timeStr[0], $year) - time()) / (3600 * 24);
    if ($timeBD < 0) {
        $year++;
        $timeBD = (mktime(0, 0, 0, $timeStr[1], $timeStr[0], $year) - time()) / (3600 * 24);
    }
    echo "<br>Дней до Дня рождения: ".ceil($timeBD)."<br>";
    if(ceil($timeBD)==0){
        echo "С Днём Рождения!<br>";
    }
}