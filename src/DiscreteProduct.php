<?php

declare(strict_types=1);

/**
 * Штучный товар
 */
class DiscreteProduct extends AbstractProduct
{
    protected $productSoldQty = 0;

    public function setItemSoldQty($qty): self
    {
        if (!is_int($qty) || $qty < 0) {
            throw new InvalidArgumentException('
                Количество товара должно быть неотрицательным целым числом
            ');
        }

        $this->productSoldQty = $qty;

        return $this;
    }

    /** Базовая цена обычная */
    protected function getProductPrice(): float
    {
        return $this->pricePerItem;
    }
}
