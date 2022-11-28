<?php

/**
 * Посылка 1 класса
 */
final class FirstClassParcel extends Parcel
{
    /**
     * @var int объявленная стоимость (в копейках)
     */
    private int $declaredValue = 0;

    /**
     * @var int наложенный платёж (в копейках)
     */
    private int $cashOnDelivery = 0;

    /**
     * @var array опись вложения
     */
    private array $contentsList = [];

    public function __construct(
        int $weight,
        int $height,
        int $width,
        int $length,
        string $toAddress,
        string $fromAddress,
        string $trackNumber
    ) {
        // особые ограничения на габариты и вес посылки для данной категории
        if ($weight > 5000) {
            throw new InvalidArgumentException("Превышен максимальный вес", 1);
        }
        if ($height + $width + $length > 70 || $height > 36 || $width > 36 || $length > 36) {
            throw new InvalidArgumentException("Превышены максимальные габариты", 2);
        }

        parent::__construct($weight, $height, $width, $length, $toAddress, $fromAddress, $trackNumber);
    }

    public function getDeclaredValue(): int
    {
        return $this->declaredValue;
    }

    public function setDeclaredValue(int $declaredValue): self
    {
        $this->declaredValue = $declaredValue;

        return $this;
    }

    public function getCashOnDelivery(): int
    {
        return $this->cashOnDelivery;
    }

    public function setCashOnDelivery(int $cashOnDelivery): self
    {
        $this->cashOnDelivery = $cashOnDelivery;

        return $this;
    }

    public function getContentsList(): array
    {
        return $this->contentsList;
    }

    public function setContentsList(array $contentsList): self
    {
        $this->contentsList = $contentsList;

        return $this;
    }

    /**
     * Расчёт итоговой цены посылки (в копейках)
     * 
     * @return int
     */
    public function getPrice(): float
    {
        // базовая цена отправления
        $price = parent::getPrice();

        // некий алгоритм наценки за услуги
        $price += $this->declaredValue / 3.39;
        // была заказана опись вложения
        $price += !empty($this->contentsList) ? 12000.0 : 0.0;

        return ceil($price);
    }
}
