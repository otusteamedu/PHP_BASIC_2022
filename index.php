<?php

abstract class Product
{

    protected static $cost = 1;

    abstract public function getFinalCost();
}

class DigitalProduct extends Product
{

    public function getFinalCost()
    {
        return self::$cost / 2;
    }
}

class PeiceProduct extends Product
{

    public function getFinalCost()
    {
        return self::$cost;
    }
}

class WeightProduct extends Product
{

    private $weight;

    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    public function getFinalCost()
    {
        return $this->weight * self::$cost;
    }
}

$product_1 = new DigitalProduct;
$product_2 = new PeiceProduct;
$product_3 = new WeightProduct;

$product_3->setWeight(2.5);

echo "Стоимость цифрового товара - {$product_1->getFinalCost()}, ";
echo "Стоимость штучного товара - {$product_2->getFinalCost()}, ";
echo "Стоимость весового товара - {$product_3->getFinalCost()}, ";
