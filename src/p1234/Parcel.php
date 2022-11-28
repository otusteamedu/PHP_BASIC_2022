<?php

/**
 * Простая посылка
 */
class Parcel
{
    /**
     * @var вес в граммах
     */
    protected int $weight;

    /**
     * @var высота в сантиметрах
     */
    protected int $height;

    /**
     * @var ширина в сантиметрах
     */
    protected int $width;

    /**
     * @var длина в сантиметрах
     */
    protected int $length;

    /**
     * @var адрес назначения
     */
    protected string $toAddress;

    /**
     * @var адрес отправления
     */
    protected string $fromAddress;

    /**
     * @var регистрационный номер отправления
     */
    protected string $trackNumber;

    /**
     * @var признак вручения
     */
    protected bool $isDelivered = false;

    public function __construct(
        int $weight,
        int $height,
        int $width,
        int $length,
        string $toAddress,
        string $fromAddress,
        string $trackNumber
    ) {
        if ($weight > 20000) {
            throw new InvalidArgumentException("Превышен максимальный вес", 1);
        }
        if ($height + $width + $length > 300) {
            throw new InvalidArgumentException("Превышены максимальные габариты", 1);
        }

        $this->weight = $weight;
        $this->height = $height;
        $this->width = $width;
        $this->length = $length;
        $this->toAddress = $toAddress;
        $this->fromAddress = $fromAddress;
        $this->trackNumber = $trackNumber;
    }

    public function getWeight(): int
    {
        return $this->weight;
    }

    public function getHeight(): int
    {
        return $this->height;
    }

    public function getWidth(): int
    {
        return $this->width;
    }

    public function getLength(): int
    {
        return $this->length;
    }

    public function getToAddress(): string
    {
        return $this->toAddress;
    }

    public function getFromAddress(): string
    {
        return $this->fromAddress;
    }

    public function getTrackNumber(): string
    {
        return $this->trackNumber;
    }

    public function getIsDelivered(): bool
    {
        return $this->isDelivered;
    }

    public function setDelivered(): self
    {
        $this->isDelivered = true;

        return $this;
    }

    /**
     * Расчёт базовой цены
     * 
     * @return float цена отправления простой посылки в копейках
     */
    public function getPrice(): float
    {
        // некий алгоритм расчёта цены отправления
        $price = $this->weight * $this-calcDistance($this->fromAddress, $this->toAddress) * 0.03;

        return ceil($price * 100);
    }

    /**
     * Расчёт расстояния, на которое нужно отправить посылку
     * 
     * @return int расстояние в километрах
     */
    protected function calcDistance($fromAddress, $toAddress): float
    {
        $distance = 1.0;

        // некий алгоритм расчёта расстояния
        // $distance = ...

        return $distance;
    }
}
