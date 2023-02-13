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
		parent::__construct($name, $group, $price, $count);
		$this->vol = $vol;
	}
}

class Lamp extends Product{
	public float $base;
	public function __construct (string $name, string $group, int $price, int $count, int $base)
	{
		parent::__construct($name, $group, $price, $count);
		$this->base = $base;
	}

	public function getPrice()
	{
		return $this->price * $this->base;
	}
}

$lamp = new Lamp('Lamp', 'Electric', 10, 20, 6);

$beer = new Drink('Beer', 'Alcohol', 30, 60, 0.5);

?>