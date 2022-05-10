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
 *
 * @function getVolume Возвращает объем товара который будет необходим для расчета при транспортировке
 * @function productSale Уменьшает количество товара на остатке при продаже
 * @function productReceipt Увеличивает количество товара на остатке при поступлении
 * @function getPrice возвращает цену товара
 */
class Product {

    private $id;
    public $name;
    private $price;
    public $productInStock;
    public $vendorCode;

    public function __construct(int $id, string $name, int $price, int $productInStock, int $vendorCode)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->productInStock = $productInStock;
        $this->vendorCode = $vendorCode;
    }

    public function getVolume($productCount){
        if ($productCount < 1)
            return false;
        $volume = ($productCount * ($this->width * $this->height * $this->length)/1000000);
        return $volume;
    }

    public function getPrice(){
        return $this->price * 1.20;
    }

    public function productSale($id, $count){
        if ($id < 1)
            return false;
        if ($count > $this->productInStock)
            return false;

        $this->productInStock -= $count;
    }

    public function productReceipt($id, $count){
        if ($id < 1)
            return false;
        if ($count < 1)
            return false;

        $this->productInStock += $count;
    }
}
?>