<?php

/* Задание 1 */

function addition(int $a, int $b): int
{
	return $a + $b;
}

function substraction(int $a, int $b): int
{
	return $a - $b;
}

function multiplication(int $a, int $b): int
{
	return $a * $b;
}

function division(int $a, int $b): string|float
{
	if ($b === 0){
		return "НА НОЛЬ ДЕЛИТЬ НЕЛЬЗЯ!";}
		else
		return $a / $b;
}

$a = 4;
$b = 0;

echo addition($a, $b) . PHP_EOL;
echo substraction($a, $b) . PHP_EOL;
echo multiplication($a, $b) . PHP_EOL;
echo division($a, $b) . PHP_EOL;

/* Задание 2 */

function mathOperation(int $a, int $b, string $operation): string|int|float
{
	switch($operation){
		case "add": return addition($a, $b);
		case "sub": return substraction ($a, $b);
		case "multi": return multiplication ($a, $b);
		case "div": return division ($a, $b);
		default: return "НЕИЗВЕСТНАЯ ФУНКЦИЯ!";
	}
}

echo mathOperation($a, $b, "add");
echo mathOperation($a, $b, "sub");
echo mathOperation($a, $b, "multi");
echo mathOperation($a, $b, "div");

/* Задание 3: см. ДЗ по теме "Переменные, типы" https://github.com/otusteamedu/PHP_BASIC_2022/tree/DTrishechkina/hw10 */

/* Задание 4 */

function powerPositive(int $val, int $pow): int
{
	if ($pow === 0) return 1;
	return $val * power($val, $pow - 1);
}

function power(int $val, int $pow): int|float
{
	if ($pow >= 0) return powerPositive($val, $pow);
	return 1/powerPositive($val, -$pow);
}

echo power(2, 2);


/* Задание 5 */

function current_time(): string
{
	$cur_time = time();
	$hour = date('G', $cur_time);
	$minute = (int)date('i', $cur_time);
	
	$result = "";
	if ($hour === 1 && $hour === 21) {
		$result = str_pad($hour, 2, "0", STR_PAD_LEFT) . " час ";
	}
	elseif (($hour >= 2 && $hour <= 4) || $hour === 22 || $hour === 23) {
		$result = str_pad($hour, 2, "0", STR_PAD_LEFT) . " часа ";
	}
	else 
		$result = str_pad($hour, 2, "0", STR_PAD_LEFT) . " часов ";
		
	if ($minute === 1 || $minute === 21 || $minute === 31 || $minute === 41 || $minute === 51) {
		$result .= str_pad($minute, 2, "0", STR_PAD_LEFT) . " минута";
	}
	elseif (($minute >= 2 && $minute <= 4) || ($minute >= 22 && $minute <= 24) || ($minute >= 32 && $minute <= 34) || ($minute >= 42 && $minute <= 44) || ($minute >= 52 && $minute <= 54)) {
		$result .= str_pad($minute, 2, "0", STR_PAD_LEFT) . " минуты";
	}
	else 
		$result .= str_pad($minute, 2, "0", STR_PAD_LEFT) . " минут";
		return $result;
}

echo current_time();