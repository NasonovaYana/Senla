<?php
//Работа с count:
//Дан массив $arr. Подсчитайте количество элементов этого массива.
$arr = [1, 34, 424, 4, 34];
echo "В массиве " . count($arr) . " элементов<br>";
//Дан массив $arr. С помощью функции count выведите последний элемент данного массива.
$i = count($arr) - 1;
echo $arr[$i] . '<br>';

//Работа с in_array:
//Дан массив с числами. Проверьте, что в нем есть элемент со значением 3.
unset($arr);
$arr = [1, 34, 424, 3, 34];
if (in_array(3, $arr)) {
    echo 'Есть';
} else {
    echo 'Нет';
};
echo '<br><br>';

//Работа с array_sum и array_product:
//Дан массив [1, 2, 3, 4, 5]. Найдите сумму элементов данного массива.
unset($arr);
$arr = [1, 2, 3, 4, 5];
$sumArr = array_sum($arr);
echo $sumArr . '<br>';
//Дан массив [1, 2, 3, 4, 5]. Найдите произведение (умножение) элементов данного массива.
$prodArr = array_product($arr);
echo $prodArr . '<br>';
//Дан массив $arr. С помощью функций array_sum и count найдите среднее арифметическое элементов (сумма элементов делить на их количество) данного массива.
$num = count($arr);
echo 'Среднее арифметическое = ' . $sumArr / $num . '<br><br>';

//Работа с range:
//Создайте массив, заполненный числами от 1 до 100.
unset($arr);
$arr = range(1, 100);
//var_dump($arr);
//Создайте массив, заполненный буквами от 'a' до 'z'.
unset($arr);
$arr = range('a', 'z');
//var_dump($arr);
//Создайте строку '1-2-3-4-5-6-7-8-9' не используя цикл. Показать подсказку.
$arr = range(1, 9);
$str = implode('-', $arr);
echo $str . '<br>';
//Найдите сумму чисел от 1 до 100 не используя цикл.
unset($arr);
$arr = range(1, 100);
$sum = array_sum($arr);
echo $sum . '<br>';
//Найдите произведение чисел от 1 до 10 не используя цикл.
unset($arr);
$arr = range(1, 10);
$prod = array_product($arr);
echo $prod . '<br><br>';

//Работа с array_merge:
//Даны два массива: первый с элементами 1, 2, 3, второй с элементами 'a', 'b', 'c'. Сделайте из них массив с элементами 1, 2, 3, 'a', 'b', 'c'.
$arrNum = [1, 2, 3];
$arrStr = ['a', 'b', 'c'];
unset($arr);
$arr = array_merge($arrNum, $arrStr);
//var_dump($arr);

//Работа с array_slice:
//Дан массив с элементами 1, 2, 3, 4, 5. С помощью функции array_slice создайте из него массив $result с элементами 2, 3, 4.
unset($arr);
$arr = [1, 2, 3, 4, 5];
$result = array_slice($arr, 1, 3);
//var_dump($result);

//Работа с array_splice:
//Дан массив [1, 2, 3, 4, 5]. С помощью функции array_splice преобразуйте массив в [1, 4, 5].
unset($result);
$result = array_splice($arr, 1, 2);
//var_dump($arr);
//Дан массив [1, 2, 3, 4, 5]. С помощью функции array_splice запишите в новый массив элементы [2, 3, 4].
unset($result);
unset($arr);
$arr = [1, 2, 3, 4, 5];
$result = array_splice($arr, 1, 3);
//var_dump($result);
//Дан массив [1, 2, 3, 4, 5]. С помощью функции array_splice сделайте из него массив [1, 2, 3, 'a', 'b', 'c', 4, 5].
unset($result);
unset($arr);
$arr = [1, 2, 3, 4, 5];
$result = array_splice($arr, 3, 0, ['a', 'b', 'c']);
//var_dump($arr);
//Дан массив [1, 2, 3, 4, 5]. С помощью функции array_splice сделайте из него массив [1, 'a', 'b', 2, 3, 4, 'c', 5, 'e'].
unset($result);
unset($arr);
$arr = [1, 2, 3, 4, 5];
$result = array_splice($arr, 1, 0, ['a', 'b']);
$result2 = array_splice($arr, 5, 0, ['c']);
$result3 = array_splice($arr, 7, 0, ['e']);
//var_dump($arr);

//Работа с array_keys, array_values, array_combine:
//Дан массив 'a'=>1, 'b'=>2, 'c'=>3'. Запишите в массив $keys ключи из этого массива, а в $values – значения.
unset($result);
unset($arr);
$arr = ['a' => 1, 'b' => 2, 'c' => 3];
$keys = array_keys($arr);
$values = array_values($arr);
//var_dump($keys);
//var_dump($values);
//Даны два массива: ['a', 'b', 'c'] и [1, 2, 3]. Создайте с их помощью массив 'a'=>1, 'b'=>2, 'c'=>3'.
unset($arr);
$arr = array_combine($keys, $values);
//var_dump($arr);

//Работа с array_flip, array_reverse:
//Дан массив 'a'=>1, 'b'=>2, 'c'=>3. Поменяйте в нем местами ключи и значения.
$arr = array_flip($arr);
//var_dump($arr);

//Дан массив с элементами 1, 2, 3, 4, 5. Сделайте из него массив с элементами 5, 4, 3, 2, 1.
unset($arr);
$arr = [1, 2, 3, 4, 5];
$arr = array_reverse($arr);
//var_dump($arr);

//Работа с array_search:
//Дан массив ['a', '-', 'b', '-', 'c', '-', 'd']. Найдите позицию первого элемента '-'.
unset($arr);
$arr = ['a', '-', 'b', '-', 'c', '-', 'd'];
$num = array_search('-', $arr);
echo $num . '<br>';
//Дан массив ['a', '-', 'b', '-', 'c', '-', 'd']. Найдите позицию первого элемента '-' и удалите его с помощью функции array_splice.
$res = array_splice($arr, 1, 1);
//var_dump($arr);

//Работа с array_replace:
//Дан массив ['a', 'b', 'c', 'd', 'e']. Поменяйте элемент с ключом 0 на '!', а элемент с ключом 3 - на '!!'.
unset($arr);
$arr = ['a', 'b', 'c', 'd', 'e'];
$arrReplace = [0 => '!', 3 => '!!'];
$arr = array_replace($arr, $arrReplace);
//var_dump($arr);

//Работа с сортировку:
//Дан массив '3'=>'a', '1'=>'c', '2'=>'e', '4'=>'b'. Попробуйте на нем различные типы сортировок.
unset($arr);
$arr = ['3' => 'a', '1' => 'c', '2' => 'e', '4' => 'b'];
//по значению без сохранения связи с числовыми ключами
array_multisort($arr);
//var_dump($arr);
unset($arr);
$arr = ['3' => 'a', '1' => 'c', '2' => 'e', '4' => 'b'];
//по возрастанию значений с сохранением связей
asort($arr);
//var_dump($arr);
//по убыванию значений с сохранением связей
arsort($arr);
//var_dump($arr);
//по убыванию ключей
krsort($arr);
//var_dump($arr);
//по возрастанию ключей
ksort($arr);
//var_dump($arr);
//алгоритм "natural order" без учёта регистра символов
natcasesort($arr);
//var_dump($arr);
//используя алгоритм "natural order" с учётом регистра
natsort($arr);
//var_dump($arr);
//в порядке убывания с созданием новых ключей
rsort($arr);
//var_dump($arr);
unset($arr);
$arr = ['3' => 'a', '1' => 'c', '2' => 'e', '4' => 'b'];
//в порядке возрастания с созданием новых ключей
sort($arr);
//var_dump($arr);
unset($arr);
$arr = ['3' => 'a', '1' => 'c', '2' => 'e', '4' => 'b'];

//Работа с array_rand:
//Дан массив с элементами 'a'=>1, 'b'=>2, 'c'=>3. Выведите на экран случайный ключ из данного массива.
unset($arr);
$arr = ['a' => 1, 'b' => 2, 'c' => 3];
echo array_rand($arr) . '<br>';
//Дан массив с элементами 'a'=>1, 'b'=>2, 'c'=>3. Выведите на экран случайный элемент данного массива.
$num = array_rand($arr);
echo $arr[$num] . '<br><br>';

//Работа с shuffle:
//Дан массив $arr. Перемешайте его элементы в случайном порядке.
$arrShuffle = ['a' => 1, 'b' => 2, 'c' => 3];
shuffle($arrShuffle);
//var_dump($arrShuffle);
//Заполните массив числами от 1 до 25 с помощью range, а затем перемешайте его элементы в случайном порядке.
unset($arrShuffle);
$arrShuffle = range(1, 25);
shuffle($arrShuffle);
//var_dump($arrShuffle);
//Создайте массив, заполненный буквами от 'a' до 'z' так, чтобы буквы шли в случайном порядке и не повторялись.
unset($arrShuffle);
$arrShuffle = range('a', 'z');
shuffle($arrShuffle);
//var_dump($arrShuffle);
//Сделайте строку длиной 6 символов, состоящую из маленьких английских букв, расположенных в случайном порядке. Буквы не должны повторяться.
unset($arrShuffle);
$arrShuffle = range('c', 'h');
shuffle($arrShuffle);
$str = implode('', $arrShuffle);
echo $str . '<br><br>';

//Работа с array_unique:
//Дан массив с элементами 'a', 'b', 'c', 'b', 'a'. Удалите из него повторяющиеся элементы.
unset($arr);
$arr = ['a', 'b', 'c', 'b', 'a'];
$arr = array_unique($arr);
//var_dump($arr);

//Работа с array_shift, array_pop, array_unshift, array_push:
//Дан массив с элементами 1, 2, 3, 4, 5. Выведите на экран его первый и последний элемент, причем так, чтобы в исходном массиве они исчезли.
unset($arr);
$arr = [1, 2, 3, 4, 5];
echo array_pop($arr) . '<br>';
//Дан массив с элементами 1, 2, 3, 4, 5. Добавьте ему в начало элемент 0, а в конец - элемент 6.
unset($arr);
$arr = [1, 2, 3, 4, 5];
array_unshift($arr, 0);
array_push($arr, 6);
//var_dump($arr);
//Дан массив с элементами 1, 2, 3, 4, 5, 6, 7, 8. С помощью цикла и функций array_shift и array_pop выведите на экран его элементы в следующем порядке: 18273645. Показать решение.
unset($arr);
$arr = [1, 2, 3, 4, 5, 6, 7, 8];
for ($i = 1; $i < 5; $i++) {
    echo array_shift($arr);
    echo array_pop($arr);
};

//Работа с array_pad, array_fill, array_fill_keys, array_chunk:
//Дан массив с элементами 'a', 'b', 'c'. Сделайте из него массив с элементами 'a', 'b', 'c', '-', '-', '-'.
unset($arr);
$arr = ['a', 'b', 'c'];
$arr = array_pad($arr,6,'-');
//var_dump($arr);
//Заполните массив 10-ю буквами 'x'.
$arr = ['a', 'b', 'c'];
$arr = array_fill(0,10,'x');
//var_dump($arr);
//Создайте массив, заполненный целыми числами от 1 до 20. С помощью функции array_chunk разбейте этот массив на 5 подмассивов ([1, 2, 3, 4]; [5, 6, 7, 8] и т.д.).
unset($arr);
$arr = range(1,20);
$arrChunk = array_chunk($arr,4);
//var_dump($arrChunk);

//Работа с array_count_values:
//Дан массив с элементами 'a', 'b', 'c', 'b', 'a'. Подсчитайте сколько раз встречается каждая из букв.
unset($arr);
$arr = ['a', 'b', 'c', 'b', 'a'];
$arrCountValues = array_count_values($arr);
//var_dump($arrCountValues);

//Работа с array_map:
//Дан массив с элементами 1, 2, 3, 4, 5. Создайте новый массив, в котором будут лежать квадратные корни данных элементов.
function arrSqrt($a){
    return sqrt($a);
}
unset($arr);
$arr = [1, 2, 3, 4, 5];
$arrSqrt = array_map('arrSqrt', $arr);
//var_dump($arrSqrt);

//Дан массив с элементами ' a ', ' b ', ' с '. Создайте новый массив, в котором будут данные элементы без концевых пробелов.
unset($arr);
$arr = [' a ', ' b ', ' с '];
$arrNoSpaces = array_map('trim',$arr);
//var_dump($arrNoSpaces);

//Работа с array_intersect, array_diff:
//Дан массив с элементами 1, 2, 3, 4, 5 и массив с элементами 3, 4, 5, 6, 7. Запишите в новый массив элементы, которые есть и в том, и в другом массиве.
$arr1 = [1, 2, 3, 4, 5];
$arr2 = [3, 4, 5, 6, 7];
$arrInters = array_intersect($arr1, $arr2);
//var_dump($arrInters);
//Дан массив с элементами 1, 2, 3, 4, 5 и массив с элементами 3, 4, 5, 6, 7. Запишите в новый массив элементы, которые не присутствуют в обоих массивах одновременно.
$arrDiff = array_diff($arr1, $arr2);
//var_dump($arrDiff);

//Доп задачи:
//Дана строка '1234567890'. Найдите сумму цифр из этой строки не используя цикл.
$str = '1234567890';
unset($arr);
$arr = str_split($str, 1);
$sum = array_sum($arr);
echo '<br>Сумма цифр в строке = '.$sum.'<br>';
//Создайте массив ['a'=>1, 'b'=2... 'z'=>26] не используя цикл. Показать подсказку.
$arrKeys = range('a','z');
$arrNums = range (1,26);
unset($arr);
$arr = array_combine($arrKeys,$arrNums);
//var_dump($arr);
//Создайте массив вида [[1, 2, 3], [4, 5, 6], [7, 8, 9]] не используя цикл. Показать подсказку.
unset($arr);
$arr = array_chunk(range(1,9), 3);
//var_dump($arr);
//Дан массив с элементами 1, 2, 4, 5, 5. Найдите второй по величине элемент. В нашем случае это будет 4.
unset($arr);
$arr = [1, 2, 4, 5, 5];
$arr = array_unique($arr);
rsort($arr);
echo "Второй по величине элемент $arr[1]<br>";
