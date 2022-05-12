<?php
/**
 * @Fridge класс параметры Холодильников
 *
 * @var string $producingCountry Страна изготовитель
 * @var string $manufacturer Производитель
 * @var string $defrostType Тип разморозки
 * @var string $color Цвет корпуса
 * @var string $shelvesCount Количество полок
 *
 */

require_once 'product.php';

class Fridge extends Product {

    public $producingCountry;
    public $manufacturer;
    public $defrostType;
    public $color;
    public $weight;
    public $width;
    public $height;
    public $length;

    public function __construct(int $id, string $name, string $producingCountry, string $manufacturer,
                                int $weight, int $width, int $height, int $length, float $price, float $salesAmount,
                                string $defrostType, string $color, int $shelvesCount, int $productInStock, int $vendorCode)
    {
        parent::__construct($id, $name, $price, $salesAmount, $productInStock, $vendorCode);
        $this->weight = $weight;
        $this->width = $width;
        $this->height = $height;
        $this->length = $length;
        $this->defrostType = $defrostType;
        $this->color = $color;
        $this->shelvesCount = $shelvesCount;
        $this->producingCountry = $producingCountry;
        $this->manufacturer = $manufacturer;
    }

    public function getVolume($productCount){
        if ($productCount < 1)
            return false;
        $volume = ($productCount * ($this->width * $this->height * $this->length)/1000000);
        return $volume;
    }

    public function allSalesAmount(int $id, float $productCount)
    {
        if (empty($id) || empty($productCount))
            return false;

        $this->salesAmount += $this->getPrice($productCount);
        return $this->salesAmount;
    }
}
?>
