<?php

$citiesRegions = [
  'Московская область:' => ['Москва', 'Зеленоград', 'Клин'],
  'Ленинградская область:' => ['Санкт-Петербург', 'Всеволожск', 'Павловск', 'Кронштадт'],
  'Рязанская область:' => ['Рязань', 'Касимов', 'Кораблино', 'Михайлов']
];
function displayCity($arr)
{
  foreach ($arr as $key => $value)
    echo $key . '<br>';
  for ($i = 0; $i < $arrLenght = count($arr[$key]); $i++) {
    if ($i == $arrLenght - 1) {
      echo $arr[$key][$i] . '.' . '<br>';
    } else {
      echo $arr[$key][$i] . ', ';
    }
  }
}
displayCity($citiesRegions);
