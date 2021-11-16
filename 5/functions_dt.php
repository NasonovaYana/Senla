<?php
//Timestamp: time и mktime:
//Выведите текущее время в формате timestamp.
echo time().'<br>';
//Выведите 1 марта 2025 года в формате timestamp.
echo mktime(0,0,0,3,1,2015).'<br>';
//Выведите 31 декабря текущего года в формате timestamp. Скрипт должен работать независимо от года, в котором он запущен.
echo mktime(0,0,0,12,31,2021).'<br>';
//Найдите количество секунд, прошедших с 13:12:59 15-го марта 2000 года до настоящего момента времени.
$timeNow = time();
$timeStart = mktime(13,12,59,3,15,2000);
$time = $timeNow - $timeStart;
echo $time.'<br>';
//Найдите количество целых часов, прошедших с 7:23:48 текущего дня до настоящего момента времени.
$timeStart = mktime(7,23,48);
$time = (int)(($timeNow - $timeStart.'<br>')/3600);
echo $time.'<br><br>';

//Функция date:
//Выведите на экран текущий год, месяц, день, час, минуту, секунду.
echo date('Y F j G:i:s ').'<br>';;
//Выведите текущую дату-время в форматах '2025-12-31', '31.12.2025', '31.12.13', '12:59:59'.
echo date('Y-n-j').'<br>';
echo date('j.n.Y').'<br>';
echo date ('j.n.y').'<br>';
echo date('G:i:s').'<br>';
//С помощью функций mktime и date выведите 12 февраля 2025 года в формате '12.02.2025'.
echo date('j.m.Y', mktime(0,0,0,2,12,2025)).'<br>';
//Создайте массив дней недели $week. Выведите на экран название текущего дня недели с помощью массива $week и функции date. Узнайте какой день недели был 06.06.2006, в ваш день рождения.
$week = [1=>'понедельник','вторник','среда','четверг','пятница','суббота','воскресенье'];
$wd = (int)date('N');
echo 'сегодня '.$week[$wd].'<br>';
$wd = (int)date('N', mktime(0,0,0,6,6,2006));
echo '06/06/2006  '.$week[$wd].'<br>';
$wd = (int)date('N', mktime(0,0,0,6,17,1999));
echo 'В мой день рождения  '.$week[$wd].'<br>';
//Создайте массив месяцев $month. Выведите на экран название текущего месяца с помощью массива $month и функции date.
$month =[1=>'январь','февраль','март','апрель','май','июнь','июль','август','сентябрь','октябрь','ноябрь','декабрь'];
$currentMonth = (int)date('n');
echo $month[$currentMonth].'<br>';
//Найдите количество дней в текущем месяце. Скрипт должен работать независимо от месяца, в котором он запущен.
$daysCurrentMonth = cal_days_in_month(CAL_GREGORIAN,11,2021);
echo $daysCurrentMonth.'<br>';
//Задайте год (4 цифры), а скрипт определяет високосный ли год.
$year = 2024;
$daysFeb = cal_days_in_month(CAL_GREGORIAN,2,$year);
if ($daysFeb==29){
    echo $year.' год високосный'.'<br>';
}else{echo $year.' год не високосный'.'<br>';}
//Задайте дату в формате '31.12.2025'. С помощью функций mktime и explode переведите эту дату в формат timestamp. Узнайте день недели (словом) за введенную дату.
$str = '31.12.2025';
$arr = explode('.',$str);
$time = mktime(0,0,0,$arr[1],$arr[0],$arr[2]);
$wd = (int)date('N', $time);
echo '31.12.2025 - '.$week[$wd].'<br>';
//Задайте дату в формате '2025-12-31'. С помощью функций mktime и explode переведите эту дату в формат timestamp. Узнайте месяц (словом) за введенную дату.
$str = '2025-12-31';
unset($arr);
$arr = explode('-',$str);
$time = mktime(0,0,0,$arr[1],$arr[2],$arr[0]);
$wd = (int)date('N', $time);
echo '31.12.2025 - '.$week[$wd].'<br><br>';

//Сравнение дат:
//Задайте две даты в формате '2025-12-31'. Первую дату запишите в переменную $date1, а вторую в $date2. Сравните, какая из введенных дат больше. Выведите ее на экран.
$date1 = '2021-06-14';
$date2='2021-11-12';
$result = $date1<$date2;
if($result){
    echo $date2.'<br><br>';
}else{
    echo $date2.'<br><br>';
}
//На strtotime:
//Дана дата в формате '2025-12-31'. С помощью функции strtotime и функции date преобразуйте ее в формат '31-12-2025'.
$date = '2025-12-31';
$time = strtotime($date);
echo date('j-m-Y',$time).'<br><br>';
//Прибавление и отнимание дат (date_create, date_modify, date_format):
//В переменной $date лежит дата в формате '2025-12-31'. Прибавьте к этой дате 2 дня, 1 месяц и 3 дня, 1 год. Отнимите от этой даты 3 дня.
$date = date_create('2025-12-31');
$date= date_modify($date, '+2 days');
//var_dump($date);
$date= date_modify($date, '+1 month');
$date= date_modify($date, '+3 days');
//var_dump($date);
$date= date_modify($date, '+1 year');
//var_dump($date);
$date= date_modify($date, '-3 days');
//var_dump($date);
//Доп задачи:
//Узнайте сколько дней осталось до Нового Года. Скрипт должен работать в любом году.
$newYear = mktime(0,0,0, 12,31,2021);
$time = time();
$daysNewYear = (($newYear-$time)/(3600*24));
echo "Дней до 31 декабря: ".(int)$daysNewYear.'<br><br>';


//Сделайте форму с одним полем ввода, в которое пользователь вводит год. Найдите все пятницы 13-е в этом году. Результат выведите в виде массива дат.
echo '<form action="" method="post">
    <input type="text" name="year" placeholder="Введите год">
    <input type="submit" value="Рассчитать">
</form>';
$fridays=[];
if (isset($_POST['year'])) {
    $year = $_POST['year'];
    echo "Пятницы 13 в $year году<br>";
    for ($i=1; $i<13;$i++){
        if (date('N',mktime(0,0,0,$i,13,$year))==5){
            $fridays[]= date('j.m.Y',mktime(0,0,0,$i,13,$year));
        }
    }
    foreach ($fridays as $elem){
        echo $elem.'<br>';
    }
}
echo '<br>';
//Узнайте какой день недели был 100 дней назад.
$date = date('Y-m-j',$time);
$day = date_create($date);
$day = date_modify($day,'-100 days');
$wd = date_format($day, 'N');
echo "День недели 100 дней назад: $week[$wd]";

