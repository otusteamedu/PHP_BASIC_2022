<?php

function evenAndOddNumberPrinter() {
    $i = 0;
    do {
        if ($i == 0) {
            echo "0 - это ноль" . PHP_EOL;
        } elseif ($i % 2 !== 0) {
            echo "$i - нечетное число" . PHP_EOL;
        } else {
            echo "$i - четное число" . PHP_EOL;
        }
    $i++;
    } while ($i<=10);
}

evenAndOddNumberPrinter();