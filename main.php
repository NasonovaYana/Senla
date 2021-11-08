<?php
//Комментарии

//Nasonova Yana
/*2021,
November,
5*/
echo "//Комментарии<br><br>";
echo "Hello,world<br><br>";

//Именование переменных
$channelName = '';
$fabricator = '';
$carColor = '';
$waterT = '';
$mobileModel = '';

//Работа с переменными
echo "//Работа с переменными<br><br>";
$fst = 3;
$scd = 5;
$thd = 8;
echo "$fst, $scd, $thd<br>";

$a = 10;
$b = 2;
echo $a + $b . '<br>';
echo $a - $b . '<br>';
echo $a * $b . '<br>';
echo $a / $b . '<br>';

$c = 15;
$d = 2;
$result = $c + $d;
echo $result . '<br>';

$a = 17;
$b = 10;
$c = $a - $b;
$d = 7;
$result = $c + $d;
echo $result . '<br>';

$result = 2 + 6 + 2 / 5 - 1;
echo $result . '<br>';

$text = 'Привет, Мир!';
echo $text . '<br>';

$name = 'Яна';
echo "Привет, $name!" . '<br>';

$age = 22;
echo "Мне $age года." . '<br>';

$a = 5;
$b = 10;
echo "$a из $b студентов посетили лекцию" . '<br>';
echo $a . ' из ' . $b . ' студентов посетили лекцию.<br>';

$text = 'abcde';
echo $text[0] . $text[2] . $text[4] . '<br>';

$text[0] = '!';
echo $text . '<br>';

$num = '12345';
echo $num[0] + $num[1] + $num[2] + $num[3] + $num[4] . '<br>';

$var = 47;
$var += 7;
$var -= 18;
$var *= 10;
$var /= 20;
echo $var . '<br>';

$text = 'Я';
$text .= ' хочу';
$text .= ' знать';
$text .= ' PHP!';
echo $text . '<br>';
echo '<br>';

//Константы
echo "//Константы<br><br>";

const FCONST = 41;
define("SCONST", 33);
echo FCONST + SCONST . '<br><br>';

//Массивы
echo "//Массивы<br><br>";

$arr = ['a', 'b', 'c'];
var_dump($arr);
echo "<br>$arr[0]<br>$arr[1]<br>$arr[2]<br>";

$arr = ['a', 'b', 'c', 'd'];
echo "$arr[0]+$arr[1] $arr[2]+$arr[3]<br>";

$arr[0] = 1;
$arr[1] = 2;
$arr[2] = 3;
$arr[3] = 4;
$arr[4] = 5;

unset($arr);
$arr = ['a' => 1, 'b' => 2, 'c' => 3];
echo "$arr[c]<br>";

echo $arr['a'] + $arr['b'] + $arr['c'] . '<br>';

$week = [1 => 'понедельник', 'вторник', 'среда', 'четверг', 'пятница', 'субота', 'воскресенье'];
echo $week[5] . '<br>';

$day = 3;
echo $week[$day] . '<br>';

unset($arr);
$arr = [
    'cms' => ['joomla', 'wordpress', 'drupal'],
    'colors' => ['blue' => 'голубой', 'red' => 'красный', 'green' => 'зеленый']
];
echo $arr['cms'][0] . ' ' . $arr['cms'][2] . ' ' . $arr['colors']['green'] . ' ' . $arr['colors']['red'] . '<br><br>';

unset($arr);
$arr = [
    'ru' => [1 => 'понедельник', 'вторник', 'среда', 'четверг', 'пятница', 'субота', 'воскресенье'],
    'eng' => [1 => 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday']
];
$lang = 'eng';
echo $arr[$lang][$day] . '<br><br>';

//if-else
echo '//if-else<br><br>';
$a = 1;
if ($a == 0) {
    echo 'Верно<br>';
} else {
    echo 'Неверно<br>';
}

if ($a > 0) {
    echo 'Верно<br>';
} else {
    echo 'Неверно<br>';
}

if ($a < 0) {
    echo 'Верно<br>';
} else {
    echo 'Неверно<br>';
}

if ($a <= 0) {
    echo 'Верно<br>';
} else {
    echo 'Неверно<br>';
}

if ($a != 0) {
    echo 'Верно<br>';
} else {
    echo 'Неверно<br>';
}

if ($a == 'test') {
    echo 'Верно<br>';
} else {
    echo 'Неверно<br>';
}

if ($a === '1') {
    echo 'Верно<br>';
} else {
    echo 'Неверно<br>';
}
echo '<br><br>';

//empty isset
echo '//empty isset<br><br>';
$a = NULL;
if (empty($a)) {
    echo 'Верно<br>';
} else {
    echo 'Неверно<br>';
};

if (!empty($a)) {
    echo 'Верно<br>';
} else {
    echo 'Неверно<br>';
};

if (isset($a)) {
    echo 'Верно<br>';
} else {
    echo 'Неверно<br>';
};

if (!isset($a)) {
    echo 'Верно<br>';
} else {
    echo 'Неверно<br>';
};
echo '<br><br>';

//true, false
echo '//true false<br><br>';

$var = true;
if ($var === true) {
    echo 'Верно<br>';
} else {
    echo 'Неверно<br>';
}
if ($var) {
    echo 'Верно<br>';
} else {
    echo 'Неверно<br>';
}

if ($var === false) {
    echo 'Верно<br>';
} else {
    echo 'Неверно<br>';
}
if (!$var) {
    echo 'Верно<br>';
} else {
    echo 'Неверно<br>';
}

echo '<br><br>';

//OR AND
echo '//OR, AND<br><br>';

$a = 2;
if ($a > 0 and $a < 5) {
    echo 'Верно<br>';
} else {
    echo 'Неверно<br>';
}

if ($a == 0 or $a == 2) {
    $a += 7;
    echo $a . '<br>';
} else {
    $a /= 10;
    echo $a . '<br>';
}

if ($a <= 1 and $b >= 3) {
    echo $a + $b . '<br>';
} else {
    echo $a - $b . '<br>';
}

$a = 10;
$b = 1;
if (($a > 2 and $a < 11) or ($b >= 6 and $b < 14)) {
    echo 'Верно<br>';
} else {
    echo 'Неверно<br>';
};

$num = 2;
switch ($num) {
    case 1:
        $result = 'Зима';
        break;
    case 2:
        $result = 'Весна';
        break;
    case 3:
        $result = 'Лето';
        break;
    case 4:
        $result = 'Осень';
        break;
};
echo $result . '<br>';

//Задачи
echo '<br><br>';
echo '//Задачи<br><br>';

$day = 20;
if ($day >= 1 and $day < 10) {
    echo 'Первая<br>';
} elseif ($day >= 10 and $day < 20) {
    echo 'Вторая<br>';
} elseif ($day >= 20 and $day < 30) {
    echo 'Третья<br>';
} elseif ($day >= 30) {
    echo 'Четвертая<br>';
} else {
    echo 'Error<br>';
}

$month = 8;
if ($month >= 1 and $month <= 2 or $month == 12) {
    echo 'Зима<br>';
} elseif ($month >= 3 and $month <= 5) {
    echo 'Весна<br>';
} elseif ($month >= 6 and $month <= 8) {
    echo 'Лето<br>';
} elseif ($month >= 9 and $month <= 11) {
    echo 'Осень<br>';
} else {
    echo 'Error<br>';
}

if ($month <= 12 and $month >= 1) {
    if ($month > 11) {
        echo 'Зима<br>';
    } elseif ($month >= 9) {
        echo 'Осень<br>';
    } elseif ($month >= 6) {
        echo 'Лето<br>';
    } elseif ($month >= 3) {
        echo 'Весна<br>';
    } else{
        echo 'Зима<br>';
    }}

$year = 2000;
if (($year % 4 == 0) and ($year % 100 != 0)) {
    echo 'Високосный<br>';
} elseif ($year % 400 == 0) {
    echo 'Високосный<br>';
} else {
    echo 'Не високосный<br>';
};
$str = 'aabcde';
if ($str[0] == 'a') {
    echo 'Да<br>';
} else {
    echo 'Нет<br>';
};

$str = '123';
$summ = $str[0] + $str[1] + $str[2];
echo "$summ<br>";

$str = '133123';
$summFirstHalf = $str[0] + $str[1] + $str[2];
$summSecondHalf = $str[3] + $str[4] + $str[5];
if ($summFirstHalf == $summSecondHalf) {
    echo 'Да<br>';
} else {
    echo 'Нет<br>';
};

//foreach
echo '<br><br>';
echo '//foreach<br><br>';

unset($arr);
$arr = ['html', 'css', 'php', 'js', 'jq'];
foreach ($arr as $elem) {
    echo $elem . '<br>';
}
echo '<br>';

unset($arr);
$result = 0;
$arr = [1, 2, 3, 4, 5];
foreach ($arr as $elem) {
    $result += $elem;
}
echo "$result<br><br>";

$result = 0;
foreach ($arr as $elem) {
    $result += $elem ** 2;
}
echo "$result<br><br>";

unset($arr);
$arr = ['green' => 'зеленый', 'red' => 'красный', 'blue' => 'голубой'];
foreach ($arr as $key => $elem) {
    echo "$key-$elem<br>";
};

unset($arr);
$arr = ['200' => 'Коля', '300' => 'Вася', '400' => 'Петя'];
foreach ($arr as $key => $elem) {
    echo "$elem - зарплата $key долларов<br>";
}

//for, while
/*echo '<br><br>';
echo '//for, while<br><br>';


for ($i = 1; $i <= 100; $i++) {
    echo "$i<br>";
}
echo '<br><br>';

for ($i = 1; $i <= 100; $i++) {
    echo "$i<br>";
}
echo '<br><br>';

for ($i = 11; $i <= 33; $i++) {
    echo "$i<br>";
}
echo '<br><br>';

for ($i = 0; $i <= 100; $i += 2) {
    echo "$i<br>";
}
echo '<br><br>';

$str = '';
for ($i = 1; $i <= 9; $i++) {
    $str .= $i;
}
echo $str . '<br><br>';

$str = '';
for ($i = 9; $i >= 1; $i--) {
    $str .= $i;
}
echo $str . '<br><br>';

$str = '';
for ($i = 1,$str='-'; $i <= 9; $i++) {
    $str .= "$i-";
}
echo $str . '<br><br>';

$str = '';
for ($i = 1; $i <= 20; $i++, $str .= 'x') {
    echo $str . '<br>';
}
echo '<br><br>';

$str = '';
for ($i = 1; $i <= 6; $i++, $str .= 'xx') {
    echo $str . '<br>';
}
echo '<br><br>';
*/

$i = 1;
while ($i <= 100) {
    echo "$i<br>";
    $i++;
}
echo '<br><br>';

$i = 11;
while ($i <= 33) {
    echo "$i<br>";
    $i++;
}
echo '<br><br>';

$i = 0;
while ($i <= 100) {
    echo "$i<br>";
    $i += 2;
}
echo '<br><br>';

$str = '';
$i = 1;
while ($i <= 9) {
    $str .= $i;
    $i++;
}
echo $str . '<br><br>';

$str = '';
$i = 9;
while ($i >= 1) {
    $str .= $i;
    $i--;
}
echo $str . '<br><br>';

$str = '-';
$i = 1;
while ($i <= 9) {
    $str .= "$i-";
    $i++;
}
echo $str . '<br><br>';

$str = '';
$i = 1;
while ($i <= 20) {
    $i++;
    $str .= 'x';
    echo $str . '<br>';
}
echo '<br><br>';

$str = '';
$i = 1;
while ($i <= 6) {
    $str .= 'xx';
    echo $str . '<br>';
    $i++;
}
echo '<br><br>';

//Дополнительные задачи
echo '<br><br>';
echo '//Дополнительные задачи<br><br>';

unset($arr);
$arr = [2, 5, 9, 15, 0, 4];
foreach ($arr as $elem) {
    if ($elem > 3 and $elem < 10) {
        echo $elem . '<br>';
    }
}
echo '<br><br>';

unset($arr);
$arr = [2, -5, 9, 15, 0, -4];
$sum = 0;
foreach ($arr as $elem) {
    if ($elem > 0) {
        $sum += $elem;
    };
}
echo $sum;
echo '<br><br>';

unset($arr);
$arr = [1, 2, 5, 9, 4, 13, 4, 10];
foreach ($arr as $elem) {
    if ($elem == 4) {
        echo 'Есть!';
        break;
    };
}

echo '<br><br>';

unset($arr);
$arr = ['10', '20', '30', '50', '235', '3000'];
foreach ($arr as $elem) {
    if ($elem[0] == '1' or $elem[0] == '2' or $elem[0] == '5') {
        echo "$elem<br>";
    };
}
unset($arr);
$str = '-';
$arr = [1, 2, 3, 4, 5, 6, 7, 8, 9];
foreach ($arr as $elem) {
    $str .= "$elem-";
}
echo $str . '<br>';
echo '<br><br>';

unset($arr);
$arr = [1 => 'понедельник', 'вторник', 'среда', 'четверг', 'пятница', 'субота', 'воскресенье'];
foreach ($arr as $key => $elem) {
    if ($key == 6 or $key == 7) {
        echo "<b>$elem</b><br>";
    } else {
        echo $elem . '<br>';
    };
}
echo '<br><br>';

$day = 6;
foreach ($arr as $key => $elem) {
    if ($key == $day) {
        echo "<i>$elem</i><br>";
    } else {
        echo $elem . '<br>';
    };
}
echo '<br><br>';

unset($arr);
for ($i = 1; $i <= 100; $i++) {
    $arr[$i] = $i;
}
unset($arr);
$i = 0;
$arr = ['green' => 'зеленый', 'red' => 'красный', 'blue' => 'голубой'];
foreach ($arr as $key => $elem) {
    $en[$i] = $key;
    $ru[$i] = $elem;
    $i++;
}


$num = 1000;
$k = 0;
while ($num > 50) {
    $num /= 2;
    $k++;
}
echo $k . '<br>';

$num = 1000;
for ($k = 0; $num > 50; $k++) {
    $num /= 2;
}
echo $k . '<br>';

unset($arr);
$arr = [1, 3, 3, 4, 5, 6, 7, 8, 9];
$sum = 0;
for ($i = 0; $sum < 10; $i++) {
    $sum += $arr[$i];
}
echo "$i";