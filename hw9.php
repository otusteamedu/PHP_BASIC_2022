<?php

class Product {
	public string $name;
	public string $group;
	public int $price;
	public int $count;
	
	public function __construct (string $name, string $group, int $price, int $count)
	{
		$this->name = $name;
		$this->group = $group;
		$this->price = $price;
		$this->count = $count;
	}

	public function setCount(int $count)
	{
		$this->count = $count;
	}

	public function getCount()
	{
		return $this->count;
	}

	public function getPrice()
	{
		return $this->price;
	}
}

class Drink extends Product{
	public float $vol;
	public function __construct (string $name, string $group, int $price, int $count, float $vol)
	{
		$this->name = $name;
		$this->group = $group;
		$this->price = $price;
		$this->count = $count;
		$this->vol = $vol;
	}
}

class Lamp extends Product{
	public float $base;
	public function __construct (string $name, string $group, int $price, int $count, int $base)
	{
		$this->name = $name;
		$this->group = $group;
		$this->price = $price;
		$this->count = $count;
		$this->base = $base;
	}

	public function getPrice()
	{
		return $this->price * $this->base;
	}
}

$lamp = new Lamp('Lamp', 'Electric', 10, 20, 6);

$beer = new Drink('Beer', 'Alcohol', 30, 60, 0.5);

//Что он выведет на каждом шаге? Почему?
//Немного изменим п.5
class A {
	public function foo() {
		static $x = 0;
		echo ++$x;
	}
}
class B extends A {
}
$a1 = new A();
$b1 = new B();
echo $a1->foo();
echo $b1->foo();
echo $a1->foo();
echo $b1->foo();

?>