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





