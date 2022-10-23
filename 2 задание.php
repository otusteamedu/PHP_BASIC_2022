<?php

$number = 0;
do {
    if ($number == 0) {
        echo $number . ' - это ноль ';
        $number++;
    } elseif ($number % 2 != 0) {
        echo $number . ' - это нечетное число ';
        $number++;
    } else {
        echo $number . ' - это четное число ';
        $number++;
    }
} while ($number <= 10);
