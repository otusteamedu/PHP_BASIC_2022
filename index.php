<?php

/** ЗАДАНИЕ 1
 * Объявить две целочисленные переменные $a и $b и задать им произвольные начальные значения.
 * Затем написать скрипт, который работает по следующему принципу: если $a и $b положительные, вывести их разность; если $а и $b отрицательные, 
 * вывести их произведение; если $а и $b разных знаков, вывести их сумму; ноль можно считать положительным числом.
 */

$a = rand(-999,999);
$b = rand(-999,999);

echo "a=".$a."\nb=".$b."\n";

if ($a >= 0 && $b >= 0) 
	echo "Разность равна ".($a - $b)."";
else if ($a < 0 && $b < 0) 
	echo "Произведение равно ".($a * $b)."";
else
	echo "Сумма равна ".($a + $b)."";



/** ЗАДАНИЕ 2
 * Присвоить переменной $а значение в промежутке [0..15]. С помощью оператора switch организовать вывод чисел от $a до 15.
 */

$a = rand(0, 15);

switch($a)
{
    case 15:
        echo "15";
        break;
    case 14:
        echo "14";
        break;
    case 13:
        echo "13";
        break;
    case 12:
        echo "12";
        break;
    case 11:
        echo "11";
        break;
    case 10:
        echo "10";
        break;
    case 9:
        echo "9";
        break;
    case 8:
        echo "8";
        break;
    case 7:
        echo "7";
        break;
    case 6:
        echo "6";
        break;
    case 5:
        echo "5";
        break;
    case 4:
        echo "4";
        break;
    case 3:
        echo "3";
        break;
    case 2:
        echo "2";
        break;
    case 1:
        echo "1";
        break;
    case 0:
        echo "0";
        break;
    default:
        echo "что-то пошло не так";
}


/** ЗАДАНИЕ 2
 * Реализовать функционал ЗАДАНИЯ 2 при помощи match
 */

$a = rand(0, 15);

$result = match ($a)
{
    15 => '15',
    14 => '14',
    13 => '13',
    12 => '12',
    11 => '11',
    10 => '10',
     9 => '9',
     8 => '8',
     7 => '7',
     6 => '6',
     5 => '5',
     4 => '4',
     3 => '3',
     2 => '2',
     1 => '1',
     0 => '0',
};

var_dump($result);


?>