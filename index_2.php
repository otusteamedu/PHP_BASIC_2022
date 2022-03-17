<!--Присвоить переменной $а значение в промежутке [0..15].
С помощью оператора switch организовать вывод чисел от $a до 15.-->

<?php
$a = rand(0,15);

echo('$a: '.$a."\n");

switch ($a) {
    case 1 : echo ('1');
        break;
    case 2 : echo ('1,2');
        break;
    case 3 : echo ('1,2,3');
        break;
    case 4 : echo ('1,2,3,4');
        break;
    case 5 : echo ('1,2,3,4,5');
        break;
    case 6 : echo ('1,2,3,4,5,6');
        break;
    case 7 : echo ('1,2,3,4,5,6,7');
        break;
    case 8 : echo ('1,2,3,4,5,6,7,8');
        break;
    case 9 : echo ('1,2,3,4,5,6,7,8,9');
        break;
    case 10 : echo ('1,2,3,4,5,6,7,8,9,10');
        break;
    case 11 : echo ('1,2,3,4,5,6,7,8,9,10,11');
        break;
    case 12 : echo ('1,2,3,4,5,6,7,8,9,10,11,12');
        break;
    case 13 : echo ('1,2,3,4,5,6,7,8,9,10,11,12,13');
        break;
    case 14 : echo ('1,2,3,4,5,6,7,8,9,10,11,12,13,14');
        break;
    case 15 : echo ('1,2,3,4,5,6,7,8,9,10,11,12,13,14,15');
        break;
}
