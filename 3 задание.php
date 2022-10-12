<?php

$a = 4;

$result = match ($a) {
    0 => range(0, 15),
    1 => range(1, 15),
    2 => range(2, 15),
    3 => range(3, 15),
    4 => range(4, 15),
    5 => range(5, 15),
    6 => range(6, 15),
    7 => range(7, 15),
    8 => range(8, 15),
    9 => range(9, 15),
    10 => range(10, 15),
    11 => range(11, 15),
    12 => range(12, 15),
    13 => range(13, 15),
    14 => range(14, 15),
    15 => 15,
    default => 'out of range',
};
print_r($result);
