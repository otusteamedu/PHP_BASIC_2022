<?php

$a = 4;

$constatnt = match ($a) {
    0 => 0,
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
    15 => 15,
};
foreach (range($constatnt, 15, 1) as $number) {
    echo $number;
}
