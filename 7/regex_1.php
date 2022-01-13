<?php
include '../helpers.php';
//На '.', символы 
echo 'Дана строка ahb acb aeb aeeb adcb axeb. Напишите регулярку, которая найдет строки ahb, acb, aeb по шаблону: буква a, любой символ, буква b.';
$str = 'ahb acb aeb aeeb adcb axeb';
preg_match_all('#a.b#',$str,$arr);
dd($arr);

echo 'Дана строка aba aca aea abba adca abea. Напишите регулярку, которая найдет строки abba adca abea по шаблону: буква a, 2 любых символа, буква a';
$str = 'aba aca aea abba adca abea';
preg_match_all('<a..a>',$str,$arr);
dd($arr);

echo 'Дана строка \'aba aca aea abba adca abea\'. Напишите регулярку, которая найдет строки abba и abea, не захватив adca.';
preg_match_all('<ab.a>',$str,$arr);
dd($arr);

//На '+', '*', '?', ()
echo 'Дана строка \'aa aba abba abbba abca abea\'. Напишите регулярку, которая найдет строки aba, abba, abbba по шаблону: буква \'a\', буква \'b\' любое количество раз, буква \'a\'.';
$str = 'aa aba abba abbba abca abea';
preg_match_all('<ab+a>',$str,$arr);
dd($arr);

echo 'Дана строка \'aa aba abba abbba abca abea\'. Напишите регулярку, которая найдет строки aa, aba, abba, abbba по шаблону: буква \'a\', буква \'b\' любое количество раз (в том числе ниодного раза), буква \'a\'.';
preg_match_all('<ab*a>',$str,$arr);
dd($arr);

echo 'Дана строка \'aa aba abba abbba abca abea\'. Напишите регулярку, которая найдет строки aa, aba по шаблону: буква \'a\', буква \'b\' один раз или ниодного, буква \'a\'';
preg_match_all('<ab?a>',$str,$arr);
dd($arr);

echo 'Дана строка \'ab abab abab abababab abea\'. Напишите регулярку, которая найдет строки по шаблону: строка \'ab\' повторяется 1 или более раз.';
$str ='ab abab abab abababab abea';
preg_match_all('#(ab)+#',$str,$arr);
dd($arr);

//На экранировку 
echo 'Дана строка \'a.a aba aea\'. Напишите регулярку, которая найдет строку a.a, не захватив остальные.';
$str ='a.a aba aea';
preg_match_all('#a\.a#',$str,$arr);
dd($arr);

echo 'Дана строка \'2+3 223 2223\'. Напишите регулярку, которая найдет строку 2+3, не захватив остальные.';
$str = '2+3 223 2223';
preg_match_all('#2\+3#',$str,$arr);
dd($arr);

echo 'Дана строка \'23 2+3 2++3 2+++3 345 567\'. Напишите регулярку, которая найдет строки 2+3, 2++3, 2+++3, не захватив остальные (+ может быть любое количество)';
$str = '23 2+3 2++3 2+++3 345 567';
preg_match_all('#2(\+)+3#',$str,$arr);
dd($arr);

echo 'Дана строка \'23 2+3 2++3 2+++3 445 677\'. Напишите регулярку, которая найдет строки 23, 2+3, 2++3, 2+++3, не захватив остальные.';
$str = '23 2+3 2++3 2+++3 445 677';
preg_match_all('#2(\+)*3#',$str,$arr);
dd($arr);

echo 'Дана строка \'*+ *q+ *qq+ *qqq+ *qqq qqq+\'. Напишите регулярку, которая найдет строки *q+, *qq+, *qqq+, не захватив остальные.';
$str = '*+ *q+ *qq+ *qqq+ *qqq qqq+';
preg_match_all('#\*q+\+#',$str,$arr);
dd($arr);


//На жадность
echo 'Дана строка \'aba accca azzza wwwwa\'. Напишите регулярку, которая найдет все строки по краям которых стоят буквы \'a\', и заменит каждую из них на \'!\'. Между буквами a может быть любой символ (кроме a).';
$str = 'aba accca azzza wwwwa';
echo '<br>'.preg_replace('#a.*?a#','!',$str).'<br>';

//На {}
echo '<br>Дана строка \'aa aba abba abbba abbbba abbbbba\'. Напишите регулярку, которая найдет строки abba, abbba, abbbba и только их.';
$str = 'aa aba abba abbba abbbba abbbbba';
preg_match_all('#ab{3,5}a#',$str,$arr);
dd($arr);

echo 'Дана строка \'aa aba abba abbba abbbba abbbbba\'. Напишите регулярку, которая найдет строки вида aba, в которых \'b\' встречается менее 3-х раз (включительно)';
preg_match_all('#ab{1,3}a#',$str,$arr);
dd($arr);

echo 'Дана строка \'aa aba abba abbba abbbba abbbbba\'. Напишите регулярку, которая найдет строки вида aba, в которых \'b\' встречается более 4-х раз (включительно).';
preg_match_all('#ab{4,}a#',$str,$arr);
dd($arr);

//На \s, \S, \w, \W, \d, \D 
echo 'Дана строка \'a1a a2a a3a a4a a5a aba aca\'. Напишите регулярку, которая найдет строки, в которых по краям стоят буквы \'a\', а между ними одна цифра.';
$str = 'a1a a2a a3a a4a a5a aba aca';
preg_match_all('#a\da#',$str,$arr);
dd($arr);

echo 'Дана строка \'a1a a22a a333a a4444a a55555a aba aca\'. Напишите регулярку, которая найдет строки, в которых по краям стоят буквы \'a\', а между ними любое количество цифр.';
$str = 'a1a a22a a333a a4444a a55555a aba aca';
preg_match_all('#a\d+a#',$str,$arr);
dd($arr);

echo 'Дана строка \'aa a1a a22a a333a a4444a a55555a aba aca\'. Напишите регулярку, которая найдет строки, в которых по краям стоят буквы \'a\', а между ними любое количество цифр (в том числе и ноль цифр, то есть строка \'aa\').';
$str = 'aa a1a a22a a333a a4444a a55555a aba aca';
preg_match_all('#a\d*a#',$str,$arr);
dd($arr);

echo 'Дана строка \'avb a1b a2b a3b a4b a5b abb acb\'. Напишите регулярку, которая найдет строки следующего вида: по краям стоят буквы \'a\' и \'b\', а между ними - не число.';
$str = 'avb a1b a2b a3b a4b a5b abb acb';
preg_match_all('#a\Db#',$str,$arr);
dd($arr);

echo 'Дана строка \'ave a#b a2b a$b a4b a5b a-b acb\'. Напишите регулярку, которая найдет строки следующего вида: по краям стоят буквы \'a\' и \'b\', а между ними - не буква и не цифра.';
$str = 'ave a#b a2b a$b a4b a5b a-b acb';
preg_match_all('#a\Wb#',$str,$arr);
dd($arr);

echo 'Дана строка \'ave a#a a2a a$a a4a a5a a-a aca\'. Напишите регулярку, которая заменит все пробелы на \'!\'.';
$str = 'ave a#a a2a a$a a4a a5a a-a aca';
echo '<br>'.preg_replace('#\s#','!',$str).'<br>';

//На [], '^' - не, [a-zA-Z], кириллицу

echo '<br>Дана строка \'aba aea aca aza axa\'. Напишите регулярку, которая найдет строки aba, aea, axa, не затронув остальных.';
$str = 'aba aea aca aza axa';
preg_match_all('#a[bex]a#',$str,$arr);
dd($arr);

echo 'Дана строка \'aba aea aca aza axa a.a a+a a*a\'. Напишите регулярку, которая найдет строки aba, a.a, a+a, a*a, не затронув остальных.';
$str = 'aba aea aca aza axa a.a a+a a*a';
preg_match_all('#a[.+*]a#',$str,$arr);
dd($arr);

echo 'Напишите регулярку, которая найдет строки следующего вида: по краям стоят буквы \'a\', а между ними - цифра от 3-х до 7-ми.';
$str = 'a1a a9a a3a aza a6a a2a a+a a*a';
preg_match_all('#a[3-7]a#',$str,$arr);
dd($arr);

echo 'Напишите регулярку, которая найдет строки следующего вида: по краям стоят буквы \'a\', а между ними - буква от a до g.';
$str = 'aba aea aha aza axa a.a a+a a*a';
preg_match_all('#a[a-g]a#',$str,$arr);
dd($arr);

echo 'Напишите регулярку, которая найдет строки следующего вида: по краям стоят буквы \'a\', а между ними - буква от a до f и от j до z.';
preg_match_all('#a[a-fj-z]a#',$str,$arr);
dd($arr);

echo 'Напишите регулярку, которая найдет строки следующего вида: по краям стоят буквы \'a\', а между ними - буква от a до f и от A до Z.';
$str = 'aba aea aha aza aXa a.a a+a a*a';
preg_match_all('#a[a-fA-Z]a#',$str,$arr);
dd($arr);


echo 'Дана строка \'aba aea aca aza axa a-a a#a\'. Напишите регулярку, которая найдет строки следующего вида: по краям стоят буквы \'a\', а между ними - не \'e\' и не \'x\'.';
$str = 'aba aea aca aza axa a-a a#a';
preg_match_all('#a[^ex ]a#',$str,$arr);
dd($arr);

echo 'Дана строка \'wйw wяw wёw wqw\'. Напишите регулярку, которая найдет строки следующего вида: по краям стоят буквы \'w\', а между ними - буква кириллицы.';
$str = 'wйw wяw wёw wqw';
preg_match_all('#w[а-яё]w#u',$str,$arr);
dd($arr);
//На [a-zA-Z] и квантификаторы
echo 'Дана строка \'aAXa aeffa aGha aza ax23a a3sSa\'. Напишите регулярку, которая найдет строки следующего вида: по краям стоят буквы \'a\', а между ними - маленькие латинские буквы, не затронув остальных.';
$str = 'aAXa aeffa aGha aza ax23a a3sSa';
preg_match_all('#a[a-z]*a#',$str,$arr);
dd($arr);

echo 'Дана строка \'aAXa aeffa aGha aza ax23a a3sSa\'. Напишите регулярку, которая найдет строки следующего вида: по краям стоят буквы \'a\', а между ними - маленькие и большие латинские буквы, не затронув остальных.';
preg_match_all('#a[a-zA-Z]*a#',$str,$arr);
dd($arr);

echo 'Дана строка \'aAXa aeffa aGha aza ax23a a3sSa\'. Напишите регулярку, которая найдет строки следующего вида: по краям стоят буквы \'a\', а между ними - маленькие латинские буквы и цифры, не затронув остальных.';
preg_match_all('#a[a-z0-9]*a#',$str,$arr);
dd($arr);

echo 'Дана строка \'ааа ббб ёёё ззз ййй ААА БББ ЁЁЁ ЗЗЗ ЙЙЙ\'. Напишите регулярку, которая найдет все слова по шаблону: любая кириллическая буква любое количество раз.';
$str = 'ааа ббб ёёё ззз ййй ААА БББ ЁЁЁ ЗЗЗ ЙЙЙ';
preg_match_all('#[а-яА-ЯёЁ]+#u',$str,$arr);
dd($arr);

//На '^', '$'
echo 'Дана строка \'aaa aaa aaa\'. Напишите регулярку, которая заменит первое \'aaa\' на \'!\'.';
$str = 'aaa aaa aaa';
echo '<br>'.preg_replace('#^a+#','!',$str).'<br>';

echo 'Дана строка \'aaa aaa aaa\'. Напишите регулярку, которая заменит последнее \'aaa\' на \'!\'.';
echo '<br>'.preg_replace('#a+$#','!',$str).'<br>';

//На '|'
echo 'Дана строка \'aeeea aeea aea axa axxa axxxa\'. Напишите регулярку, которая найдет строки следующего вида: по краям стоят буквы \'a\', а между ними - или буква \'e\' любое количество раз или по краям стоят буквы \'a\', а между ними - буква \'x\' любое количество раз.';
$str = 'aeeea aeea aea axa axxa axxxa';
preg_match_all('#a(e+|x+)a#',$str,$arr);
dd($arr);

echo 'Дана строка \'aeeea aeea aea axa axxa axxxa\'. Напишите регулярку, которая найдет строки следующего вида: по краям стоят буквы \'a\', а между ними - или буква \'e\' два раза или буква \'x\' любое количество раз.';
preg_match_all('#a(ee|x+)a#',$str,$arr);
dd($arr);

//На \b, \B
echo 'Дана строка \'xbx aca aea abba adca abea\'. Напишите регулярку, которая вокруг каждого слова вставит \'!\' (получится \'!xbx! !aca! !aea! !abba! !adca! !abea!\').';
$str = 'xbx aca aea abba adca abea';
echo '<br>'.preg_replace('#\b#','!',$str).'<br>';

//На обратный слеш \
echo 'Дана строка \'a\a abc\'. Напишите регулярку, которая заменит строку \'a\a\' на \'!\'.';
$str = 'a\a abc';
echo '<br>'.preg_replace('<a\\\\a>','!',$str).'<br><br>';


echo 'Дана строка \'a\a a\\\\a a\\\\\\a\'. Напишите регулярку, которая заменит строку \'a\\\\\\a\' на \'!\'.';
$str = 'a\a a\\\\a a\\\\\\a';
echo '<br>'.preg_replace('#a\\\\{3}a#','!',$str).'<br><br>';

//На экранировку посложнее \/.*?\\
echo 'Дана строка \'bbb /aaa\ bbb /ccc\\\'. Напишите регулярку, которая найдет содержимое всех конструкций /...\ и заменит их на \'!\'.';
$str = 'bbb /aaa\ bbb /ccc\\';
echo '<br>'.preg_replace('#/.+?\\\\#','!',$str).'<br><br>';

echo htmlspecialchars('Дана строка \'bbb <b> hello </b>, <b> world </b> eee\'. Напишите регулярку, которая найдет содержимое тегов <b> и заменит их на \'!\'.');
$str = 'bbb <b> hello </b>, <b> world </b> eee';
echo '<br>'.preg_replace('#<b>(.*?)<\/b>#','!',$str).'<br><br>';