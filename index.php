<?php
//1*
//если $a и $b положительные, вывести их разность;
//если $а и $b отрицательные, вывести их произведение;
//если $а и $b разных знаков, вывести их сумму; ноль можно считать положительным числом.
$a = rand(-10,10);
$b = rand(-10,10);

if ($a >= 0 & $b >= 0) {
    echo $a - $b;
} elseif ($a < 0 & $b < 0) {
    echo $a * $b;
} elseif(($a >= 0 & $b < 0) || ($a < 0 & $b >= 0)){
    echo $a + $b;
}
?>
//2*
//Присвоить переменной $а значение в промежутке [0..15].
//С помощью оператора switch организовать вывод чисел от $a до 15.
<?php
$a = rand(0,15);

switch($a) {
    case 0:
        echo 0 . PHP_EOL;
    case 1:
        echo 1 . PHP_EOL;
    case 2:
        echo 2 . PHP_EOL;
    case 3:
        echo 3 . PHP_EOL;
    case 4:
        echo 4 . PHP_EOL;
    case 5:
        echo 5 . PHP_EOL;
    case 6:
        echo 6 . PHP_EOL;
    case 7:
        echo 7 . PHP_EOL;
    case 8:
        echo 8 . PHP_EOL;
    case 9:
        echo 9 . PHP_EOL;
    case 10:
        echo 10 . PHP_EOL;
    case 11:
        echo 11 . PHP_EOL;
    case 12:
        echo 12 . PHP_EOL;
    case 13:
        echo 13 . PHP_EOL;
    case 14:
        echo 14 . PHP_EOL;
    case 15:
        echo 15 . PHP_EOL;
        break;
}
?>

//3* Реализуйте функционал из п.2 при помощи match
<?php
$a = rand(0,15);
$return_value = match ($a) {
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
var_dump($return_value);
?>
