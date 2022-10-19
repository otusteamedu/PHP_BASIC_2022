<?php

/**
 * Объявить массив, в котором в качестве ключей будут использоваться названия областей,
 *  а в качестве значений – массивы с названиями городов из соответствующей области.
 * Вывести в цикле значения массива, чтобы результат был таким:
 *  Московская область:
 *  Москва, Зеленоград, Клин
 *  Ленинградская область:
 *  Санкт-Петербург, Всеволожск, Павловск, Кронштадт
 *  Рязанская область …
 *
 * @param array $regionCities массив регионов с их городами в формате:
 *  ['название_региона_1' => ['название_города_1', ...], ...]
 *
 * @param ?string $firstLetter буква, с которой должны начинаться названия городов для отображения
 *  (null в случае отсутствия ограничений)
 *
 * @return void
 */
function print_region_cities(array $regionCities, ?string $firstLetter = null): void
{
    foreach ($regionCities as $region => $cities) {
        if (isset($firstLetter)) {
            $firstLetter = mb_strtoupper($firstLetter);
            $filteredCities = array_filter(
                $cities,
                fn ($city) => $firstLetter === mb_strtoupper(mb_substr($city, 0, 1))
            );
        }

        echo "<p> $region: </p>\n";
        echo "<ul>\n";
        echo join("", array_map(fn ($city) => "<li> $city </li>\n", $filteredCities ?? $cities));
        echo "</ul>\n";
    }
}

$regionCities = [
    'Московская область' => [
        'Москва',
        'Зеленоград',
        'Клин',
    ],
    'Ленинградская область' => [
        'Санкт-Петербург',
        'Всеволожск',
        'Павловск',
        'Кронштадт',
    ],
    'Владимирская область' => [
        'Владимир',
        'Ковров',
        'Киржач',
        'Покров',
    ],
    'Рязанская область' => [
        'Рязань',
        'Рыбное',
        'Зарайск',
        'Шилово',
        'Касимов',
    ],
];

print_region_cities($regionCities);
