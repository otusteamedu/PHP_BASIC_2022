<?php
$a = -10;

$echo = function ($a) {
    for ($a; $a <= 15; $a++) {
        echo $a . PHP_EOL;
    }
};

$result = match ($a) {
    0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15 => $echo($a),
    default => ('Переменная не в диапазаоне от 0 до 15' . PHP_EOL)
};

echo $result;