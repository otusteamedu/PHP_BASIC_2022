<?php

require_once 'class/CdProduct.php';
require_once 'class/BookProduct.php';
require_once 'class/GameProduct.php';

$cd1 = new CdProduct(
    "Классическая музыка. Лучшее",
    "Антонио",
    "Вивальди",
    "10,99",
    "60.33"
);

//var_dump($cd1);


echo ('Испольнитель: '.$cd1->getProducer()."<br/>");
echo ('Название: '.$cd1->title."<br/>");
echo ('Цена: '.$cd1->price."<br/>");
echo ('Длительность звучания: '.$cd1->playLength."<br/>");
echo ("<br/>");
echo ("<br/>");

$book1 = new BookProduct(
    "Собочье сердце",
    "Михаил",
    "Будгаков",
    "5.99",
    "256"
);

//var_dump($book1);

echo ('Автор: '.$book1->getProducer()."<br/>");
echo ('Название: '.$book1->title."<br/>");
echo ('Цена: '.$book1->price."<br/>");
echo ('Количество страниц: '.$book1->numPages."<br/>");
echo ("<br/>");
echo ("<br/>");


$game1 = new GameProduct(
    "The Elder Scrolls V: Skyrim",
    "Тодд",
    "Говард",
    "26.73",
    "17"
);

//var_dump($game1);

echo ('Разработчик: '.$game1->getProducer()."<br/>");
echo ('Название: '.$game1->title."<br/>");
echo ('Цена: '.$game1->price."<br/>");
echo ('Количество глав сюжета: '.$game1->countOfChapters."<br/>");
echo ("<br/>");
echo ("<br/>");

