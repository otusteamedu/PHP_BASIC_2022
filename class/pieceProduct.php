<?php
require_once 'product.php';

class pieceProduct extends Product
{
    public function __construct(
        string $title,
        string $country,
        float $price,
        int $salesCount,
        int $vendorCode
    ) {
        parent::__construct($title, $country, $price, $salesCount, $vendorCode);
    }

}




