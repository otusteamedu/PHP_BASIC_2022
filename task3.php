<?php

$a = rand(0,15);
echo 'Число $a = ' . $a . PHP_EOL;

for ($i=$a; $i<=15; $i++) {
    $return_value = match ($i) {
        1 => 1,
        2 => 2,
        3 => 3,
        4 => 4,
        5 => 5,
        6 => 6,
        7 => 7,
        8 => 8,
        9 => 9,
        10 => 10,
        11 => 11,
        12 => 12,
        13 => 13,
        14 => 14,
        15 => 15
    };
    echo $return_value . PHP_EOL;
}