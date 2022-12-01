<?php

declare(strict_types=1);

/**
 * Цифровой товар
 */
final class DigitalProduct extends DiscreteProduct
{
    /** Цена цифрового варианта дешевле в 2 раза */
    protected function getProductPrice(): float
    {
        return $this->pricePerItem * 0.5;
    }
}
