<?php
/**
 * @Product класс описывает базовые параметры товара
 *
 * @var string $name Наименование модели
 * @var string $producingCountry Страна изготовитель
 * @var string $manufacturer Производитель
 * @var string $weight Вес
 * @var string $width Ширина
 * @var string $height Высота
 * @var string $length Длина
 * @var string $price Стоимость
 *
 * @function getVolume Возвращает объем товара который будет необходим для расчета при транспортировке
 */
class Product {

    public $name;
    public $producingCountry;
    public $manufacturer;
    public $weight;
    public $width;
    public $height;
    public $length;
    public $price;

    public function __construct(string $name, string $producingCountry, string $manufacturer,
                                int $weight, int $width, int $height, int $length, int $price)
    {
        $this->name = $name;
        $this->producingCountry = $producingCountry;
        $this->manufacturer = $manufacturer;
        $this->weight = $weight;
        $this->width = $width;
        $this->height = $height;
        $this->length = $length;
        $this->price = $price;
    }

    public function getVolume(){
        $volume = ($this->width * $this->height * $this->length)/1000000;
        return $volume;
    }

    public function setName(string $name){
        $this->name = $name;
    }

    public function getName(){
        return $this->name;
    }

    public function setProducingCountry(string $producingCountry){
        $this->name = $producingCountry;
    }

    public function getProducingCountry(){
        return $this->producingCountry;
    }

    public function setManufacturer(string $manufacturer){
        $this->manufacturer = $manufacturer;
    }

    public function getManufacturer(){
        return $this->manufacturer;
    }

    public function setWeight(int $weight){
        $this->weight = $weight;
    }

    public function getWeight(){
        return $this->weight;
    }

    public function setWidth(int $width){
        $this->width = $width;
    }

    public function getWidth(){
        return $this->width;
    }

    public function setHeight(int $height){
        $this->height = $height;
    }

    public function getHeight(){
        return $this->height;
    }

    public function setLength(int $length){
        $this->length = $length;
    }

    public function getLength(){
        return $this->length;
    }

    public function setPrice(int $price){
        $this->price = $price;
    }

    public function getPrice(){
        return $this->price;
    }
}
?>