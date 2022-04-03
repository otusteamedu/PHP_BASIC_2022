<?php declare(strict_types = 1) ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My first html page</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
// 1.С помощью цикла while вывести все числа в промежутке от 0 до 100, которые делятся на 3 без остатка.
$i = 0;
while($i <= 100){
    if(!($i % 3)){
        echo $i.', ';
    }
    $i++;
}
echo '<br>'.PHP_EOL;

//2.С помощью цикла do…while написать функцию для вывода чисел от 0 до 10, чтобы результат выглядел так:
// 0 – это ноль. 1 – нечетное число. 2 – четное число. 3 – нечетное число. … 10 – четное число.
$i = 1;
echo '0 – это ноль'.', '.PHP_EOL;
do{
    $textEvenOdd = match($i % 2){
        0 => "$i – четное число",
        1 => "$i – нечетное число"
    };
    echo $textEvenOdd.', '.PHP_EOL;
    $i++;
}while($i <= 10);

echo '<br>'.PHP_EOL;
//3.Объявить массив, в котором в качестве ключей будут использоваться названия областей,
// а в качестве значений – массивы с названиями городов из соответствующей области.
// Вывести в цикле значения массива, чтобы результат был таким: Московская область: Москва, Зеленоград,
// Клин Ленинградская область: Санкт-Петербург, Всеволожск, Павловск, Кронштадт
// Рязанская область … (названия городов можно найти на maps.yandex.ru)

$regions = [
    'Московская область' => [
        'Москва',
        'Зеленоград',
        'Клин'
    ],
    'Ленинградская область' => [
        'Всеволожск',
        'Павловск',
        'Кронштадт'
    ],
    'Рязанская область' => [
        'Михайлов',
        'Скопин',
        'Рязань'
    ]
];

foreach ($regions as $region => $cities){
    echo $region.': '.implode(', ', $cities).'<br>';
}

echo '<br>'.PHP_EOL;

//4.Объявить массив, индексами которого являются буквы русского языка, а значениями –
// соответствующие латинские буквосочетания (‘а’=> ’a’, ‘б’ => ‘b’, ‘в’ => ‘v’, ‘г’ => ‘g’,
// …, ‘э’ => ‘e’, ‘ю’ => ‘yu’, ‘я’ => ‘ya’). Написать функцию транслитерации строк.


function translitRusToLat(string $text): string
{
    $translitDict = ['а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''];
    $text = mb_strtolower($text);
    $transText = '';
    for ($i = 0; $i < mb_strlen($text); $i++){
        $char = mb_substr($text, $i, 1);
        if(array_key_exists($char, $translitDict))
            $transText .= $translitDict[$char];
        else
            $transText .= $char;
    }
    return $transText;
}

echo translitRusToLat('Некоторый текст, обо всем');
echo '<br>'.PHP_EOL;


//5.Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку.
function convertSpaceToUnderline(string $text): string
{
    return mb_ereg_replace( '[ *]', '_', $text);
}

echo convertSpaceToUnderline('Шла Саша по шоссе');
echo '<br>'.PHP_EOL;

//6.В имеющемся шаблоне сайта заменить статичное меню (ul - li) на генерируемое через PHP.
// Необходимо представить пункты меню как элементы массива и вывести их циклом. Подумать,
// как можно реализовать меню с вложенными подменю? Попробовать его реализовать.
// Сделаю здесь вывод меню. Не помню в шаблонах вывода меню.
$menu = [
    'Телевизоры' => [
        'Большие',
        'Самсунг',
        'Настенный'
    ],
    'Стиральные машины' => [
        'Автоматические',
        'Новые'
    ],
    'Мебель' => [
        'Шкафы',
        'Диваны',
        'Тумбы'
    ],
    'Матрасы'
];

$htmlMenu = '';
function getMainMenu(array $menu, string &$htmlMenu): void
{
    $htmlMenu .= '<ul>';
    foreach ($menu as $key => $submenu){
        if(gettype($submenu) === 'array'){
            $htmlMenu .= '<li>'.$key;
            $htmlMenu .= getMainMenu($submenu, $htmlMenu);
        }else{
            $htmlMenu .= '<li>'.$submenu;
        }
        $htmlMenu .= '</li>';

    }
    $htmlMenu .= '</ul>';
}

getMainMenu($menu, $htmlMenu);
echo $htmlMenu;
echo '<br>'.PHP_EOL;

//7.*Вывести с помощью цикла for числа от 0 до 9, НЕ используя тело цикла. То есть выглядеть должно так: for (…){ // здесь пусто}
$print = function ($index){
    echo $index.'<br>';
};

for($i = 0; $i < 10; $print($i), $i++){

}
echo '<br>'.PHP_EOL;

//8.*Повторить третье задание, но вывести на экран только города, начинающиеся с буквы «К».
function getFirstK(array $cities): array
{
    foreach ($cities as $city){
        if(mb_substr($city, 0, 1) !== 'К')
            unset($cities[key($cities)]);
    }
    return  $cities;
};

foreach ($regions as $region => $cities){
    echo $region.': '.implode(', ', getFirstK($cities)).'<br>';
}

echo '<br>'.PHP_EOL;

//9.*Объединить две ранее написанные функции в одну, которая получает строку на русском языке,
// производит транслитерацию и замену пробелов на подчеркивания (аналогичная задача решается
// при конструировании url-адресов на основе названия статьи в блогах).

function getCHPU($text): string
{
    $translitDict = ['а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''];
    $text = mb_strtolower($text);
    $transText = '';
    for ($i = 0; $i < mb_strlen($text); $i++){
        $char = mb_substr($text, $i, 1);
        if(array_key_exists($char, $translitDict))
            $transText .= $translitDict[$char];
        else
            $transText .= $char;
    }
    return mb_ereg_replace( '[ *]', '_', $transText);
}

echo getCHPU('Некоторый текст о чем-то');
echo '<br>'.PHP_EOL;

?>
</body>
</html>