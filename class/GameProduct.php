<?php

require_once 'ShopProduct.php';


class GameProduct extends ShopProduct
{

    public $countOfChapters;

    public function __construct(
        string $title,
        string $firstName,
        string $mainName,
        float $price,
        int $countOfChapters
    ) {
        parent::__construct(
            $title,
            $firstName,
            $mainName,
            $price);
        $this->countOfChapters = $countOfChapters;
    }

    public function getcountOfChapters():int
    {
        return $this->countOfChapters;
    }

    public function getSummaryLine(): string
    {
        $base = "{$this->title} ( {$this->producerMainName}, ";
        $base .= "{$this->producerFirstName} )";
        $base .= ": {$this->countOfChapters} глав.";
        return $base;
    }
}

