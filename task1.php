<?php
declare(strict_types = 1);

function sum (int|float $a, int|float $b): int|float {
    return $a + $b;
}

function multiply (int|float $a, int|float $b): int|float {
    return $a * $b;
}

function division (int|float $a, int|float $b): int|float {
    return $a / $b;
}

function subtraction (int|float $a, int|float $b): int|float {
    return $a - $b;
}

echo sum(6.5,2) . PHP_EOL;
echo multiply(3,2) . PHP_EOL;
echo division(3,2) . PHP_EOL;
echo subtraction(3,2) . PHP_EOL;