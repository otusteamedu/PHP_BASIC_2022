<!--Присвоить переменной $а значение в промежутке [0..15].
С помощью оператора match организовать вывод чисел от $a до 15.-->

<?php
$a = rand(0,15);

echo('$a: '.$a);


$return_value = match ($a) {
    1 => implode(', ', range(1, 15)),
    2 => implode(', ', range(2, 15)),
    3 => implode(', ', range(3, 15)),
    4 => implode(', ', range(4, 15)),
    5 => implode(', ', range(5, 15)),
    6 => implode(', ', range(6, 15)),
    7 => implode(', ', range(7, 15)),
    8 => implode(', ', range(8, 15)),
    9 => implode(', ', range(9, 15)),
    10 => implode(', ', range(10, 15)),
    11 => implode(', ', range(11, 15)),
    12 => implode(', ', range(12, 15)),
    13 => implode(', ', range(13, 15)),
    14 => implode(', ', range(14, 15)),
    15 => implode(', ', range(15, 15)),
};

echo("\rВывод значений: ".$return_value);
