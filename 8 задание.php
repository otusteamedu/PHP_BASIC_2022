<?php

$citiesRegions = [
    'Московская область:' => ['Москва', 'Зеленоград', 'Клин'],
    'Ленинградская область:' => ['Санкт-Петербург', 'Всеволожск', 'Павловск', 'Кронштадт'],
    'Рязанская область:' => ['Рязань', 'Касимов', 'Кораблино', 'Михайлов']
];

function searchCity($char, $arr)
{
    foreach ($arr as $key => $value) {
        for ($i = 0; $i < count($arr[$key]); $i++) {
            $chrArr = preg_split('//u', $arr[$key][$i], 0, PREG_SPLIT_NO_EMPTY);
            if ($chrArr[0] == $char) {
                echo implode($chrArr) . '<br>';
            }
        }
    }
}

searchCity('М', $citiesRegions);
