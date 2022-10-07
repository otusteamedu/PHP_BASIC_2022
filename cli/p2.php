<?php

/**
 * Домашнее задание по уроку "Ветвления".
 * Задание 2.
 *
 * Присвоить переменной $а значение в промежутке [0..15].
 * С помощью оператора switch организовать вывод чисел от $a до 15.
 *
 * Критерии оценки:
 * Код написан согласно критериям PSR-1.
 * Switch использует break минимальное кол-во раз.
 */

$a = random_int(0, 15);
echo '$a = ' . $a . PHP_EOL;

switch ($a) {
    case 0:
        echo "$a ";
        $a++;
// no break
    case 1:
        echo "$a ";
        $a++;
// no break
    case 2:
        echo "$a ";
        $a++;
// no break
    case 3:
        echo "$a ";
        $a++;
// no break
    case 4:
        echo "$a ";
        $a++;
// no break
    case 5:
        echo "$a ";
        $a++;
// no break
    case 6:
        echo "$a ";
        $a++;
// no break
    case 7:
        echo "$a ";
        $a++;
// no break
    case 8:
        echo "$a ";
        $a++;
// no break
    case 9:
        echo "$a ";
        $a++;
// no break
    case 10:
        echo "$a ";
        $a++;
// no break
    case 11:
        echo "$a ";
        $a++;
// no break
    case 12:
        echo "$a ";
        $a++;
// no break
    case 13:
        echo "$a ";
        $a++;
// no break
    case 14:
        echo "$a ";
        $a++;
// no break
    case 15:
        echo "$a ";
// no break
    default:
        echo PHP_EOL;
}
