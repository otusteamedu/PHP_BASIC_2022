<?php

/**
 * С помощью цикла while вывести все числа в промежутке от 0 до 100, которые делятся на 3 без остатка.
 *
 * @return array Массив чисел, делящихся на 3.
 */
function mod3(): array
{
    $ret = [];
    $i = -1;

    while ($i++ < 101) {
        if ($i % 3) {
            continue;
        } else {
            $ret[] = $i;
        }
    }

    return $ret;
}

// $digitsMod3 = mod3();
// print_r($digitsMod3);
