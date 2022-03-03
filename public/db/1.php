<?php

function dbOutputWorkers($qw)
{
    while ($mass = mysqli_fetch_array($qw)) {
        $id = $mass['id'];
        $name = $mass['name'];
        $age = $mass['age'];
        $salary = $mass['salary'];
        $login = $mass['login'];
        echo $id . " " . $name . " " . $age . " " . $salary . " " . $login . "<br>";
    }
}

function dbOutputWorkersDate($qw)
{
    while ($mass = mysqli_fetch_array($qw)) {
        $id = $mass['id'];
        $name = $mass['name'];
        $age = $mass['age'];
        $salary = $mass['salary'];
        $login = $mass['login'];
        $date = $mass['date'];
        echo $id . " " . $name . " " . $age . " " . $salary . " " . $login . " " . $date . "<br>";
    }
}

function dbOutputPages($qw)
{
    while ($mass = mysqli_fetch_array($qw)) {
        $id = $mass['id'];
        $name = $mass['athor'];
        $article = $mass['article'];
        echo $id . " " . $name . " " . $article . "<br>";
    }
}

function dbOutputWorkersDescription($qw)
{
    while ($mass = mysqli_fetch_array($qw)) {
        $description = $mass['description'];
        echo $description . "<br>";
    }
}


$connection = mysqli_connect('localhost', 'root', '1234', 'senla');
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}


//Задачи для решения на SELECT

echo "Выбрать работника с id = 3.<br>";
$qw = mysqli_query($connection, 'SELECT * FROM workers WHERE id = 3');
dbOutputWorkers($qw);

echo "Выбрать работников с зарплатой 1000$.<br>";
$qw = mysqli_query($connection, 'SELECT * FROM workers WHERE salary = 1000');
dbOutputWorkers($qw);

echo "Выбрать работников в возрасте 23 года.<br>";
$qw = mysqli_query($connection, 'SELECT * FROM workers WHERE age = 23');
dbOutputWorkers($qw);

echo "Выбрать работников с зарплатой более 400$.<br>";
$qw = mysqli_query($connection, 'SELECT * FROM workers WHERE salary>400');
dbOutputWorkers($qw);

echo "Выбрать работников с зарплатой равной или большей 500$.<br>";
$qw = mysqli_query($connection, 'SELECT * FROM workers WHERE salary>=500');
dbOutputWorkers($qw);

echo "Выбрать работников с зарплатой НЕ равной 500$.<br>";
$qw = mysqli_query($connection, 'SELECT * FROM workers WHERE salary!=500');
dbOutputWorkers($qw);

echo "Выбрать работников с зарплатой равной или меньшей 900$.<br>";
$qw = mysqli_query($connection, 'SELECT * FROM workers WHERE salary<=900');
dbOutputWorkers($qw);

echo "Узнайте зарплату и возраст Васи.<br>";
$qw = mysqli_query($connection, 'SELECT * FROM workers WHERE name = "Вася"');
while ($mass = mysqli_fetch_array($qw)) {
    $salary = $mass['salary'];
    $age = $mass['age'];
    echo $salary . " " . $age . "<br>";
}

//На OR и AND

echo "<br><br>Выбрать работников в возрасте от 25 (не включительно) до 28 лет (включительно).<br>";
$qw = mysqli_query($connection, 'SELECT * FROM workers WHERE age>25 and age<29');
dbOutputWorkers($qw);

echo "Выбрать работника Петю.<br>";
$qw = mysqli_query($connection, 'SELECT * FROM workers WHERE name = "Петя"');
dbOutputWorkers($qw);

echo "Выбрать работников Петю и Васю.<br>";
$qw = mysqli_query($connection, 'SELECT * FROM workers WHERE name = "Петя" or name = "Вася"');
dbOutputWorkers($qw);

echo "Выбрать всех, кроме работника Петя.<br>";
$qw = mysqli_query($connection, 'SELECT * FROM workers WHERE name != "Петя"');
dbOutputWorkers($qw);

echo "Выбрать всех работников в возрасте 27 лет или с зарплатой 1000$.<br>";
$qw = mysqli_query($connection, 'SELECT * FROM workers WHERE age=27 or salary=1000');
dbOutputWorkers($qw);

echo "Выбрать всех работников в возрасте от 23 лет (включительно) до 27 лет (не включительно) или с зарплатой 1000$.<br>";
$qw = mysqli_query($connection, 'SELECT * FROM workers WHERE age>22 and age<27 or salary =1000');
dbOutputWorkers($qw);

echo "Выбрать всех работников в возрасте от 23 лет до 27 лет или с зарплатой от 400$ до 1000$.<br>";
$qw = mysqli_query($connection, 'SELECT * FROM workers WHERE age>22 and age<28 or salary >=400 and salary<=1000');
dbOutputWorkers($qw);

echo "Выбрать всех работников в возрасте 27 лет или с зарплатой не равной 400$.<br>";
$qw = mysqli_query($connection, 'SELECT * FROM workers WHERE age=27 or salary!=400');
dbOutputWorkers($qw);

//На INSERT

echo "<br>Добавьте нового работника Никиту, 26 лет, зарплата 300$. Воспользуйтесь первым синтаксисом.<br>";
$query = "INSERT INTO workers SET id=7, name= 'Никита', age = 26, salary=300";
//mysqli_query($connection, $query);
$qw = mysqli_query($connection, 'SELECT * FROM workers WHERE name="Никита"');
dbOutputWorkers($qw);

echo "Добавьте нового работника Светлану с зарплатой 1200$. Воспользуйтесь вторым синтаксисом.<br>";
$query = "INSERT INTO workers (id, name, age, salary) VALUES (8, 'Светлана', 26, 1200)";
//mysqli_query($connection, $query);
$qw = mysqli_query($connection, 'SELECT * FROM workers WHERE id =8');
dbOutputWorkers($qw);

echo "Добавьте двух новых работников одним запросом: Ярослава с зарплатой 1200$ и возрастом 30, Петра с зарплатой 1000$ и возрастом 31.<br>";
$query = "INSERT INTO workers (id, name, age, salary) VALUES (9, 'Ярослав', 30, 1200),(10, 'Петр', 31, 1000)";
//mysqli_query($connection, $query);
$qw = mysqli_query($connection, 'SELECT * FROM workers WHERE id =9 OR id =10');
dbOutputWorkers($qw);

//На DELETE
//  Удалите работника с id=7;
$query = 'DELETE FROM workers WHERE id = 7';
//mysqli_query($connection, $query);
//    Удалите Колю.
$query = 'DELETE FROM workers WHERE name = "Коля"';
//mysqli_query($connection, $query);
//Удалите всех работников, у которых возраст 23 года.
$query = 'DELETE FROM workers WHERE age = 23';
//mysqli_query($connection, $query);

//Верните таблицу workers в исходное состояние.
//$query = 'DELETE  FROM workers WHERE id =8 or id =9 or id =10';
//mysqli_query($connection, $query);
//$query = 'INSERT INTO workers (id, name, age, salary) VALUES (1, "Дима", 23, 400),(3, "Вася", 23, 500),(4,"Коля",30,1000)';
//mysqli_query($connection, $query);

//На UPDATE
echo "<br>Поставьте Васе зарплату в 200$.<br>";
$query = 'UPDATE workers SET salary = 200 WHERE name = "Вася"';
mysqli_query($connection, $query);
$qw = mysqli_query($connection, 'SELECT * FROM workers WHERE name ="Вася"');
dbOutputWorkers($qw);

echo "Работнику с id=4 поставьте возраст 35 лет.<br>";
$query = 'UPDATE workers SET age =35 WHERE id = 4';
mysqli_query($connection, $query);
$qw = mysqli_query($connection, 'SELECT * FROM workers WHERE id =4');
dbOutputWorkers($qw);

echo "Всем, у кого зарплата 500$ сделайте ее 700$.<br>";
$query = 'UPDATE workers SET salary =700 WHERE salary = 500';
mysqli_query($connection, $query);
$qw = mysqli_query($connection, 'SELECT * FROM workers WHERE salary =700');
dbOutputWorkers($qw);

echo "Работникам с id больше 2 и меньше 5 включительно поставьте возраст 23.<br>";
$query = 'UPDATE workers SET age = 23 WHERE id>2 and id<6';
mysqli_query($connection, $query);
$qw = mysqli_query($connection, 'SELECT * FROM workers WHERE id>2 and id<6');
dbOutputWorkers($qw);

echo "Поменяйте Васю на Женю и прибавьте ему зарплату до 900$.<br>";
$query = 'UPDATE workers SET name = "Женя", salary = 900 WHERE name = "Вася"';
mysqli_query($connection, $query);
$qw = mysqli_query($connection, 'SELECT * FROM workers WHERE name = "Женя"');
dbOutputWorkers($qw);

//На LIMIT

echo "<br>Из таблицы workers достаньте первые 6 записей.<br>";
$query = 'SELECT * FROM workers LIMIT 6';
$qw = mysqli_query($connection, $query);
dbOutputWorkers($qw);

echo "Из таблицы workers достаньте записи со вторую, 3 штуки.<br>";
$query = 'SELECT * FROM workers LIMIT 1,3';
$qw = mysqli_query($connection, $query);
dbOutputWorkers($qw);

//На ORDER BY
echo "<br>Из таблицы workers достаньте всех работников и отсортируйте их по возрастанию зарплаты.<br>";
$query = 'SELECT * FROM workers ORDER BY salary';
$qw = mysqli_query($connection, $query);
dbOutputWorkers($qw);

echo "Из таблицы workers достаньте всех работников и отсортируйте их по убыванию зарплаты.<br>";
$query = 'SELECT * FROM workers ORDER BY salary DESC';
$qw = mysqli_query($connection, $query);
dbOutputWorkers($qw);

echo "Из таблицы workers достаньте работников со второго по шестого и отсортируйте их по возрастанию возраста.<br>";
$query = 'SELECT * FROM workers ORDER BY age LIMIT 1,5 ';
$qw = mysqli_query($connection, $query);
dbOutputWorkers($qw);

//На COUNT
echo "<br>В таблице workers подсчитайте всех работников.<br>";
$query = "SELECT COUNT(*) as count FROM workers";
$qw = mysqli_query($connection, $query);
$res = mysqli_fetch_assoc($qw);
echo $res['count'] . "<br>";

echo "В таблице workers подсчитайте всех работников c зарплатой 300$.<br>";
$query = "SELECT COUNT(*) as count FROM workers WHERE salary = 300";
$qw = mysqli_query($connection, $query);
$res = mysqli_fetch_assoc($qw);
echo $res['count'] . "<br>";

//На LIKE

echo "<br>В таблице pages найти строки, в которых фамилия автора заканчивается на \"ов\".<br>";
$query = "SELECT * FROM pages WHERE athor LIKE '%ов' ";
$qw = mysqli_query($connection, $query);
dbOutputPages($qw);

echo "В таблице pages найти строки, в которых есть слово \"элемент\" (искать только по колонке article).<br>";
$query = "SELECT * FROM pages WHERE article LIKE '%элемент%' ";
$qw = mysqli_query($connection, $query);
dbOutputPages($qw);

echo "В таблице workers найти строки, в которых возраст работника начинается с числа 3, а далее идет только одна цифра.<br>";
$query = "SELECT * FROM workers WHERE age LIKE '3%' ";
$qw = mysqli_query($connection, $query);
dbOutputWorkers($qw);

echo "В таблице workers найти строки, в которых имя работника заканчивается на \"я\".<br>";
$query = "SELECT * FROM workers WHERE name LIKE '%я' ";
$qw = mysqli_query($connection, $query);
dbOutputWorkers($qw);

//На IN

echo "<br>Выберите из таблицы workers записи с id равным 1, 2, 3, 5, 14.<br>";
$query = "SELECT * FROM workers WHERE id IN (1,2,3,5,14) ";
$qw = mysqli_query($connection, $query);
dbOutputWorkers($qw);

echo "Выберите из таблицы workers записи с login равным 'eee', 'bbb', 'zzz'.<br>";
$query = "SELECT * FROM workers WHERE login IN ('eee', 'bbb', 'zzz') ";
$qw = mysqli_query($connection, $query);
dbOutputWorkers($qw);

echo "Выберите из таблицы workers записи с id равным 1, 2, 3, 7, 9, и логином, равным 'user', 'admin', 'ivan' и зарплатой больше 300.<br>";
$query = "SELECT * FROM workers WHERE login IN ('user', 'admin', 'ivan') AND id IN(1, 2, 3, 7, 9) AND salary>300 ";
$qw = mysqli_query($connection, $query);
dbOutputWorkers($qw);

//На BETWEEN
echo "<br>Выберите из таблицы workers записи c зарплатой от 100 до 1000.<br>";
$query = "SELECT * FROM workers WHERE salary BETWEEN 100 AND 1000";
$qw = mysqli_query($connection, $query);
dbOutputWorkers($qw);

echo "Выберите из таблицы workers записи c id от 1 до 10 и зарплатой от 300 до 500.<br>";
$query = "SELECT * FROM workers WHERE salary BETWEEN 300 AND 500  AND id BETWEEN  1 AND 10";
$qw = mysqli_query($connection, $query);
dbOutputWorkers($qw);

//На AS
echo "Выберите из таблицы workers все записи так, чтобы вместо id было userId, вместо login – userLogin, вместо salary - userSalary.<br>";
$query = "SELECT id AS userId, login as userLogin, salary as userSalary FROM workers";
$qw = mysqli_query($connection, $query);
while ($mass = mysqli_fetch_array($qw)) {
    $id = $mass['userId'];
    $salary = $mass['userSalary'];
    $login = $mass['userLogin'];
    echo $id . " " . $salary . " " . $login . "<br>";
}

//На DISTINCT
echo "Выберите из таблицы workers все записи так, чтобы туда попали только записи с разной зарплатой (без дублей).<br>";
$query = "SELECT  DISTINCT salary FROM workers ";
$qw = mysqli_query($connection, $query);
while ($mass = mysqli_fetch_array($qw)) {
    $salary = $mass['salary'];
    echo $salary . "<br>";
}

echo "Получите SQL запросом все возрасты без дублирования.<br>";
$query = "SELECT DISTINCT age FROM workers ";
$qw = mysqli_query($connection, $query);
while ($mass = mysqli_fetch_array($qw)) {
    $age = $mass['age'];
    echo $age . "<br>";
}
//На MIN и MAX
echo "Найдите в таблице workers минимальную зарплату.<br>";
$query = "SELECT MIN(salary) as min FROM workers ";
$qw = mysqli_query($connection, $query);
$res = mysqli_fetch_assoc($qw);
echo $res['min'] . '<br>';

echo "Найдите в таблице workers максимальную зарплату.<br>";
$query = "SELECT MAX(salary) as max FROM workers ";
$qw = mysqli_query($connection, $query);
$res = mysqli_fetch_assoc($qw);
echo $res['max'] . '<br>';

//На SUM
echo "<br>Найдите в таблице workers суммарную зарплату.<br>";
$query = "SELECT SUM(salary) as sum FROM workers ";
$qw = mysqli_query($connection, $query);
$res = mysqli_fetch_assoc($qw);
echo $res['sum'] . '<br>';

echo "Найдите в таблице workers суммарную зарплату для людей в возрасте от 21 до 25.<br>";
$query = "SELECT SUM(salary) as sum FROM workers WHERE age BETWEEN  21 and 25";
$qw = mysqli_query($connection, $query);
$res = mysqli_fetch_assoc($qw);
echo $res['sum'] . '<br>';

echo "Найдите в таблице workers суммарную зарплату для id, равного 1, 2, 3 и 5.<br>";
$query = "SELECT SUM(salary) as sum FROM workers WHERE id IN (1,2,3,5)";
$qw = mysqli_query($connection, $query);
$res = mysqli_fetch_assoc($qw);
echo $res['sum'] . '<br>';

//На AVG
echo "Найдите в таблице workers среднюю зарплату.<br>";
$query = "SELECT AVG(salary) as avg FROM workers";
$qw = mysqli_query($connection, $query);
$res = mysqli_fetch_assoc($qw);
echo $res['avg'] . '<br>';

echo "Найдите в таблице workers средний возраст.<br>";
$query = "SELECT AVG(age) as avg FROM workers";
$qw = mysqli_query($connection, $query);
$res = mysqli_fetch_assoc($qw);
echo $res['avg'] . '<br>';

//На NOW, CURRENT_DATE, CURRENT_TIME
echo "<br>Выберите из таблицы workers все записи, у которых дата больше текущей.<br>";
$query = 'SELECT * FROM workers WHERE date>CURRENT_DATE()';
$qw = mysqli_query($connection, $query);
dbOutputWorkers($qw);

echo "Вставьте в таблицу workers запись с полем date с текущим моментом времени в формате 'год-месяц-день часы:минуты:секунды'.<br>";
$query = "INSERT INTO workers (id, name, age, salary,login, date) VALUES (8, 'Светлана', 26, 1200, '123', NOW())";
$qw = mysqli_query($connection, $query);
//Вставьте в таблицу workers запись с полем date с текущей датой в формате 'год-месяц-день'.
$query = "INSERT INTO workers (id, name, age, salary,login, date) VALUES (9, 'Ярослав', 28, 1000, 'fee', CURRENT_DATE())";
$qw = mysqli_query($connection, $query);
//Вставьте в таблицу workers запись с полем time с текущим моментом времени в формате 'часы:минуты:секунды'.
$query = "INSERT INTO workers (id, name, age, salary,login, date) VALUES (10, 'Иван', 28, 1000, 'fee',CURRENT_TIME ())";
$qw = mysqli_query($connection, $query);

//На работу с частью даты (Для решения задач данного блока вам понадобятся следующие SQL команды и функции: SECOND, MINUTE, HOUR, DAY, MONTH, YEAR, DAYOFWEEK, WEEKDAY
echo "<br>Выберите из таблицы workers все записи за 2016 год.<br>";
$query = 'SELECT * FROM workers WHERE YEAR(date)=2016';
$qw = mysqli_query($connection, $query);
dbOutputWorkersDate($qw);

echo "Выберите из таблицы workers все записи за март любого года.<br>";
$query = 'SELECT * FROM workers WHERE MONTH(date)=03';
$qw = mysqli_query($connection, $query);
dbOutputWorkersDate($qw);

echo "Выберите из таблицы workers все записи за третий день месяца.<br>";
$query = 'SELECT * FROM workers WHERE DAY(date)=03';
$qw = mysqli_query($connection, $query);
dbOutputWorkersDate($qw);

echo "Выберите из таблицы workers все записи за пятый день апреля любого года.<br>";
$query = 'SELECT * FROM workers WHERE DAY(date)=05 AND MONTH(date)=04';
$qw = mysqli_query($connection, $query);
dbOutputWorkersDate($qw);

echo "Выберите из таблицы workers все записи за следующие дни любого месяца: 1, 7, 11, 12, 15, 19, 21, 29.<br>";
$query = 'SELECT * FROM workers WHERE DAY(date) IN (1, 7, 11, 12, 15, 19, 21, 29)';
$qw = mysqli_query($connection, $query);
dbOutputWorkersDate($qw);


echo "Выберите из таблицы workers все записи за вторник.<br>";
$query = 'SELECT * FROM workers WHERE DAYOFWEEK(date)=3';
$qw = mysqli_query($connection, $query);
dbOutputWorkersDate($qw);

echo "Выберите из таблицы workers все записи за первую декаду любого месяца 2016 года.<br>";
$query = 'SELECT * FROM workers WHERE DAY(date)<11 AND YEAR(date)=2016';
$qw = mysqli_query($connection, $query);
dbOutputWorkersDate($qw);

echo "Выберите из таблицы workers все записи, в которых день меньше месяца.<br>";
$query = 'SELECT * FROM workers WHERE DAY(date)<MONTH (date)';
$qw = mysqli_query($connection, $query);
dbOutputWorkersDate($qw);

echo "При выборке из таблицы workers запишите день, месяц и год в отдельные поля.<br>";
$query = 'SELECT DAY(date) AS day, MONTH(date) AS month, YEAR(date) AS year FROM workers';
$qw = mysqli_query($connection, $query);

echo "При выборке из таблицы workers создайте новое поле today, в котором будет номер текущего дня недели.<br>";
$query = 'SELECT WEEKDAY(NOW()) as today FROM workers';
$qw = mysqli_query($connection, $query);


//На EXTRACT, DATE
echo "При выборке из таблицы workers запишите год, месяц и день в отдельные поля с помощью EXTRACT.<br>";
$query = 'SELECT EXTRACT(YEAR FROM date) AS year, EXTRACT(MONTH FROM date) AS month, EXTRACT(DAY FROM date) AS day FROM workers';
$qw = mysqli_query($connection, $query);
while ($mass = mysqli_fetch_array($qw)) {
    $year = $mass['year'];
    $month = $mass['month'];
    $day = $mass['day'];
    echo $year . " " . $month . " " . $day . "<br>";
}

echo "При выборке из таблицы workers запишите день, месяц и год в отдельное поле с помощью DATE в формате 'год-месяц-день'.<br>";
$query = 'SELECT DATE(date) as date FROM workers';
$qw = mysqli_query($connection, $query);
while ($mass = mysqli_fetch_array($qw)) {
    $date = $mass['date'];
    echo $date . "<br>";
}

//На DATE_FORMAT
echo "При выборке из таблицы workers выведите дату в формате '31.12.2025'.<br>";
$query = "SELECT DATE_FORMAT(date, '%d.%m.%Y') as date FROM workers";
$qw = mysqli_query($connection, $query);
while ($mass = mysqli_fetch_array($qw)) {
    $date = $mass['date'];
    echo $date . "<br>";
}

echo "При выборке из таблицы workers выведите дату в формате '2025% 31.12'.<br>";
$query = "SELECT DATE_FORMAT(date, '%Y%% %d.%m') as date FROM workers";
$qw = mysqli_query($connection, $query);
while ($mass = mysqli_fetch_array($qw)) {
    $date = $mass['date'];
    echo $date . "<br>";
}

//На INTERVAL, DATE_ADD, DATE_SUB
echo "При выборке из таблицы workers прибавьте к дате 1 день.<br>";
$query = "SELECT  date + INTERVAL 1 DAY as date FROM workers";
$qw = mysqli_query($connection, $query);
while ($mass = mysqli_fetch_array($qw)) {
    $date = $mass['date'];
    echo $date . "<br>";
}

echo "При выборке из таблицы workers отнимите от даты 1 день.<br>";
$query = "SELECT  date -  INTERVAL 1 DAY as date FROM workers";
$qw = mysqli_query($connection, $query);
while ($mass = mysqli_fetch_array($qw)) {
    $date = $mass['date'];
    echo $date . "<br>";
}

echo "При выборке из таблицы workers прибавьте к дате 1 день, 2 часа.<br>";
$query = "SELECT DATE_ADD(date, INTERVAL '1:2' DAY_HOUR) as date FROM workers ";
$qw = mysqli_query($connection, $query);
while ($mass = mysqli_fetch_array($qw)) {
    $date = $mass['date'];
    echo $date . "<br>";
}

echo "При выборке из таблицы workers прибавьте к дате 1 год, 2 месяца.<br>";
$query = "SELECT DATE_ADD(date, INTERVAL '1:2' YEAR_MONTH) as date FROM workers ";
$qw = mysqli_query($connection, $query);
while ($mass = mysqli_fetch_array($qw)) {
    $date = $mass['date'];
    echo $date . "<br>";
}

echo "При выборке из таблицы workers прибавьте к дате 1 день, 2 часа, 3 минуты.<br>";
$query = 'SELECT DATE_ADD(date, INTERVAL "1 2:3" DAY_MINUTE) as date FROM workers';
$qw = mysqli_query($connection, $query);
while ($mass = mysqli_fetch_array($qw)) {
    $date = $mass['date'];
    echo $date . "<br>";
}

echo "При выборке из таблицы workers прибавьте к дате 1 день, 2 часа, 3 минуты, 5 секунд.<br>";
$query = 'SELECT DATE_ADD(date, INTERVAL "1 2:3:5" DAY_SECOND) as date FROM workers';
$qw = mysqli_query($connection, $query);
while ($mass = mysqli_fetch_array($qw)) {
    $date = $mass['date'];
    echo $date . "<br>";
}

echo "При выборке из таблицы workers прибавьте к дате 2 часа, 3 минуты, 5 секунд.<br>";
$query = 'SELECT DATE_ADD(date, INTERVAL "2:3:5" HOUR_SECOND) as date FROM workers';
$qw = mysqli_query($connection, $query);
while ($mass = mysqli_fetch_array($qw)) {
    $date = $mass['date'];
    echo $date . "<br>";
}

echo "При выборке из таблицы workers прибавьте к дате 1 день и отнимите 2 часа.<br>";
$query = 'SELECT DATE_ADD(date, INTERVAL 1 -2 DAY_HOUR) as date FROM workers';
$qw = mysqli_query($connection, $query);
while ($mass = mysqli_fetch_array($qw)) {
    $date = $mass['date'];
    echo $date . "<br>";
}

echo "При выборке из таблицы workers прибавьте к дате 1 день и отнимите 2 часа, 3 минуты.<br>";
$query = 'SELECT DATE_ADD(date, INTERVAL 1 -2 -3 DAY_MINUTE) as date FROM workers';
$qw = mysqli_query($connection, $query);
while ($mass = mysqli_fetch_array($qw)) {
    $date = $mass['date'];
    echo $date . "<br>";
}

//На математические операции
echo "При выборке из таблицы workers создайте новое поле res, в котором будет число 3.<br>";
$query = 'SELECT 3 as res FROM workers';
$qw = mysqli_query($connection, $query);
while ($mass = mysqli_fetch_array($qw)) {
    $res = $mass['res'];
    echo $res . "<br>";
}

echo "При выборке из таблицы workers создайте новое поле res, в котором будет строка 'eee'.<br>";
$query = 'SELECT "eee" as res FROM workers';
$qw = mysqli_query($connection, $query);
while ($mass = mysqli_fetch_array($qw)) {
    $res = $mass['res'];
    echo $res . "<br>";
}

echo "При выборке из таблицы workers создайте новое поле 3, в котором будет число 3.<br>";
$query = 'SELECT 3 FROM workers';
$qw = mysqli_query($connection, $query);
while ($mass = mysqli_fetch_array($qw)) {
    $res = $mass[3];
    echo $res . "<br>";
}

echo "При выборке из таблицы workers создайте новое поле res, в котором будет лежать сумма зарплаты и возраста.<br>";
$query = 'SELECT SUM(age + salary) AS res FROM workers';
$qw = mysqli_query($connection, $query);
while ($mass = mysqli_fetch_array($qw)) {
    $res = $mass['res'];
    echo $res . "<br>";
}

echo "При выборке из таблицы workers создайте новое поле res, в котором будет лежать разность зарплаты и возраста.<br>";
$query = 'SELECT SUM(salary - age) AS res FROM workers';
$qw = mysqli_query($connection, $query);
while ($mass = mysqli_fetch_array($qw)) {
    $res = $mass['res'];
    echo $res . "<br>";
}

echo "При выборке из таблицы workers создайте новое поле res, в котором будет лежать произведение зарплаты и возраста.<br>";
$query = 'SELECT SUM(salary*age) AS res FROM workers';
$qw = mysqli_query($connection, $query);
while ($mass = mysqli_fetch_array($qw)) {
    $res = $mass['res'];
    echo $res . "<br>";
}

echo "При выборке из таблицы workers создайте новое поле res, в котором будет лежать среднее арифметическое зарплаты и возраста.<br>";
$query = 'SELECT (salary*age/2) AS res FROM workers';
$qw = mysqli_query($connection, $query);
while ($mass = mysqli_fetch_array($qw)) {
    $res = $mass['res'];
    echo $res . "<br>";
}

echo "Выберите из таблицы workers все записи, в которых сумма дня и месяца меньше 10-ти.<br>";
$query = 'SELECT * FROM workers AS res WHERE (MONTH(date) + DAY(date))<10 ';
$qw = mysqli_query($connection, $query);
dbOutputWorkers($qw);

//На LEFT, RIGHT, SUBSTRING
echo "<br> При выборке из таблицы workers получите первые 5 символов поля description.<br>";
$query = 'SELECT LEFT(description,5) AS res FROM workers';
$qw = mysqli_query($connection, $query);
while ($mass = mysqli_fetch_array($qw)) {
    $res = $mass['res'];
    echo $res . "<br>";
}


echo "При выборке из таблицы workers получите последние 5 символов поля description.<br>";
$query = 'SELECT RIGHT(description,5) AS res FROM workers';
$qw = mysqli_query($connection, $query);
while ($mass = mysqli_fetch_array($qw)) {
    $res = $mass['res'];
    echo $res . "<br>";
}

echo "При выборке из таблицы workers получите из поля description символы со второго по десятый.<br>";
$query = 'SELECT SUBSTRING(description,2,10) AS res FROM workers';
$qw = mysqli_query($connection, $query);
while ($mass = mysqli_fetch_array($qw)) {
    $res = $mass['res'];
    echo $res . "<br>";
}

//На UNION
echo "<br>Даны две таблицы: таблица category и таблица sub_category с полями id и name. Достаньте одним запросом названия категорий и подкатегорий.<br>";
$query = 'SELECT name FROM category UNION SELECT name FROM sub_category';
$qw = mysqli_query($connection, $query);
while ($mass = mysqli_fetch_array($qw)) {
    $res = $mass['name'];
    echo $res . "<br>";
}

//На CONCAT, CONCAT_WS
echo "При выборке из таблицы workers создайте новое поле res, в котором будут лежать одновременно зарплата и возраст (слитно).<br>";
$query = 'SELECT CONCAT(salary,age) AS res FROM workers';
$qw = mysqli_query($connection, $query);
while ($mass = mysqli_fetch_array($qw)) {
    $res = $mass['res'];
    echo $res . "<br>";
}

echo "При выборке из таблицы workers создайте новое поле res, в котором будут лежать одновременно зарплата и возраст (слитно), а после возраста будут идти три знака '!'.<br>";
$query = "SELECT CONCAT(salary,age,'!!!') AS res FROM workers";
$qw = mysqli_query($connection, $query);
while ($mass = mysqli_fetch_array($qw)) {
    $res = $mass['res'];
    echo $res . "<br>";
}

echo "При выборке из таблицы workers создайте новое поле res, в котором будут лежать одновременно зарплата и возраст через дефис.<br>";
$query = "SELECT CONCAT_WS('-',salary,age) AS res FROM workers";
$qw = mysqli_query($connection, $query);
while ($mass = mysqli_fetch_array($qw)) {
    $res = $mass['res'];
    echo $res . "<br>";
}

echo "При выборке из таблицы workers получите первые 5 символов логина и добавьте троеточие.<br>";
//(взла 3, чтобы не менять логины)
$query = "SELECT CONCAT(LEFT(login,3),'...') AS res FROM workers";
$qw = mysqli_query($connection, $query);
while ($mass = mysqli_fetch_array($qw)) {
    $res = $mass['res'];
    echo $res . "<br>";
}

//На GROUP BY
echo "<br>Найдите самые маленькие зарплаты по группам возрастов (для каждого возраста свою минимальную зарплату).<br>";
$query = "SELECT MIN(salary) AS res FROM workers GROUP BY age";
$qw = mysqli_query($connection, $query);
while ($mass = mysqli_fetch_array($qw)) {
    $res = $mass['res'];
    echo $res . "<br>";
}

echo "Найдите самый большой возраст по группам зарплат (для каждой зарплаты свой максимальный возраст).<br>";
$query = "SELECT MAX(age) AS res FROM workers GROUP BY salary";
$qw = mysqli_query($connection, $query);
while ($mass = mysqli_fetch_array($qw)) {
    $res = $mass['res'];
    echo $res . "<br>";
}
//На GROUP_CONCAT
echo "Выберите из таблицы workers уникальные возраста так, чтобы для каждого возраста было поле res, в котором будут лежать через дефис id записей с таким возрастом.<br>";
$query = "SELECT GROUP_CONCAT(id SEPARATOR '-')  AS res FROM workers GROUP BY age";
$qw = mysqli_query($connection, $query);
while ($mass = mysqli_fetch_array($qw)) {
    $res = $mass['res'];
    echo $res . "<br>";
}

//На подзапросы
echo "<br>Выберите из таблицы workers все записи, зарплата в которых больше средней зарплаты.<br>";
$query = "SELECT * FROM workers WHERE salary>(SELECT AVG(salary) FROM workers)";
$qw = mysqli_query($connection, $query);
dbOutputWorkers($qw);

echo "Выберите из таблицы workers все записи, возраст в которых меньше среднего возраста, деленного на 2 и умноженного на 3.<br>";

$query = "SELECT * FROM workers WHERE age<(SELECT AVG(age)/2*3 FROM workers)";
$qw = mysqli_query($connection, $query);
dbOutputWorkers($qw);

echo "Выберите из таблицы workers записи с минимальной зарплатой.<br>";
$query = "SELECT * FROM workers WHERE salary=(SELECT MIN(salary) FROM workers)";
$qw = mysqli_query($connection, $query);
dbOutputWorkers($qw);

echo "Выберите из таблицы workers записи с максимальной зарплатой.<br>";
$query = "SELECT * FROM workers WHERE salary=(SELECT MAX(salary) FROM workers)";
$qw = mysqli_query($connection, $query);
dbOutputWorkers($qw);

echo "При выборке из таблицы workers создайте новое поле max, в котором будет лежать максимальное значение зарплаты для возраста 25 лет.<br>";
$query = "SELECT MAX(salary)  AS max FROM workers WHERE age=23";
$qw = mysqli_query($connection, $query);
while ($mass = mysqli_fetch_array($qw)) {
    $res = $mass['max'];
    echo $res . "<br>";
}

echo "При выборке из таблицы workers создайте новое поле avg, в котором будет лежать деленная на 2 разница между максимальным значением возраста и минимальным значением возраста в во всей таблице.<br>";
$query = "SELECT (SELECT (MAX(age) - MIN(age))/2 FROM workers) AS avg";
$qw = mysqli_query($connection, $query);
while ($mass = mysqli_fetch_array($qw)) {
    $res = $mass['avg'];
    echo $res . "<br>";
}

echo "При выборке из таблицы workers создайте новое поле avg, в котором будет лежать деленная на 2 разница между максимальным значением зарплаты и минимальным значением зарплаты для возраста 25 лет.<br>";
$query = "SELECT (SELECT (MAX(salary) - MIN(salary))/2 FROM workers WHERE age = 23) AS avg";
$qw = mysqli_query($connection, $query);
while ($mass = mysqli_fetch_array($qw)) {
    $res = $mass['avg'];
    echo $res . "<br>";
}

//На JOIN
echo "<br>Даны две таблицы: таблица category с полями id и name и таблица page с полями id, name и category_id. Достаньте одним запросом все страницы вместе с их категориями.<br>";
$query = "SELECT page.id as pageid, page.name as pagename, page.category_id as catid, category.name as name
FROM page
INNER JOIN category ON page.category_id=category.id";
$qw = mysqli_query($connection, $query);
while ($mass = mysqli_fetch_array($qw)) {
    $id = $mass['pageid'];
    $res = $mass['pagename'];
    $name = $mass['name'];
    echo $id . ' ' . $res . ' ' . $name . "<br>";
}

echo "Даны 3 таблицы: таблица category с полями id и name, таблица sub_category с полями id и name и таблица page с полями id, name и sub_category_id. Достаньте одним запросом все страницы вместе с их подкатегориями и категориями.<br>";
$query = "SELECT page.id as pageid, page.name as pagename, page.category_id as catid, category.name as name, sub_category.name as subname, sub_category.id
FROM page
LEFT JOIN category ON page.category_id=category.id LEFT JOIN sub_category ON page.category_id=sub_category.id";
$qw = mysqli_query($connection, $query);
while ($mass = mysqli_fetch_array($qw)) {
    $id = $mass['pageid'];
    $res = $mass['pagename'];
    $name = $mass['name'];
    $subname = $mass['subname'];
    echo $id . ' ' . $res . ' ' . $name . ' ' . $subname . "<br>";
}

//На работу с полями. Задачи данного блока следует решать SQL запросами, а не через PhpMyAdmin.
//Создайте базы данных test1 и test2.
$connection = mysqli_connect('localhost', 'root', '1234');
$query = "CREATE DATABASE test1";
$qw = mysqli_query($connection, $query);
$query = "CREATE DATABASE test2";
$qw = mysqli_query($connection, $query);
//Удалите базу данных test2.
$query = "DROP DATABASE test2";
$qw = mysqli_query($connection, $query);
//Создайте в базе данных test1 таблицы table1 и table2 с полями id, login, salary, age, date.
$connection = mysqli_connect('localhost', 'root', '1234', 'test1');
$query = "CREATE TABLE table1(id INT(1),login VARCHAR(255),salary INT(6),age INT(6),date DATE);";
$qw = mysqli_query($connection, $query);
$query = "CREATE TABLE table2(id INT(1),login VARCHAR(255),salary INT(6),age INT(6),date DATE)";
$qw = mysqli_query($connection, $query);
//Переименуйте таблицу table2 в table3.
$query = "RENAME TABLE table2 TO table3";
$qw = mysqli_query($connection, $query);
//Удалите таблицу table3.
$query = "DROP TABLE table3";
$qw = mysqli_query($connection, $query);
//Добавьте в таблицу table1 поле status.
$query = "ALTER TABLE table1 ALTER COLUMN status";
$qw = mysqli_query($connection, $query);
//Удалите из таблицы table1 поле age.
$query = "ALTER TABLE table1 DROP COLUMN age";
$qw = mysqli_query($connection, $query);
//Переименуйте поле login на user_login.
$query = " RENAME COLUMN login TO user_login";
$qw = mysqli_query($connection, $query);
//Смените типа поля salary с int на varchar(255).
$query = "ALTER TABLE table1 CHANGE salary salary VARCHAR(255)";
$qw = mysqli_query($connection, $query);
//Очистите таблицу table1.
$query = "DELETE FROM table1";
$qw = mysqli_query($connection, $query);
//Очистите все таблицы базы данных test1.
$query = "TRUNCATE test1";
$qw = mysqli_query($connection, $query);