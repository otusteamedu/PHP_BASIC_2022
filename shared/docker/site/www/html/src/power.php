<?php

/**
 * Рекурсивное возведение числа в степень через операцию умножения.
 *
 * @param float $val  Число, возводимое в степень.
 * @param int $pow    Степень.
 *
 * @return null|int|float Число в степени или null, если результат является математически ошибочным или неопределённым.
 */
function power(float $val, int $pow): null|int|float
{
    if ($val == 0 && $pow <= 0) {
        return null;
    }

    if ($pow == 0) {
        return 1;
    }

    if ($pow < 0) {
        return (1 / $val) * power($val, ++$pow);
    }

    return $val * power($val, --$pow);
}
