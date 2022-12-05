<?php

abstract class Product
{
    public float $price = 0;

    public function getPrice(): float
    {
        return $this->price;
    }
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }
    abstract public function totalCost($coast): float;
}

class SingleProduct extends Product
{
    public function totalCost($count): float
    {
        if (!is_int($count)) {
            echo "The quantity must be an integer" . PHP_EOL;
            return 0;
        } else {
            return $count * $this->price;
        }
    }
}

class DigitalProduct extends Product
{
    public function __construct(SingleProduct $parentProduct)
    {
        $parentPrice = $parentProduct->price;
        $this->price = $parentProduct->getPrice($parentPrice) / 2;
    }
    public function totalCost($count = 1): float
    {
        return $this->price;
    }
    function setPrice(float $price): void
    {
        echo "the price of the digital item is fixed" . PHP_EOL;
    }
}

class WeightProduct extends Product
{
    public function totalCost($weight): float
    {
        return $weight * $this->price;
    }
}

//test

$book = new SingleProduct();
$book->setPrice(10);

$digitalBook = new DigitalProduct($book);

$sugar = new WeightProduct();
$sugar->setPrice(5.5);

echo "The book's total price is " . $book->totalCost(5) . PHP_EOL;
echo "The digital book's price is " . $digitalBook->totalCost() . PHP_EOL;
echo "The sugar's total price is " . $sugar->totalCost(10);
