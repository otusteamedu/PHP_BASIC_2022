<?php

declare(strict_types=1);

/**
 * Весовой товар
 */
final class WeightProduct extends AbstractProduct
{
    protected $productSoldQty = 0.0;

    public function setItemSoldQty($qty): self
    {
        if (!is_numeric($qty) || $qty < 0) {
            throw new InvalidArgumentException('
                Количество товара должно быть неотрицательным числом
            ');
        }

        $this->productSoldQty = floatval($qty);

        return $this;
    }

    /** Варианты цен со скидками в зависимости от проданного веса */
    protected function getProductPrice(): float
    {
        $basePrice = $this->pricePerItem;
        $qty = $this->productSoldQty;

        if ($qty > 10.0 && $qty < 20.0) {
            return $basePrice * 0.9;
        }
        if ($qty > 20.0) {
            return $basePrice * 0.8;
        }

        return $basePrice;
    }
}
