<?php

abstract class Product
{
    protected $title; // название товара
    protected $country; // страна производитель
    protected $price; // цена единицы
    protected $salesCount; // количество проданных единиц
    protected $vendorCode; // артикул

    public function __construct(
        string $title,
        string $country,
        float $price,
        int $salesCount,
        int $vendorCode
    ) {
        $this->title = $title;
        $this->country = $country;
        $this->price = $price;
        $this->salesCount = $salesCount;
        $this->vendorCode = $vendorCode;
    }

    public function getProfite(): float
    {
        return ($this->price * $this->salesCount); // (цена за единицу * количество проданных единиц)
    }
}