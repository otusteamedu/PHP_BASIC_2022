<?php declare(strict_types = 1); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My first html page</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
    //1.Реализовать основные 4 арифметические операции в виде функций с двумя параметрами. 
    function minus(float $a, float $b):float
    {
        return $a - $b;        
    }

    function plus(float $a, float $b):float
    {
        return $a + $b;        
    }

    function multi(float $a, float $b):float
    {
        return $a * $b;        
    }

    function div(float $a, float $b):float
    {
        return $a / $b;        
    }
    echo '1. Задание'.'<br>';
    echo("Минус:".minus(7, 4)."<br>");
    echo("Плюс:".plus(7, 4)."<br>");
    echo("Умножение:".multi(7, 4)."<br>");
    echo("Деление:".div(7, 4)."<br>");

    // 2.Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation),     
    // где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции. В зависимости 
    // от переданного значения операции выполнить одну из арифметических операций (использовать 
    // функции из пункта 3) и вернуть полученное значение (использовать switch).
    function mathOperation(int|float $arg1, int|float $arg2, string $operation): int|float
    {
        switch ($operation){
            case 'div':
                return div($arg1, $arg2);
            case 'mult':
                return multi($arg1, $arg2);
            case 'minus':
                return minus($arg1, $arg2);
            case 'plus':
                return plus($arg1, $arg2);
            default:
                return 0;
        }
    }
    echo '2. Задание'.'<br>';
    echo mathOperation(4, 10, 'div'), "<br>";
    echo mathOperation(4, 10, 'plus'), "<br>";
    echo mathOperation(4, 10, 'minus'), "<br>";
    echo mathOperation(4, 10, 'mult'), "<br>";
    echo mathOperation(4, 10, '444'), "<br>";

    // 3.Посмотреть на встроенные функции PHP. Используя имеющийся HTML шаблон, вывести текущий год в 
    // подвале при помощи встроенных функций PHP.

    // https://github.com/otusteamedu/PHP_BASIC_2022/blob/VSidorenko/hw8/index.php   здесь делал



    // 4.*С помощью рекурсии организовать функцию возведения числа в степень. Формат: 
    // function power($val, $pow), где $val – заданное число, $pow – степень.

    function power(int|float $val, int $pow): int|float
    {
        if($pow == 1){
            return $val;
        }
        return $val * power($val, $pow - 1);
    }
    echo '4. Задание'.'<br>';
    echo power(3, 6).'<br>';

    // 5.*Написать функцию, которая вычисляет текущее время и возвращает его в формате с
    // правильными склонениями, например: 22 часа 15 минут 21 час 43 минуты
    function getUserFormatHours(int $hours): string
    {
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
    
    function getUserFormatSec(int $sec): string
    {
        switch ($sec){
            case 1:
            case 21: 
            case 31:
            case 41:
            case 51:
                return $sec.' секунда';
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
                return $sec.' секунды';
            default:
                return $sec.' секунд';
        }
    }
    
    function getUserFormatMin(int $min): string
    {
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
    $timeArray = explode("-", date("G-i-s"));
    echo '5. Задание'.'<br>';
    echo getUserFormatHours((int) $timeArray[0]).' '.getUserFormatMin((int) $timeArray[1]).' '.getUserFormatSec((int) $timeArray[2]);

    ?>
</body>
</html>

