<!--Присвоить переменной $а значение в промежутке [0..15].
С помощью оператора switch организовать вывод чисел от $a до 15.-->

<?php
$a = rand(0,15);

echo('$a: '.$a."\n");

switch ($a) {
    case 1 : echo ("1\n");
    case 2 : echo ("2\n");
    case 3 : echo ("3\n");
    case 4 : echo ("4\n");
    case 5 : echo ("5\n");
    case 6 : echo ("6\n");
    case 7 : echo ("7\n");
    case 8 : echo ("8\n");
    case 9 : echo ("9\n");
    case 10 : echo ("10\n");
    case 11 : echo ("11\n");
    case 12 : echo ("12\n");
    case 13 : echo ("13\n");
    case 14 : echo ("14\n");
    case 15 : echo ("15\n");
        break;
}
