<?php
/* 1. Реализовать основные 4 арифметические операции в виде функций с двумя параметрами.
Обязательно использовать оператор return.
*/
function addition($a, $b) {
    return ($a + $b);
}

function subtraction($a, $b) {
    return ($a - $b);
}

function multiplication($a, $b) {
    return ($a * $b);
}

function division($a, $b) {
    return ($a / $b);
}

/* 2. Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation),
где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции.
В зависимости от переданного значения операции выполнить одну из арифметических операций
(использовать функции из пункта 3) и вернуть полученное значение (использовать switch).
*/
function mathOperation($arg1, $arg2, $operation) {
    switch ($operation) {
        case 'addition' :
            return addition($arg1, $arg2);
            break;
        case 'subtraction' :
            return subtraction($arg1, $arg2);
            break;
        case 'multiplication' :
            return multiplication($arg1, $arg2);
            break;
        case 'division' :
            return division($arg1, $arg2);
            break;
    }
}

/* 3. echo (date("d = F = Y "));

/* 4. С помощью рекурсии организовать функцию возведения числа в степень.
Формат: function power($val, $pow), где $val – заданное число, $pow – степень.
*/
function power($val, $pow)
{
    if ($val == 0)
        return 0;
    elseif ($pow == 0)
        return 1;
    elseif ($pow < 0)
        return power(1/$val, -$pow);
    else
        return $val *  power($val, $pow-1);
}
echo power(2, -3);

/* 5. Написать функцию, которая вычисляет текущее время и возвращает его в формате
 с правильными склонениями, например: 22 часа 15 минут 21 час 43 минуты.
*/
function Hours(int $hours): string {
    switch ($hours){
        case 1:
        case 21:
            return $hours.' час';
        case 2:
        case 3:
        case 4:
        case 22:
        case 23:
        case 24:
            return $hours.' часа';
        default:
            return $hours.' часов';
    }
}

function Minutes(int $min): string {
    switch ($min){
        case 1:
        case 21:
        case 31:
        case 41:
        case 51:
            return $min.' минута';
        case 2:
        case 3:
        case 4:
        case 22:
        case 23:
        case 24:
        case 32:
        case 33:
        case 34:
        case 42:
        case 43:
        case 44:
        case 52:
        case 53:
        case 54:
            return $min.' минуты';
        default:
            return $min.' минут';
    }
}
date_default_timezone_set('Europe/Moscow');
$timeArray = explode(" ", date("H i"));
echo Hours((int) $timeArray[0]).' '.Minutes((int) $timeArray[1]);
