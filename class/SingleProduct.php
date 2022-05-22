<?php
include_once 'Product.php';

class SingleProduct extends Product
{
    public function __construct(int $id, string $name, float $price, float $salesAmount,
                                int $productInStock, int $vendorCode)
    {
        parent::__construct($id, $name, $price, $salesAmount, $productInStock, $vendorCode);

    }

    public function allSalesAmount(int $id, float $productCount)
    {
        if (empty($id) || empty($productCount))
            return false;

        $this->salesAmount += $this->getPrice($productCount);
        return $this->salesAmount;
    }
}