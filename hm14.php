<?php

function getSum(int $a, int $b): int
{
    return $a + $b;
}

function getDiff(int $a, int $b): int
{
    return $a - $b;
}

function getProduct(int $a, int $b): int
{
    return $a * $b;
}

function getDivision(int $a, int $b): int
{
    return $a / $b;
}

function mathOperation(int $arg1, int $arg2, string $operation): int|string
{
    switch ($operation) {
        case 'сложение':
            return getSum($arg1, $arg2);
        case 'вычитание':
            return getDiff($arg1, $arg2);
        case 'умножение':
            return getProduct($arg1, $arg2);
        case  'деление':
            return getDivision($arg1, $arg2);
        default:
            return 'операция не найдена';
    }
}

function power(int $val, int $pow): int
{
    if ($pow == 0){
        return 1;
    }

    return $val * power($val, $pow - 1);
}

function getCurrentTime(): string
{
    $hour = date('H');
    $minutes = date('i');


    return num_word($hour, ['час', 'часа', 'часов']) . ' ' . num_word($minutes, ['минута', 'минуты', 'минут']);
}

function num_word($value, $words, $show = true)
{
    $num = $value % 100;
    if ($num > 19) {
        $num = $num % 10;
    }

    $out = ($show) ?  $value . ' ' : '';
    switch ($num) {
        case 1:  $out .= $words[0]; break;
        case 2:
        case 3:
        case 4:  $out .= $words[1]; break;
        default: $out .= $words[2]; break;
    }

    return $out;
}

echo getCurrentTime();