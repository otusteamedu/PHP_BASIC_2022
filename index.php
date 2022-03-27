<?php

/**
 * Задание 1:
 * С помощью цикла while вывести все числа в промежутке от 0 до 100, которые делятся на 3 без остатка.
 */

function division_by_three () {
    $i = 0;
    while ($i <= 100) {
        if ($i % 3 === 0)
            echo $i . PHP_EOL;
        $i++;
    }
}

division_by_three ();

/**
 * Задание 2
 * С помощью цикла do…while написать функцию для вывода чисел от 0 до 10, чтобы результат выглядел так: 0 – это ноль. 1 – нечетное число. 2 – четное число. 3 – нечетное число. … 10 – четное число.
 */

function even_odd_numbers () {
    $i = 0;
    do {
        echo $i;
        if ($i === 0)
            echo ' – это ноль.' . PHP_EOL;
        elseif ($i % 2 === 0)
            echo ' – четное число.' . PHP_EOL;
        else
            echo ' – нечетное число.' . PHP_EOL;
        $i++;
    } while ($i <= 10);
}

even_odd_numbers ();

/**
 * Задание 3
 * Объявить массив, в котором в качестве ключей будут использоваться названия областей, а в качестве значений – массивы с названиями городов из соответствующей области. Вывести в цикле значения массива,
 * чтобы результат был таким: Московская область: Москва, Зеленоград, Клин Ленинградская область: Санкт-Петербург, Всеволожск, Павловск, Кронштадт Рязанская область … (названия городов можно найти на maps.yandex.ru)
 */

function list_location (array $location_region) {
    foreach ($location_region as $region => $location_city) {
        echo $region .':' . PHP_EOL;
        if (is_array($location_city)) {
            echo implode(', ', $location_city) . PHP_EOL;
        }
    }
}

$location_region = [
    'Московская область' => [
        'Апрелевка',
        'Балашиха',
        'Белоозёрский',
        'Бронницы',
        'Верея',
        '...',
        'Яхрома',
    ],
    'Ленинградская область' => [
        'Бокситогорск',
        'Волосово',
        'Волхов',
        'Всеволожск',
        'Выборг',
        '...',
        'Шлиссельбург',
    ],
    'Рязанская область' => [
        'Касимов',
        'Кораблино',
        'Михайлов',
        'Новомичуринск',
        'Рыбное',
        '...',
        'Шацк',
    ],
];

list_location ($location_region);

/**
 * Задание 4
 * Объявить массив, индексами которого являются буквы русского языка, а значениями – соответствующие латинские буквосочетания
 * (‘а’=> ’a’, ‘б’ => ‘b’, ‘в’ => ‘v’, ‘г’ => ‘g’, …, ‘э’ => ‘e’, ‘ю’ => ‘yu’, ‘я’ => ‘ya’). Написать функцию транслитерации строк.
 *
 * Некоторые буквы русского языка можно трарслитерировать разными способами, поскольку существуют множество правил и стандартов по замене кириллицы на латиницу.
 * Я в своей работе выбрал транслит по правилам Яндекса.
 */

function string_translit (string $string) {
    $letters = [
        'А' => 'A',     'а' => 'a',
        'Б' => 'B',     'б' => 'b',
        'В' => 'V',     'в' => 'v',
        'Г' => 'G',     'г' => 'g',
        'Д' => 'D',     'д' => 'd',
        'Е' => 'E',     'е' => 'е',
        'Ё' => 'YO',    'ё' => 'yo',
        'Ж' => 'ZH',    'ж' => 'zh',
        'З' => 'Z',     'з' => 'z',
        'И' => 'I',     'и' => 'i',
        'Й' => 'J',     'й' => 'j',
        'К' => 'K',     'к' => 'k',
        'Л' => 'L',     'л' => 'l',
        'М' => 'M',     'м' => 'm',
        'Н' => 'N',     'н' => 'n',
        'О' => 'O',     'о' => 'o',
        'П' => 'P',     'п' => 'p',
        'Р' => 'R',     'р' => 'r',
        'С' => 'S',     'с' => 's',
        'Т' => 'T',     'т' => 't',
        'У' => 'U',     'у' => 'u',
        'Ф' => 'F',     'ф' => 'f',
        'Х' => 'H',     'х' => 'h',
        'Ц' => 'C',     'ц' => 'c',
        'Ч' => 'CH',    'ч' => 'ch',
        'Ш' => 'SH',    'ш' => 'sh',
        'Щ' => 'SC',    'щ' => 'sc',
        'Ъ' => '"',     'ъ' => '"',
        'Ы' => 'Y',     'ы' => 'y',
        'Ь' => '',      'ь' => '',
        'Э' => 'EH',    'э' => 'eh',
        'Ю' => 'YU',    'ю' => 'yu',
        'Я' => 'YA',    'я' => 'ya',
    ];
    return str_replace (array_keys($letters), array_values($letters), $string);
}

echo (string_translit ('Онлайн-образование') . PHP_EOL);

/**
 * Залдание 5
 * Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку.
 */

function space_replace (string $string) {
    return str_replace(' ', '_', $string);
}

echo(space_replace ('Авторские онлайн‑курсы для профессионалов'). PHP_EOL);

/**
 * Залдание 6
 * В имеющемся шаблоне сайта заменить статичное меню (ul - li) на генерируемое через PHP. Необходимо представить пункты меню как элементы
 * массива и вывести их циклом. Подумать, как можно реализовать меню с вложенными подменю? Попробовать его реализовать.
 */

/**
 * Залдание 7
 * Вывести с помощью цикла for числа от 0 до 9, НЕ используя тело цикла. То есть выглядеть должно так: for (…){ // здесь пусто}
 */

for ($i = 0; $i <= 9; print $i++ . PHP_EOL) {};

/**
 * Залдание 8
 * Повторить третье задание, но вывести на экран только города, начинающиеся с буквы «К».
 */

/**
 * Залдание 9
 * Объединить две ранее написанные функции в одну, которая получает строку на русском языке, производит транслитерацию и замену пробелов на подчеркивания (аналогичная задача решается
 * при конструировании url-адресов на основе названия статьи в блогах).
 */

?>