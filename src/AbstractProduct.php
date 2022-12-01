<?php

declare(strict_types=1);

/**
 * Абстрактный продукт
 */
abstract class AbstractProduct
{
    /**
     * @var float Базовая цена единицы товара
     */
    protected float $pricePerItem;

    /**
     * @var int|float Количество проданного товара (шт. или кг)
     */
    protected $productSoldQty;


    public function __construct(float $ppi)
    {
        $this->pricePerItem = $ppi;
    }

    /**
     * Подсчитать доход с продаж
     */
    public function getProfit(): float
    {
        return $this->productSoldQty * $this->getProductPrice();
    }

    /**
     * Задать количество проданного товара
     * 
     * @param int|float $qty
     */
    abstract public function setItemSoldQty($qty): self;

    /**
     * Расчёт реальной цены конкретного вида продукта за единицу
     */
    abstract protected function getProductPrice(): float;
}
