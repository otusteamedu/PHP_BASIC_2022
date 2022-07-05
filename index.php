<?php
// задание 1 и 2 на простых пользовательских функциях
$a = random_int(0,15);
$b = random_int(0,15);
$c = "minus";
var_dump($a);
var_dump($b);
var_dump($c);
function summFunc (int|float $a, int|float $b): int|float {
	return $a+$b;
};
function minusFunc (int|float $a, int|float $b): int|float {
	return $a-$b;
};
function multiplyFunc (int|float $a, int|float $b): int|float {
	if ($a === 0 || $b === 0) {
		return 0;
	} else {
		return $a*$b;
	};
	
};
function divideFunc (int|float $a, int|float $b): mixed {
	switch ($b) {
		case 0:
			return "Error";
			break;
		case 1:
			return $a;
			break;
		default:
			return $a/$b;
			break;
	}
	
};

function muthOperation (int|float $a, int|float $b, string $c): mixed {
	switch ($c){
		case "minus":
			return minusFunc($a,$b);
			break;
		case "summ":
			return summFunc($a,$b);
			break;
		case "multiply":
			return multiplyFunc ($a,$b);
			break;
		case "divide":
			return divideFunc ($a,$b);
			break;
	};
};

$func= muthOperation ($a,$b,$c);
var_dump ($func);

//задание 4. рекурсивная функция с возведением числа в степень. Много elseif, поскольку попробовал по максимуму все очевидные варианты использовать, чтобы снизить нагрузку на ресурсы и меньше вызывать рекурсию. Работает с положительной и отрицательной степенью
$val = 3;
$pow = -3;
var_dump($val);
var_dump($pow);
function power(int $val, int $pow): int|float {
	if($pow === 0 && $val !== 0) {
		return 1;
	} elseif($val === 0 && $pow > 0){
		return 0;
	} elseif ($val === 1 && $pow > 0){
		return 1;
	} elseif ($pow === 1) {
		return $val;
	} elseif ($pow > 1) {
		return $val * power($val, ($pow - 1));
	} elseif ($pow === -1) {
		return 1 / $val;
	} else {
		$pow= -($pow);
		return 1/($val * power($val, ($pow - 1)));
	};
};


var_dump (power($val, $pow));

?>
<!-- задание 3 вывести в футер текущий год. -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<footer>
		<div class="date_footer">
			<p>
				<?php
			echo (date('Y'));
			?></p>
		</div>
	</footer>
</body>
</html>



<?php

//задание 5
// Написать функцию, которая вычисляет текущее время и возвращает его в формате с правильными склонениями, например: 22 часа 15 минут 21 час 43 минуты 

$time = time();
date_default_timezone_set ("Europe/Moscow"); //приводим часовой пояс к МСК, лишняя строка, если сервер в часовом поясе мск и надо будет только по мск выводить время
$date = date("G.i");

//var_dump (substr($date,0,2)); получаем первые 2 символа из date, т.е. забираем себе часы
//var_dump (substr($date,-2,2)); получаем последние 2 символа из date, т.е. забираем минуты

function minutes (mixed $min): string {
	switch ($min){
		case in_array ($min,[1, 21, 31, 41, 51]):
			return "минута";
			break;
		case (in_array (substr($min,-1,1),[2,3,4,])) && (in_array ($min, [12, 13, 14])) == false:
			return "минуты";
			break;
		default:
			return "минут";
			break;
	};
};
function hours(mixed $h): string {
		switch ($h){
		case in_array ($h,[1, 21]):
			return "час";
			break;
		case in_array ($h,[2,3,4,22,23]):
			return "часа";
			break;
		default:
			return "часов";
			break;
	};
};

$min= substr($date,-2,2);
$h= substr($date,0,2);

echo ($h." ".hours ($h)." ".$min." ". minutes ($min));


// Написать на php функцию, которая принимает строку и делает аббревиатуру. 
// Аббревиатура - это слово, составленное из первых букв фразы. Записывается большими буквами 
// В случае, если передали строку из одного слова, возвращается переданное слово 
// Лишние пробелы удаляются (ведущие, замыкающие и сдвоенные пробелы) 
function abbr(string $prase) { 
	$prase = trim($prase);
	$arr=preg_split("/[\s,]+/",$prase);
	if (count($arr)>1) {
		$arr=preg_split("/[\s,]+/",$prase);
		foreach($arr as &$val){
			$val=substr($val,0,1);
		};
		unset($val);
		return strtoupper(implode($arr));
	} else {
		return $prase;
	};
	 }; 


assert(abbr('Акционерный Коммерческий Банк') === 'АКБ'); 
assert(abbr('Внутренний Валовый Продукт') === 'ВВП'); 
assert(abbr('коммерческое предложение') === 'КП'); 
assert(abbr(' База Данных ') === 'БД'); 
assert(abbr('Кастрюля') === 'Кастрюля'); 
assert(abbr(' Программист ') === 'Программист'); 
assert(abbr('') === ''); 
assert(abbr(' ') === '');