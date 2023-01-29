<?php

abstract class Product
{

    protected $cost;
    protected $name;

    public function __construct($name, $cost)
    {
        $this->name = $name;
        $this->cost = $cost;
    }

    abstract public function getFinalCost();

    public function __toString()
    {
        return $this->name . ' : price is - ' . $this->cost . ' ';
    }
}

class DigitalProduct extends Product
{

    public function getFinalCost()
    {
        return $this->cost / 2;
    }
}

class PeiceProduct extends Product
{

    public function getFinalCost()
    {
        return $this->cost;
    }
}

class WeightProduct extends Product
{
    protected $weight;

    public function __construct($name, $cost, $weight)
    {
        parent::__construct($name, $cost);
        $this->weight = $weight;
    }

    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    public function getFinalCost()
    {
        return $this->weight * $this->cost;
    }

    public function __toString()
    {
        return parent::__toString() . ', weight - ' . $this->weight;
    }
}

$product_1 = new DigitalProduct('Digital Product', 10);
$product_2 = new PeiceProduct('Peice Product', 10);
$product_3 = new WeightProduct('Weight Product', 10, 1.5);


echo $product_1;
echo $product_2;
echo $product_3;
