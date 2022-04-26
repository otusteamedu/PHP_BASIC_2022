<?php
require_once 'class/fridge.php';
$fridge = new Fridge(
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
    4
);

var_dump($fridge);

echo('Модель холодильника: '.$fridge->getName().PHP_EOL);
echo('Страна производитель: '.$fridge->getProducingCountry().PHP_EOL);
echo('Производитель: '.$fridge->getManufacturer().PHP_EOL);
echo('Вес: '.$fridge->getWeight().PHP_EOL);
echo('Ширина: '.$fridge->getWidth().PHP_EOL);
echo('Высота: '.$fridge->getHeight().PHP_EOL);
echo('Длина: '.$fridge->getLength().PHP_EOL);
echo('Стоимость: '.$fridge->getPrice().PHP_EOL);
echo('Тип разморозки: '.$fridge->getDefrostType().PHP_EOL);
echo('Цвет: '.$fridge->getColor().PHP_EOL);
echo('Количество полок: '.$fridge->getShelvesCount().PHP_EOL);

echo('Обьем для перевозки: '.$fridge->getVolume().' м3');
?>
