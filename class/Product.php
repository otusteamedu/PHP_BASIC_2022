<?php
/**
 * @Product класс описывает базовые параметры товара
 *
 * @var int $id uid продукта
 * @var string $name Наименование модели

 * @var string $weight Вес
 * @var string $width Ширина
 * @var string $height Высота
 * @var string $length Длина
 * @var string $price Стоимость
 * @var string $salesAmount Доход от продаж
 *
 * @function getVolume Возвращает объем товара который будет необходим для расчета при транспортировке
 * @function productSale Уменьшает количество товара на остатке при продаже
 * @function productReceipt Увеличивает количество товара на остатке при поступлении
 * @function getPrice возвращает цену товара
 */
abstract class Product {

    private $id;
    public $name;
    private $price;
    public $salesAmount;
    public $productInStock;
    public $vendorCode;

    public function __construct(int $id, string $name, float $price, float $salesAmount, float $productInStock, int $vendorCode)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->salesAmount = $salesAmount;
        $this->productInStock = $productInStock;
        $this->vendorCode = $vendorCode;
    }

    public function getPrice(float $count){
        if (empty($count))
            return false;
        return ($this->price * $count)*1.2;
    }

    public function productSale(int $id, float $count){
        if ($id < 1)
            return false;
        if ($count > $this->productInStock)
            return false;

        $this->productInStock -= $count;
    }

    public function productReceipt(int $id, float $count){
        if ($id < 1)
            return false;
        if ($count < 1)
            return false;

        $this->productInStock += $count;
    }
}
?>