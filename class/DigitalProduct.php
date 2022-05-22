<?php
include_once 'Product.php';

class DigitalProduct extends Product
{
    public function __construct(int $id, string $name, float $price, float $salesAmount,
                                int $productInStock, int $vendorCode)
    {
        parent::__construct($id, $name, $price, $salesAmount, $productInStock, $vendorCode);

    }

    public function getPrice($count)
    {
        if (empty($count))
            return false;

        if ($this->bookType == 'Электронная'){
            return parent::getPrice($count)*0.5;
        } else {
            return parent::getPrice($count);
        }
    }

    public function allSalesAmount(int $id, float $productCount)
    {
        if (empty($id) || empty($productCount))
            return false;

        $this->salesAmount += self::getPrice($productCount);
        return $this->salesAmount;
    }
}