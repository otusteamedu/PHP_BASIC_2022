<?php
require_once('src/multiply.php');
require_once('src/divide.php');
require_once('src/summa.php');
require_once('src/difference.php');

/**
 * Выполнить арифметическую операцию.
 * 
 * @param int|float $a первый аргумент
 * @param int|float $b второй аргумент
 * @param string $operation название одной из четырёх основных арифметических операций:
 *  "mul"  - умножение,
 *  "div"  - деление,
 *  "sum"  - сложение,
 *  "diff" - разность.
 *
 * @throws InvalidArgumentException Неопределённая математическая операция.
 * @return null|int|float Результат операции (null в случае деления на ноль).
 */
function mathOperation(int|float $a, int|float $b, string $operation): null|int|float
{
    switch ($operation) {
        case 'sum':
            return summa($a, $b);

        case 'diff':
            return difference($a, $b);

        case 'mul':
            return multiply($a, $b);

        case 'div':
            return divide($a, $b);

        default:
            throw new InvalidArgumentException("Unknown math operation", 1);
    }
}
