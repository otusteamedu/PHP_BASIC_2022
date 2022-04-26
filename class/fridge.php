<?php
/**
 * @Fridge класс параметры Холодильников
 *
 * @var string $defrostType Тип разморозки
 * @var string $color Цвет корпуса
 * @var string $shelvesCount Количество полок
 *
 */

require_once 'product.php';

class Fridge extends Product {

    public $defrostType;
    public $color;
    public $shelvesCount;

    public function __construct(string $name, string $producingCountry, string $manufacturer,
                                int $weight, int $width, int $height, int $length, int $price,
                                string $defrostType, string $color, int $shelvesCount)
    {
        parent::__construct($name, $producingCountry, $manufacturer, $weight, $width, $height, $length, $price);
        $this->defrostType = $defrostType;
        $this->color = $color;
        $this->shelvesCount = $shelvesCount;
    }

    public function setDefrostType(string $defrostType){
        $this->defrostType = $defrostType;
    }

    public function getDefrostType(){
        return $this->defrostType;
    }

    public function setColor(string $color){
        $this->color = $color;
    }

    public function getColor(){
        return $this->color;
    }

    public function setShelvesCount(int $shelvesCount){
        $this->shelvesCount = $shelvesCount;
    }

    public function getShelvesCount(){
        return $this->shelvesCount;
    }
}
?>
