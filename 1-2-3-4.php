<?php
// 1.Придумать класс, который описывает любую сущность из предметной области интернет-магазинов:
// продукт, ценник, посылка и т.п.

class Shoes
{
    // 2.Описать свойства класса из п.1 (состояние)

    protected string $name;
    protected string $type;
    protected string $gender;
    protected string $color;
    protected string $season;
    protected int $size;
    protected int $price;

    // 3.Описать поведение класса из п.1 (методы)

    function __construct(string $name, string $color, string $season, int $size, int $price)
    {
        $this->name = $name;
        $this->color = $color;
        $this->season = $season;
        $this->size = $size;
        $this->price = $price;
    }
    function getDescription(): array
    {
        return [$this->name, $this->type, $this->gender, $this->color, $this->season, $this->size, $this->price];
    }
}

// 4.Придумать наследников класса из п.1. Чем они будут отличаться?
// Дочерние классы будут отличаться свойствами

class WomenShoes extends Shoes
{
    protected string $type = "women's Shoes";
    protected string $gender = 'female';
};
class MenShoes extends Shoes
{
    protected string $type = "men's Shoes";
    protected string $gender = 'male';
}
