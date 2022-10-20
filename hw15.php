<?php
require_once 'autoload.php';

use Kuzmin\Hw15;

//Задание #1
$numbers = Hw15::delThree(0, 100);
Hw15::printArray($numbers);
echo PHP_EOL;

//Задание #2
$array = Hw15::evenOrUneven(0, 10);
Hw15::printArray($array);
echo PHP_EOL;

//Задание #3
$regionsArray = [
    'Московская область' => ['Москва', 'Зеленоград', 'Клин'],
    'Ленинградская область' => ['Санкт-Петербург', 'Всеволожск', 'Павловск', 'Кронштадт'],
    'Рязанская область' => ['Рязань', 'Касимов', 'Скопин', 'Сасово', 'Рыбное'],
];

Hw15::printArray($regionsArray);
echo PHP_EOL;

//Задание #4
$text = 'съешь ещё этих мягких французских булок, да выпей чаю';
echo Hw15::translitString($text) . PHP_EOL . PHP_EOL;

//Задание #5
echo Hw15::replaceSpaces($text) . PHP_EOL. PHP_EOL;

//Задание #6
#Сделано в отдельном файле hm15_6.php

//Задание #7
for($i = 0; print $i . PHP_EOL, $i++ < 9;);
echo PHP_EOL;
//Задание #8
Hw15::printArray($regionsArray, 'К');
echo PHP_EOL;

//Задание #9
echo Hw15::translitAndReplace($text) . PHP_EOL;