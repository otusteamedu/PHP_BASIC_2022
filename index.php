<?php

//if else 
$a = 2;
$b = 3;
var_dump ($a);
var_dump($b);
if($a >= 0 && $b >= 0){
	echo ("minus". $a-$b);
	
} else {if($a < 0 && $b < 0){
	echo ("times ". $a*$b);} 
	 else {if ($a >= 0 && $b < 0 || $a < 0 && $b >= 0){
	echo ("plus ". $a+$b);}}}
	
// if else elseif

if($a >= 0 && $b >= 0){
	echo ("minus". $a-$b);
} elseif ($a < 0 && $b < 0){
	echo ("times ". $a*$b);
} elseif ($a >= 0 && $b < 0 || $a < 0 && $b >= 0){
	echo ("plus ". $a+$b);
} else {echo ("error");} // вопрос нужен ли последний else к первому if? 

//switch

$a=random_int(0,15);
var_dump($a);
if($a>0){
	switch ($a){
		case 1: 
			echo ("$a=1");
			break;
		case 2:
			echo ("$a=2");
			break;
		case 3:
			echo ("$a=3");
			break;
		case 4:
			echo("$a=4");
			break;
		case 5:
			echo ("$a=5");
			break;
		case 6:
			echo ("$a=6");
			break;
		case 7:
			echo ("$a=7");
			break;
		case 8:
			echo ("$a=8");
			break;
		case 9:
			echo ("$a=9");
			break;
		case 10:
			echo ("$a=10");
			break;	
		case 11:
			echo ("$a=11");
			break;
		case 12:
			echo ("$a=12");
			break;
		case 13:
			echo ("$a=13");
			break;
		case 14:
			echo ("$a=14");
			break;
		default:
			echo ("$a=15");
	}
} else {
	echo ("var a=0");
}

//match
$a = random_int(0,15);
var_dump($a);
$return_match = match ($a) {
	0 => "var a = int $a",
	1 => "var a = int $a",
	2 => "var a = int $a",
	3 => "var a = int $a",
	4 => "var a = int $a",
	5 => "var a = int $a",
	6 => "var a = int $a",
	7 => "var a = int $a",
	8 => "var a = int $a",
	9 => "var a = int $a",
	10 => "var a = int $a",
	11 => "var a = int $a",
	12 => "var a = int $a",
	13 => "var a = int $a",
	14 => "var a = int $a",
	15 => "var a = int $a",
};
var_dump ($return_match);

// switch значения по возрастанию от значения переменной до 15
$a=random_int(0,15);
var_dump($a);
	switch ($a){
		case 1: 
			echo ("1,");
		case 2:
			echo ("2,");
		case 3:
			echo ("3,");
		case 4:
			echo("4,");
		case 5:
			echo ("5,");
		case 6:
			echo ("6,");
		case 7:
			echo ("7,");
		case 8:
			echo ("8,");
		case 9:
			echo ("9,");
		case 10:
			echo ("10,");
		case 11:
			echo ("11,");
		case 12:
			echo ("12,");
		case 13:
			echo ("13,");
		case 14:
			echo ("14,");
		case 15:
			echo ("15");
			break;
	}
// match от значения переменной до 15
$a = random_int(0,15);
var_dump($a);
$return_match = match ($a) {
	0 => '0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15',
	1 => '1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15',
	2 => '2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15',
	3 => '3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15',
	4 => '4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15',
	5 => '5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15',
	6 => '6, 7, 8, 9, 10, 11, 12, 13, 14, 15',
	7 => '7, 8, 9, 10, 11, 12, 13, 14, 15',
	8 => '8, 9, 10, 11, 12, 13, 14, 15',
	9 => '9, 10, 11, 12, 13, 14, 15',
	10 => '10, 11, 12, 13, 14, 15',
	11 => '11, 12, 13, 14, 15',
	12 => '12, 13, 14, 15',
	13 => '13, 14, 15',
	14 => '14, 15',
	15 => '15',
};
var_dump ($return_match);
// вывести порядок от значения переменной до 15 решение через цикл
$a = random_int(0,15);
var_dump ($a);
for ($i=$a; $i<=15; $i++){
echo ($i." ");
};

