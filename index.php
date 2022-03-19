<?php

/**
 * ЗАДАНИЕ 1
 * Реализовать основные 4 арифметические операции в виде функций с двумя параметрами. Обязательно использовать оператор return.
 */

function addition(float $value1, float $value2) {
    return ($value1 + $value2);
}

function subtraction(float $value1, float $value2) {
    return ($value1 - $value2);
}

function multiplication(float $value1, float $value2) {
    return ($value1 * $value2);
}

function division(float $value1, float $value2) {
    if ($value2 == 0) 
        return "На ноль делить нельзя!";
    return ($value1 / $value2);
}


/**
 * ЗАДАНИЕ 2
 * Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation), 
 * где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции. В зависимости от переданного значения операции выполнить 
 * одну из арифметических операций (использовать функции из пункта 3) и вернуть полученное значение (использовать switch).
 * 
 * Пример использования: echo mathOperation(4, 5, '+');
 * В качестве оператора передаём одно из значений: +, -, * или /
 * Проверку деления на ноль тоже проходит.
 */

function mathOperation(float $arg1, float $arg2, string $operation)
{
    switch ($operation) {
        case '+' :
            return addition($arg1, $arg2);
            break;
        case '-' :
            return subtraction($arg1, $arg2);
            break;
        case '*' :
            return multiplication($arg1, $arg2);
            break;
        case '/' :
            return division($arg1, $arg2);
            break;
    }
}

/**
 * ЗАДАНИЕ 3
 * Посмотреть на встроенные функции PHP. Используя имеющийся HTML шаблон, вывести текущий год в подвале при помощи встроенных функций PHP.
 */
echo "<h2>Задание 3:</h2>";
$nowYear = new DateTime();
$nowYear = $nowYear->format('Y');
echo "© ".$nowYear." OTUS PHP Developer. BASIC";

/**
 * ЗАДАНИЕ 4
 * С помощью рекурсии организовать функцию возведения числа в степень. Формат: function power($val, $pow), где $val – заданное число, $pow – степень.
 * 
 * Пример использования: var_dump(power(0, 5));
 */
echo "<h2>Задание 4:</h2>";

function power(float $val, int $pow) {
    if ($val == 0 && $pow == 0)
        return 1;
    elseif ($val == 0 && $pow >= 1)
        return 0;
    elseif ($val == 1)
        return 1;
    elseif ($val > 1 && $pow == 0)
        return 1;
    elseif ($pow == 1)
        return $val;
    else
     return $val * power($val, $pow - 1);
}


/**
 * ЗАДАНИЕ 5
 * Написать функцию, которая вычисляет текущее время и возвращает его в формате с правильными склонениями, например: 22 часа 15 минут 21 час 43 минуты
 */
echo "<h2>Задание 5:</h2>";

function declination($nowHours, $nowMinutes) {
    if ($nowHours==1 || $nowHours==21) 
        $declinationHours = " час";
    elseif (($nowHours>=2 && $nowHours<=4) || ($nowHours>=22 && $nowHours<=24)) 
        $declinationHours = " часа";
    else
        $declinationHours = " часов";


    echo $nowHours . $declinationHours . " " . $nowMinutes . $declinationMinutes;
}

$now = new DateTime();
$nowHours = $now->format('H');
$nowMinutes = $now->format('i');

declination($nowHours, $nowMinutes);

?>