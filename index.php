<html lang="ru">
    <h3>Работа с классом холодильник</h3>


<?php
require_once 'class/fridge.php';
require_once 'class/book.php';
require_once 'class/apple.php';

$fridge = new Fridge(
    45,
    'w234856',
    'Россия',
    'Indesit',
    24,
    54,
    210,
    65,
    25000,
    0,
    'NoFrost',
    'white',
    4,
    100,
    154365
);

var_dump($fridge);

echo("<br>");

echo('Модель холодильника: '.$fridge->name."<br/>");
echo('Страна производитель: '.$fridge->producingCountry."<br/>");
echo('Производитель: '.$fridge->manufacturer."<br/>");
echo('Вес: '.$fridge->weight."<br/>");
echo('Ширина: '.$fridge->width."<br/>");
echo('Высота: '.$fridge->height."<br/>");
echo('Длина: '.$fridge->length."<br/>");
echo('Стоимость: '.$fridge->getPrice(1)."<br/>");
echo('Тип разморозки: '.$fridge->defrostType."<br/>");
echo('Цвет: '.$fridge->color."<br/>");
echo('Количество полок: '.$fridge->shelvesCount."<br/>");
echo('Остаток на складе: '.$fridge->productInStock."<br/>");
echo('Штрих код: '.$fridge->vendorCode."<br/>");

echo('Обьем для перевозки: '.$fridge->getVolume(2).' м3'."<br/>");
$fridge->productSale(45, 40);
echo('После продажи 40 штук, остаток: '.$fridge->productInStock."<br/>");
$fridge->allSalesAmount(45, 40);
echo('Доход от продажи 40 штук, составил: '.$fridge->salesAmount." руб.<br/>");
$fridge->productSale(45, 10);
echo('После продажи 10 штук, остаток: '.$fridge->productInStock."<br/>");
$fridge->allSalesAmount(45, 10);
echo('После продажи еще 10 штук, доход составил: '.$fridge->salesAmount." руб.<br/>");
$fridge->productReceipt(45, 100);
echo('После поступления на склад 100 штук, остаток: '.$fridge->productInStock."<br/>");
?>

<h3>Работа с классом книги</h3>

<?php
$book = new Book(
    46,
    'Angular для профессионалов',
    1000,
    0,
    'Электронная',
    'Фримен А.',
    357,
    'Питер',
    2019,
    1,
    10,
    154366,
);

var_dump($book);

echo("<br/>");

echo('Название книги: '.$book->name."<br/>");
echo('Цена: '.$book->getPrice(1)."<br/>");
echo('Тип книги: '.$book->bookType."<br/>");
echo('Автор: '.$book->author."<br/>");
echo('Количество страниц: '.$book->numberOfPage."<br/>");
echo('Издательство: '.$book->publishingHouse."<br/>");
echo('Год издания: '.$book->yearOfPublishing."<br/>");
echo('№ издания: '.$book->editionNumber."<br/>");
echo('Остаток на складе: '.$book->productInStock."<br/>");
echo('Штрих код: '.$book->vendorCode."<br/>");

$book->productSale(46, 5);
echo('После продажи 5 штук, остаток: '.$book->productInStock."<br/>");
$book->productReceipt(46, 50);
echo('После поступления на склад 50 штук, остаток: '.$book->productInStock."<br/>");

?>

<h3>Работа с классом яблоки</h3>

<?php
$apple = new Apple(
        47,
        'Яблоки зеленые',
      100,
      0,
    'Белый налив',
    'Россия',
    53.5,
    155307
);

var_dump($apple);

echo("<br/>");

echo('Название: '.$apple->name."<br/>");
echo('Цена: '.$apple->getPrice(1)."<br/>");
echo('Сорт: '.$apple->variety."<br/>");
echo('Страна происхождения: '.$apple->producingCountry."<br/>");

$apple->productSale(47, 13.5);
echo('После продажи 13.5 кг, остаток: '.$apple->productInStock."<br/>");

$apple->allSalesAmount(47, 13.5);
echo('Доход от продажи 13.5 кг, составил: '.$apple->salesAmount." руб.<br/>");

$apple->productSale(47, 10);
echo('После продажи 10 кг, остаток: '.$apple->productInStock."<br/>");

$apple->allSalesAmount(47, 10);
echo('После продажи еще 10 кг, доход составил: '.$apple->salesAmount." руб.<br/>");

$apple->productReceipt(47, 50);
echo('После поступления на склад 50 кг, остаток: '.$apple->productInStock."<br/>");
?>

</html>