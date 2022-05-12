<?php
/**
 * @Apple класс товара Яблоки
 *
 * @var string $variety Сорт яблок
 * @var string $producingCountry Страна изготовитель
 *
 */
class Apple extends Product
{
    public $variety;
    public $producingCountry;

    public function __construct(int $id, string $name, float $price, float $salesAmount, string $variety,
                                string $producingCountry, float $productInStock, int $vendorCode)
    {
        parent::__construct($id, $name, $price, $salesAmount, $productInStock, $vendorCode);
        $this->variety = $variety;
        $this->producingCountry = $producingCountry;
    }

    public function allSalesAmount(int $id,float $productCount)
    {
        if (empty($id) || empty($productCount))
            return false;

        $this->salesAmount += $this->getPrice($productCount);
        return $this->salesAmount;
    }
}