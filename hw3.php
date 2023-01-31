<?php
echo "Задание 1";
echo "<br>";
function task1(): string
{
	$return = '';
	$i = 0;
	while ($i <= 100):
		if ($i%3 == 0)
	    	$return .= $i." ";
	    $i++;
	endwhile;
	return $return;
}
echo task1();
echo "<br>";
echo "<br>";
/*==========================================================*/

echo "Задание 2";
echo "<br>";
function task2(): string
{
	$return = '';
	$i = 0;
	do {
	    $return .= $i."-";
	    if ($i == 0) $return .= "это ноль";
	    else if ($i%2 == 0)  $return .= "четное число";
	    else $return .= "нечетное число";
	    $return .= "<br>";
	    $i++;
	} while ($i <= 10);
	return $return;
}
echo task2();
echo "<br>";
/*==========================================================*/

echo "Задание 3";
echo "<br>";

$regionsWithCities = [];
$regionsWithCities['Московская'] = ['Москва', 'Зеленоград', 'Клин'];
$regionsWithCities['Ленинградская'] = ['Санкт-Петербург', 'Всеволожск', 'Павловск', 'Кронштадт'];
$regionsWithCities['Ростовская'] = ['Ростов-на-Дону', 'Шахты'];
$regionsWithCities['Волгоградская'] = [];

function getCitiesTamplate(array $regionsWithCities): string
{
    $return = '';
	foreach ($regionsWithCities as $region => $cities) {
    	$return .= $region." область:<br>";
	    if (count($cities) > 0){
	    	$return .= implode(", ", $cities);
	    } else {
	    	$return .= "Нет данных";
	    }
	    $return .= "<br>";
	}
	return $return;
}
echo getCitiesTamplate($regionsWithCities);
echo "<br>";
/*==========================================================*/


echo "Задание 4";
echo "<br>";

function translit(string $text): string
{
	$dictionary = ['а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'e', 'ж' => 'zh','з' => 'z', 'и' => 'i',
			'й' => 'y', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't',
			'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c', 'ч' => 'ch', 'ш' => 'sh','щ' => 'sch',  'ь' => '',  'ы' => 'y', 'ъ' => '',
			'э' => 'e', 'ю' => 'yu','я' => 'ya'];
	return strtr(mb_strtolower($text), $dictionary);
}
$string = 'Привет Отус';
echo translit($string);
echo "<br>";
echo "<br>";
/*==========================================================*/


echo "Задание 5";
echo "<br>";
function replaceSpaces(string $text): string
{
	return str_replace(" ", "_", $text);
}
$string = 'Привет Отус';
echo replaceSpaces($string);
echo "<br>";
/*==========================================================*/

echo "Задание 7";
echo "<br>";
for ($i=0; $i<=9; print $i++){}
echo "<br>";
echo "<br>";
/*==========================================================*/


echo "Задание 8";
echo "<br>";
function getCitiesOnlyKStartTamplate(array $regionsWithCities): string
{
	$return = '';	
	foreach ($regionsWithCities as $region => $cities) {
	    $return .= $region." область:<br>";
	    $citiesWithFirstK = array_filter($cities, function ($var){ return mb_strtolower(mb_substr($var, 0, 1)) == 'к'; }, );
	    if (count($citiesWithFirstK) > 0){
	    	$return .= implode(", ", $citiesWithFirstK);
	    } else {
	    	$return .= "Нет данных";
	    }
	    $return .= "<br>";
	}
    return $return;
}
echo getCitiesOnlyKStartTamplate($regionsWithCities);

echo "<br>";
/*==========================================================*/



echo "Задание 9";
echo "<br>";
function prepareString(string $text): string
{
	return replaceSpaces(translit($text));
}
echo prepareString('Привет Отус! Как дела?');
echo "<br>";
?>