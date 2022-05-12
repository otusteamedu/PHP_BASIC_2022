<?php
$a = 5; $b = '05';
var_dump($a == $b);
//True. Неявное приведение строки к целому числу;

var_dump((int)'012345');
//12345, потому что приведение к int отбрасывает впереди стоящий ноль, переводя в десятичную систему;

var_dump((float)123.0 === (int)123.0);
//False, потому что оператор тождественного равенства не делает неявного приведения типов;

var_dump((int)0 === (int)'hello, world');
//True, потому что в начале строки отсутствуют цифры и при приведении к int строка имеет значение 0;

//3* Вывод не изменился bool(true); int(12345); bool(false); bool(true)

//4*
$a = 1;
$b = 2;
$a = $b - $a;
$b = $b - $a;
$a = $b + $a;
echo $a, ' и ' ,$b;
?>
