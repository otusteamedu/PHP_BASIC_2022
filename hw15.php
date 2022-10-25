<?php
require_once 'vendor/autoload.php';

use Otus\Kuzmin\Hw15;

$class = new Hw15();

$class->outputData('Задание #1', 'console');
$numbers = $class->delThree(0, 100);
$result = $class->prepareArrayToPrint($numbers);
$class->outputData($result, 'console');

$class->outputData('Задание #2', 'console');
$array = $class->evenOrUneven(0, 10);
$result = $class->prepareArrayToPrint($array);
$class->outputData($result, 'console');

$class->outputData('Задание #3', 'console');
$regionsArray = [
    'Московская область' => ['Москва', 'Зеленоград', 'Клин'],
    'Ленинградская область' => ['Санкт-Петербург', 'Всеволожск', 'Павловск', 'Кронштадт'],
    'Рязанская область' => ['Рязань', 'Касимов', 'Скопин', 'Сасово', 'Рыбное'],
];

$result = $class->prepareArrayToPrint($regionsArray);
$class->outputData($result, 'console');

$class->outputData('Задание #4', 'console');
$text = 'съешь ещё этих мягких французских булок, да выпей чаю';
echo $class->translitString($text) . PHP_EOL . PHP_EOL;

$class->outputData('Задание #5', 'console');
echo $class->replaceSpaces($text) . PHP_EOL. PHP_EOL;

//Задание #6
#Сделано в отдельном файле hm15_6.php

$class->outputData('Задание #7', 'console');
for($i = 0; print $i . PHP_EOL, $i++ < 9;);
echo PHP_EOL;

$class->outputData('Задание #8', 'console');
$result = $class->prepareArrayToPrint($regionsArray, 'К');
$class->outputData($result, 'console');

$class->outputData ('Задание #9', 'console');
$result = $class->translitAndReplace($text) . PHP_EOL;
$class->outputData($result, 'console');