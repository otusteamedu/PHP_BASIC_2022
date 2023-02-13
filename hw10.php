<?php

abstract class Product {
	public string $name;
	public string $group;
	public int $price;
	public int $count;
	
	public function __construct(string $name, string $group, int $price)
	{
		$this->name = $name;
		$this->group = $group;
		$this->price = $price;
	}

	public function getCount()
	{
		return $this->count;
	}

	abstract public function getPrice();
}

class Digital extends Product{
	public function __construct(string $name, string $group, int $price, int $count)
	{
		parent::__construct($name, $group, $price);
		$this->count = $count;
	}
	
	public function getPrice()
	{
		return $this->count*$this->price/2;
	}
}

class ByWeight extends Product{
	public float $weight;
	public function __construct(string $name, string $group, int $price, float $weight)
	{
		parent::__construct($name, $group, $price);
		$this->weight = $weight;
	}

	public function getPrice()
	{
		return $this->price * $this->weight;
	}
}

class Single extends Product{
	public function __construct(string $name, string $group, int $price, int $count)
	{
		parent::__construct($name, $group, $price);
		$this->count = $count;
	}

	public function getPrice()
	{
		return $this->price * $this->count;
	}
}

$sublime = new Digital('Sublime', 'Soft', 10, 2,);

$pike = new ByWeight('Pike Perch', 'Fish', 10, 3);

$xbox = new Single('XBox', 'Сonsole', 10, 2);

echo $sublime->getPrice()."<br>";
echo $pike->getPrice()."<br>";
echo $xbox->getPrice()."<br>";

?>