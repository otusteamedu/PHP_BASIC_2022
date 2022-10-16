<?php

/**
 * Функция деления двух чисел
 *
 * @return int|float Частное чисел.
 */
function divide(int|float $a, int|float $b): null|int|float
{
    if ($b == 0) {
        return null;
    }

    return $a / $b;
}
