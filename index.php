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
 */

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
 * Написать функцию, которая вычисляет текущее время и возвращает его в формате с правильными склонениями, например: 22 часа 15 минут 21 час 43 минуты
 */
echo "<h2>Задание 4:</h2>";

function declination($nowHours, $nowMinutes) {
    if ($nowHours==1 || $nowHours==21) 
        $declinationHours = " час";
    elseif (($nowHours>=2 && $nowHours<=4) || ($nowHours>=22 && $nowHours<=24)) 
        $declinationHours = " часа";
    else
        $declinationHours = " часов";

.......

    echo $nowHours . $declinationHours . " " . $nowMinutes . $declinationMinutes;
}

declination(date("H"), date("i"));

?>