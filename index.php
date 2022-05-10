<html lang="ru">
    <h3>Работа с классом холодильник</h3>


<?php
require_once 'class/fridge.php';
require_once 'class/book.php';

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
echo('Стоимость: '.$fridge->getPrice()."<br/>");
echo('Тип разморозки: '.$fridge->defrostType."<br/>");
echo('Цвет: '.$fridge->color."<br/>");
echo('Количество полок: '.$fridge->shelvesCount."<br/>");
echo('Остаток на складе: '.$fridge->productInStock."<br/>");
echo('Штрих код: '.$fridge->vendorCode."<br/>");

echo('Обьем для перевозки: '.$fridge->getVolume(2).' м3'."<br/>");
$fridge->productSale(45, 40);
echo('После продажи 40 штук, остаток: '.$fridge->productInStock."<br/>");
$fridge->productReceipt(45, 100);
echo('После поступления на склад 100 штук, остаток: '.$fridge->productInStock."<br/>");
?>

<h3>Работа с классом книги</h3>

<?php
$book = new Book(
    46,
    'Angular для профессионалов',
    1000,
    'Бумажная',
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
echo('Цена: '.$book->getPrice()."<br/>");
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
</html>