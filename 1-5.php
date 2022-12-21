<?php

class Product
{
    public string $name;
    public int $price;
    public int $quantity;

    public function __construct($name, $price, $quantity)
    {
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
    }

    public function aboutMe()
    {
        echo $this->prepareContent();
    }
    public function prepareContent()
    {
        return "<p>Наименование: {$this->name}</p>
                <p>Цена: {$this->price} рублей </p>
                <p>Количество: {$this->quantity}</p>";
    }
}

class Computer extends Product
{
    public string $processor;
    public int $memory;
    public string $graphic;

    public function __construct($name, $price, $quantity, $processor, $memory, $graphic)
    {
        parent::__construct($name, $price, $quantity);
        $this->processor = $processor;
        $this->memory = $memory;
        $this->graphic = $graphic;
    }

    public function aboutMe()
    {
        parent::aboutMe();
        echo "<p>Процессор: {$this->processor}</p>
        <p>Память: {$this->memory} GB</p>
        <p>Видеокарта: {$this->graphic}</p>";
    }
}

$computer = new Computer("Компьютер", 50000, 5, "Intel", 8, "NVIDIA");
var_dump($computer);
exit;

// 5 задание

class A
{
    public function foo()
    {
        static $x = 0;
        echo ++$x;
    }
}
$a1 = new A();
$a2 = new A();
$a1->foo(); // 1
$a2->foo(); // 2
$a1->foo(); // 3
$a2->foo(); // 4


class A
{
    public function foo()
    {
        static $x = 0;
        echo ++$x;
    }
}

class B extends A
{
}
$a1 = new A();
$b1 = new B();
$a1->foo(); // 1
$b1->foo(); // 1
$a1->foo(); // 2
$b1->foo(); // 2
