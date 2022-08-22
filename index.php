<?php
require_once 'class/pieceProduct.php';
require_once 'class/weightProduct.php';
require_once 'class/digitalProduct.php';

$piece = new pieceProduct(
    "Автомобиль",
    "Южная Корея",
    "30000",
    "4",
    "141516"
);

print_r($piece);
echo ("<br/>");
echo ("<br/>");
echo ('Профит: '.$piece->getProfite()."<br/>");
echo ("<br/>");
echo ("<br/>");

$weight = new weightProduct(
    "Автомобиль",
    "Южная Корея",
    "30000",
    "4",
    "141516"
);
print_r($weight);
echo ("<br/>");
echo ("<br/>");
echo ('Профит: '.$weight->getProfite()."<br/>");
echo ("<br/>");
echo ("<br/>");

$digital = new digitalProduct(
    "Автомобиль",
    "Южная Корея",
    "30000",
    "4",
    "141516"
);
print_r($digital);
echo ("<br/>");
echo ("<br/>");
echo ('Профит: '.$digital->getProfite()."<br/>");
echo ("<br/>");
echo ("<br/>");


