<?php
include_once 'Product.php';

class SingleProduct extends Product
{
    use Sales;
    public function __construct(int $id, string $name, float $price, float $salesAmount,
                                int $productInStock, int $vendorCode)
    {
        parent::__construct($id, $name, $price, $salesAmount, $productInStock, $vendorCode);

    }
}