<?php
// TODO: Обсудить. Много ошибок типа Warning!
// TODO: Обсудить. Обычно подключают файл с логикой в файл с версткой, а не наоборот
// TODO: Обсудить. Именование коммитов.

//  Дан инпут и кнопка. В этот инпут вводится год. По нажатию на кнопку выведите на экран, сколько дней осталось до 1 января введенного года.
$forms = include './8forms.phtml';
echo $forms['form1'];
$yearToJan = (int)$_POST['yearToJan'];
// TODO: Обсудить валидацию;
$result = (mktime(0, 0, 0, 1, 1, $yearToJan) - time()) / (3600 * 24);
if (isset($_POST['yearToJan'])) {
    echo "До 1 января $yearToJan года осталось " . ceil($result) . " дней/дня/день<br><br>";
};
//Дан инпут и кнопка. В этот инпут вводится год. По нажатию на кнопку выведите на экран, високосный он или нет.
echo $forms['form2'];
$yearType = $_POST['yearType'];
$date = mktime(0, 0, 0, 2, 1, $yearType);
// TODO: Если в качестве аргумента format передать 'L', то функция date сразу вернет true, если год високосный.
$daysFeb = date('t', $date);
// TODO: проверку на isset надо делать до первого обращения к $_POST['yearType'].
if (isset($_POST['yearType'])) {
    if ($daysFeb == 29) {
        echo $yearType . ' год високосный' . '<br>';
    } else {
        echo $yearType . ' год не високосный' . '<br>';
    }
}
//Дан инпут и кнопка. В этот инпут вводится дата в формате '01.12.1990'. По нажатию на кнопку выведите на экран день недели, соответствующий этой дате, например, 'воскресенье'.
echo $forms['form3'];
$week = [1 => 'понедельник', 'вторник', 'среда', 'четверг', 'пятница', 'суббота', 'воскресенье'];
$dateWeekDay = $_POST['dateWeekDay'];
$date = explode('.', $dateWeekDay);
// TODO: $wd не очень название для переменной
$wd = date('N', mktime(0, 0, 0, (int)$date[1], (int)$date[0], (int)$date[2]));
if (isset($_POST['dateWeekDay'])) {
    echo $week[$wd];
}
//По заходу на страницу выведите текущую дату в формате '12 мая 2015 года, воскресенье'.
$mon = [
    '1' => 'января',
    'февраля',
    'марта',
    'апреля',
    'мая',
    'июня',
    'июля',
    'августа',
    'сентября',
    'октября',
    'ноября',
    'декабря'
];
echo date('d', time()) . ' ' . $mon[date('m', time())] . ' ' . date('Y', time()) . " года<br><br>";
//Дан инпут и кнопка. В этот инпут вводится дата рождения в формате '01.12.1990'. По нажатию на кнопку выведите на экран сколько дней осталось до дня рождения пользователя.
echo $forms['form4'];
$dateBirt = $_POST['birthDate'];
$brthArr = explode('.', $dateBirt);
$toBirth = mktime(0, 0, 0, (int)$brthArr[1], (int)$brthArr[0], date('Y')) - time();
if ($toBirth < 0) {
    $toBirth = mktime(0, 0, 0, (int)$brthArr[1], (int)$brthArr[0], date('Y') + 1) - time();
}
if (isset($_POST['birthDate'])) {
    echo "До дня рождения осталось " . round($toBirth / 3600 / 24) . " дней/дня/день";
}
//По заходу на страницу выведите сколько дней осталось до ближайшей масленницы (последнее воскресенье весны).

if (date('m') > 2) {
    $year = date('Y') + 1;
} else {
    $year = date('Y');
}
$dateSpring = round((strtotime("last sun of feb $year") - time()) / 3600 / 24);

echo 'Дней до Масленицы: ' . $dateSpring . '<br><br>';
//Дан инпут и кнопка. В этот инпут вводится дата рождения в формате '31.12'. По нажатию на кнопку выведите знак зодиака пользователя.
echo $forms['form5'];
//Сделайте скрипт-гороскоп. Внутри него хранится массив гороскопов на несколько дней вперед для каждого знака зодиака. По заходу на страницу спросите у пользователя дату рождения, определите его знак зодиака и выведите предсказание для этого знака зодиака на текущий день.
$horoscope = ['рискуете оказаться в неловкой ситуации. Не исключены серьезные финансовые проблемы. Все — от непродуманности. Чтобы не попасть в «яму», действуйте осторожно. Не поддавайтесь на провокации и не играйте в безумные лотереи. Скорее всего, вас попытаются обмануть', 'вы слишком много, долго и упорно трудитесь. Кажется, пока сменить обстановку. Возможно, вам поступит приятное предложение от близкого человека — не спешите от него отказываться. Представьте, что у вас не будет другого шанса расслабиться. Немного романтики сейчас не повредит.', 'в последнее время вы ведете себя слишком заносчиво. Вероятно, причина тому — проблемы на работе или в личной жизни. Но как бы то ни было, ничто не дает вам право перекладывать ответственность за промахи на чужих людей. ', 'не в вашем стиле нестись по жизни словно на самолете — всему свое время. Вы торопите события, но даже не подозреваете, какими проблемами это может обернуться. Пожалуйста, пристегните ремни безопасности и поберегите нервы: вам они еще точно пригодятся.', 'прекрасный день, чтобы остаться дома и заняться проблемами близких. Некоторые из них очень сильно нуждаются в вашей помощи и поддержке. Будьте внимательны к словам тех, кто вас окружает. Возможно, они захотят донести важную истину. Почаще хвалите любимых и обязательно поддерживайте в начинаниях.'];
$zodiacDate = explode('.', $_POST['birthZodiacDate']);
$zodiac = ['1' => "Козерог", "Водолей", "Рыбы",
    "Овен", "Телец", "Близнецы",
    "Рак", "Лев", "Девы",
    "Весы", "Скорпион", "Стрелец"];
$zodiacNext = [1 => 20, 18, 20, 19, 20, 21, 22, 22, 23, 22, 21];
// TODO: если выбрать дату в декабре, то выводится неверный знак Зодиака
if (isset($_POST['birthZodiacDate'])) {
    $index = (int)$zodiacDate[1];
    if ($zodiacDate[0] <= $zodiacNext[$index]) {
        echo $zodiac[$index] . '<br>';
    } else {
        $index++;
        if ($index == 13) {
            echo $zodiac[1] . '<br>';
        } else {
            echo $zodiac[$index] . '<br>';
        }
    }
    echo $horoscope[array_rand($horoscope, 1)] . '<br><br>';
}


//Дан массив праздников. По заходу на страницу, если сегодня праздник, то поздравьте пользователя с этим праздником.
$date = date('d.m');
$events = ['31.12' => 'Новый год', '28.02' => 'День защитника Отечества', '08.03' => 'Международный женский день', '09.05' => 'День Победы', '01.06' => 'День защиты детей', '12.06' => 'День России', '14.04' => 'День космонавтики', '01.09' => 'День знаний', '12.12' => 'Тестовый день'];
if (array_key_exists($date, $events)) {
    echo $events[$date];
}

// TODO: А где это задание? Сделайте скрипт-гороскоп. Внутри него хранится массив гороскопов на несколько дней вперед для каждого знака зодиака. По заходу на страницу спросите у пользователя дату рождения, определите его знак зодиака и выведите предсказание для этого знака зодиака на текущий день.

//Дан текстареа и кнопка. В текстареа вводится текст. По нажатию на кнопку выведите количество слов в тексте, количество символов в тексте, количество символов за вычетом пробелов.
echo $forms['form6'];
$strFromTextarea = $_POST['countSymb'];
$countWords = explode(' ', $strFromTextarea);
$noSpaces = str_replace(' ','',$strFromTextarea);
// TODO: Некорректно работает с кириллицей
if (isset($_POST['countSymb'])) {
    echo 'Слов в введённом тексте: ' . count($countWords) . '<br>';
    echo 'Символов в введённом тексте: ' .strlen($strFromTextarea) . '<br>';
    echo 'Символов в введённом тексте без учёта пробелов: ' .strlen($noSpaces) . '<br>';
}
//Дан текстареа и кнопка. В текстареа вводится текст. По нажатию на кнопку нужно посчитать процентное содержание каждого символа в тексте.
$elementsCount = count_chars($strFromTextarea,1);
foreach ($elementsCount as $key=>$elem){
    $charPercent = round($elem/strlen($strFromTextarea),2)*100;
    echo "\"".chr($key)."\" "."составляет $charPercent% текста.<br>";
}
//Дан массив слов, инпут и кнопка. В инпут вводится набор букв. По нажатию на кнопку выведите на экран те слова, которые содержат в себе все введенные буквы.
$randomWords = ['можжевельник', 'жасмин', 'автопогрузчик', 'сани', 'копчик', 'моторист', 'инструмент', 'сито', 'карта', 'молекула', 'зола','артемида', 'салфетка', 'лосось', 'билет', 'диктатор', 'гитара',
'горох', 'космос', 'бетон', 'фен', 'баклан', 'карат', 'долина', 'револьвер', 'пинцет', 'клетушка', 'табак',
'вязанка', 'мышьяк', 'официант', 'краситель', 'кабачок', 'библиофил', 'афины', 'буклет', 'биополе', 'ноздря', 'батарейка', 'горловина', 'крепость', 'галька', 'ваза', 'фитиль', 'утюг', 'вкладчик', 'Днестровск', 'плато', 'клевер', 'свекла', 'время', 'титаник', 'енот', 'капитал', 'семья', 'копилка',
'Гамбург', 'погреб', 'луна', 'гром', 'воротник', 'вертолет', 'оскар', 'десант', 'альбом',
'радость', 'тент', 'гак', 'перо', 'балет', 'агроном', 'капля', 'кот', 'кий', 'бандит', 'арбалет', 'губа', 'баланда', 'перловка', 'альманах',
'норка','айсберг','купорос','косуля','мел','моллюск', 'метеоролог', 'рак', 'речка', 'бальзам', 'шкаф', 'автограф', 'эвкалипт',
'березка', 'суп', 'карлик', 'бронетехника', 'завещание', 'барьер', 'лилипут'];
echo $forms['form7'];
if(isset($_POST['searchLetters'])){
    // TODO: зачем ограничение ввода букв через пробел?
$ltArray = explode(' ',$_POST['searchLetters']);
foreach ($randomWords as $elem){
    $arrRandomWords =preg_split('/(?<!^)(?!$)/u',$elem);
    if(array_intersect($ltArray,$arrRandomWords)==$ltArray){
        echo $elem.'<br>';
    }
}}
//Дан текстареа и кнопка. В текстареа через пробел вводятся слова. По нажатию на кнопку выведите слова в таком виде: сначала заголовок 'слова на букву а' и под ним все слова, которые начинаются на 'а', потом заголовок 'слова на букву б' и все слова на 'б' и так далее. Буквы должны идти в алфавитном порядке. Брать следует только те буквы, на которые начинаются наши слова. То есть: если нет слов, к примеру, на букву 'в' - такого заголовка тоже не будет.
//Работает полностью только с латиницей. Не понимаю, где ломается на русских буквах. С ними сортирует, а потом начнается абра-кадабра.
echo $forms['form8'];
if (isset($_POST['sortWords'])) {
    $arrSortWords = explode(' ', $_POST['sortWords']);
    sort($arrSortWords);
    var_dump($arrSortWords);
    $chekLet = '';
    foreach ($arrSortWords as $elem){
        if($chekLet!==$elem[0]) {
            $chekLet = $elem[0];
            echo "Слова на букву $chekLet<br>";
        }
        echo $elem.'<br>';
    }

}
//Дан инпут и кнопка. В этот инпут вводится строка на русском языке. По нажатию на кнопку выведите на экран транслит этой строки.
$alphRu = ['а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я',' '];
$alphEn =['a', 'b', 'v', 'g', 'd', 'e', 'e', 'gh', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'sch', 'y', 'y', 'y', 'e', 'yu', 'ya',' '];
echo $forms['form9'];
$strTranslett =$_POST['translett'];
$strTranslett = str_replace($alphRu,$alphEn,$strTranslett);
echo $strTranslett;
//Дан инпут, 2 радиокнопочки и кнопка. В инпут вводится строка, а с помощью радиокнопочек выбирается - нужно преобразовать эту строку в транслит или из транслита обратно.
echo $forms['form10'];
if (isset($_POST['translett']) and isset($_POST['strToTranslettAfterChoose'])) {
    $chooseTranslett = $_POST['translett'];
    $strTr = $_POST['strToTranslettAfterChoose'];
    if ($chooseTranslett === 'rusToEn') {
        $strTr = str_replace($alphRu, $alphEn, $strTr);
    } else {
        $strTr = str_replace($alphEn, $alphRu, $strTr);
    }
    echo $strTr . '<br><br>';
}
//Дан массив с вопросами и правильными ответами. Реализуйте тест: выведите на экран все вопросы, под каждым инпут. Пользователь читает вопрос, пишет свой ответ в инпут. Когда вопросы заканчиваются - он жмет на кнопку, страница обновляется и вместо инпутов под вопросами появляется сообщение вида: 'ваш ответ: ... верно!' или 'ваш ответ: ... неверно! Правильный ответ: ...'. Правильно отвеченные вопросы должны гореть зеленым цветом, а неправильно - красным.
$qAndA = ['2+3' => 5, '2*3' => 6];
$arrQw = array_keys($qAndA);
$arrAns = array_values($qAndA);
if (!isset($_POST['ans1']) and !isset($_POST['ans2'])) {

    $i = 0;
    foreach ($arrQw as $elem) {
        echo "<form method='post'>";
        $i++;
        $index = 'ans' . $i;
        echo $elem . "<input name='$index'>";
    }
    echo "<input type='submit'></form>";
} else {
    $ans1 = $_POST['ans1'];
    $ans2 = $_POST['ans2'];
    $usersAns=[$ans1,$ans2];
    $i=0;
    foreach ($qAndA as $key => $elem) {
        echo $key.'=';
        echo $usersAns[$i];
        if ($usersAns[$i]==$elem){
            echo $forms['right'].'<br>';
        }
        else{
            echo $forms['wrong'].'<br>';
        }
        $i++;
    }
}
//Модифицируем предыдущую задачу: пусть теперь тест показывает варианты ответов и радиокнопочки. Пользователь должен выбрать один и вариантов.
if (!isset($_POST['chooseRadioNum1']) and !isset($_POST['chooseRadioNum2'])) {
    echo "<form method='post'>";
    $i = 0;
    foreach ($arrQw as $elem) {
        $i++;
        $index = 'chooseRadioNum' . $i;
        echo $elem .'<br>'.$forms[$index];
    }
    echo "<input type='submit'></form>";
} else {
    $ans1 = $_POST['chooseRadioNum1'];
    $ans2 = $_POST['chooseRadioNum2'];
    $usersAns=[$ans1,$ans2];
    $i=0;
    foreach ($qAndA as $key => $elem) {
        echo $key.'=';
        echo $usersAns[$i];
        if ($usersAns[$i]==$elem){
            echo $forms['right'].'<br>';
        }
        else{
            echo $forms['wrong'].'<br>';
        }
        $i++;
    }
}
//Модифицируем предыдущую задачу: пусть теперь на один вопрос может быть несколько правильных ответов. Пользователь должен отметить один или несколько чекбоксов.
$qwForSeveralAns = ['Какие числа чётные?' => [4,6], 'Какие числа больше 10?' => [15]];
$arrQwCheck = array_keys($qwForSeveralAns);
$arrAnsCheck = array_values($qwForSeveralAns);
if (!isset($_POST['chooseCheckNum1']) and !isset($_POST['chooseCheckNum2'])) {
    echo "<form method='post'>";
    $i = 0;
    foreach ($arrQwCheck as $elem) {
        $i++;
        $index = 'chooseCheckNum' . $i;
        echo $elem .'<br>'.$forms[$index];
    }
    echo "<input type='submit'></form>";
} else {
    $ans1 = $_POST['chooseCheckNum1'];
    $ans2 = $_POST['chooseCheckNum2'];
    $usersAnsCheck=[$ans1,$ans2];
    $i=0;
    foreach ($qwForSeveralAns as $key => $elem) {
        echo $key.' ';
        if ($usersAnsCheck[$i]==$elem){
            echo $forms['right'].'<br>';
        }
        else{
            echo $forms['wrong'].'<br>';
        }
        $i++;
    }
}
//Напишите скрипт, который будет находить корни квадратного уравнения. Для этого сделайте 3 инпута, в которые будут вводиться коэффициенты уравнения.
echo $forms['form11'];
    $a = $_POST['a'];
    $b = $_POST['b'];
    $c = $_POST['c'];
    $disc = $b * $b - 4 * $a * $c;
    if ($disc > 0) {
        // TODO: квадратный корень из $disc потерялся
        $x1 = round((-($b) + $disc) / (2 * $a),2);
        echo "x1 = $x1<br>";
        $x2 = round((-($b) - $disc) / (2 * $a),2);
        echo "x2 = $x2<br>";
    }elseif ($disc===0){
        // TODO: все падает с фатальной ошибкой
        $x = round((-$b)/(2*$a),2);
        echo "x = $x<br>";
    }else{
        echo 'Уравнение не имеет корней<br>';
}
//Даны 3 инпута. В них вводятся числа. Проверьте, что эти числа являются тройкой Пифагора: квадрат самого большого числа должен быть равен сумме квадратов двух остальных.
echo '<br>';
echo $forms['form12'];
if (isset($_POST['firstNum']) and isset($_POST['secondNum']) and isset($_POST['thirdNum'])) {
    $firstNum = (int)$_POST['firstNum'];
    $secondNum = (int)$_POST['secondNum'];
    $thirdNum = (int)$_POST['thirdNum'];
    $arrNums = [$firstNum, $secondNum, $thirdNum];
    sort($arrNums);
    $chekSumm = $arrNums[0]*$arrNums[0]+$arrNums[1]*$arrNums[1];
    if($chekSumm===($arrNums[2])*$arrNums[2]){
        echo "Числа являются тройкой Пифагора<br><br>";
    }else{
        echo "Числа не являются тройкой Пифагора<br><br>";
    }
}
//Дан инпут и кнопка. В инпут вводится число. По нажатию на кнопку выведите список делителей этого числа.
echo $forms['form13'];
if (isset($_POST['numToDenominators'])) {
    $numToDenominators = (int)$_POST['numToDenominators'];
    echo "Делители числа $numToDenominators: <br>";
    for ($i = $numToDenominators - 1; $i > 1; $i--) {
        if ($numToDenominators % $i === 0) {
            echo $i . '<br>';
        }
    }
}
//Дан инпут и кнопка. В инпут вводится число. По нажатию на кнопку разложите число на простые множители.
echo $forms['form14'];
if (isset($_POST['numToDecomp'])) {
    $numToDecomp = $_POST['numToDecomp'];
    $decompParts = [];
    echo "$numToDecomp= ";
    for ($i = 2; $i <= $numToDecomp; $i++) {
        if (($numToDecomp % $i) == 0) {
            $decompParts[] = $i;
            $numToDecomp /= $i;
            $i--;
            if ($numToDecomp < 2) break;
        }
    }
    echo implode('*', $decompParts);

}
//Даны 2 инпута и кнопка. В инпуты вводятся числа. По нажатию на кнопку выведите наибольший общий делитель этих двух чисел.
// TODO: Обсудить. По-хорошему можно было обойтись одной функцией по поиску делителей здесь и в задании выше.
function findDenominators($num)
{
    $arrDenom = [];
    for ($i = $num - 1; $i > 1; $i--) {
        if ($num % $i === 0) {
            array_push($arrDenom, $i);
        }
    }
    return $arrDenom;
}

echo $forms['form15'];
if (isset($_POST['firstNODnum']) and isset($_POST['secondNODnum'])) {
    $firstNODnum = (int)$_POST['firstNODnum'];
    $secondNODnum = (int)$_POST['secondNODnum'];
    $firstArr = findDenominators($firstNODnum);
    $secondArr = findDenominators($secondNODnum);
    // TODO: лучше использовать встроенную функцию сравнения массивов array_intersect
    foreach ($firstArr as $elemFirst) {
        if (!$findNOD) {
            foreach ($secondArr as $elemSecond) {
                if ($elemFirst === $elemSecond) {
                    echo 'НОД = ' . $elemFirst . '<br><br>';
                    $findNOD = true;
                }
            }
        } else {
            break;
        }
    }
}
//Даны 2 инпута и кнопка. В инпуты вводятся числа. По нажатию на кнопку выведите наименьшее число, которое делится и на одно, и на второе из введенных чисел.
function findNOK($first, $second)
{
    $nok = 0;
    $findNok = false;
    while (!$findNok) {
        $nok++;
        if (($nok % $first === 0) and ($nok % $second === 0)) {
            $findNok = true;
        }
    }
    return $nok;
}

echo $forms['form16'];
if (isset($_POST['firstNOKnum']) and isset($_POST['secondNOKnum'])) {
    $firstNOKnum = (int)$_POST['firstNOKnum'];
    $secondNOKnum = (int)$_POST['secondNOKnum'];
    echo 'НОК = ' . findNOK($firstNOKnum, $secondNOKnum);
}
//Даны 3 селекта и кнопка. Первый селект - это дни от 1 до 31, второй селект - это месяцы от января до декабря, а третий - это годы от 1990 до 2025. С помощью этих селектов можно выбрать дату. По нажатию на кнопку выведите на экран день недели, соответствующий этой дате, например, 'воскресенье'.
// TODO: код выдает неверный результат
echo $forms['form17'];
if (isset($_POST['day']) and isset($_POST['year']) and isset($_POST['month'])) {
    $day = (int)$_POST['day'];
    $month = (int)$_POST['month'];
    $yearSelect = (int)$_POST['year'];
    $wdSelect = date('N', mktime(0, 0, 0, $month, $day, $yearSelect));
    echo $day, $month, $yearSelect;
    echo $week[$wdSelect];
}
