<?php
abstract class Product 
{
   protected string $name; // название продукта
   protected string $category; // категория товара
   protected string $count; // количество
   protected static string $price_modifier;
   public static $price = '1000'; // цена продукта

   abstract public function priceСalculation(); //метод расчета цены
 
}

trait IncomeFromSale {
   public function profitSales () 
   {
      $sale=parent::$price*$this->count;
      return $this->name.' '.$sale;
   }
}

class PhysicalProduct extends product 
{
   public string $material;


   public function __construct($name, $category, $material, $count) 
   {
      $this->name = $name;
      $this->category = $category;
      $this->material = $material;
      $this->count = $count;
      parent::$price_modifier = '1';
   }
   
   public function priceСalculation() 
   {
      $price=parent::$price*self::$price_modifier;
      return $this->name.' '.$price;
   }

   use IncomeFromSale;

}

class DigitalProduct extends product 
{
   public string $rarity_item;

   public function __construct($name, $category, $rarity_item, $count) 
   {
      $this->name = $name;
      $this->category = $category;
      $this->rarity_item = $rarity_item;
      $this->count = $count;
      parent::$price_modifier = '0.5';
   }
   
   public function priceСalculation() {
      $price=parent::$price*self::$price_modifier;
      return $this->name.' '.$price;
   }
   
   use IncomeFromSale;

}

class WeightProduct extends product 
{
   public string $measure; 

   public function __construct($name, $category, $measure, $count) 
   {
      $this->name = $name;
      $this->category = $category;
      $this->measure = $measure;
      $this->count = $count;
      parent::$price_modifier = '0.75';
   }
   
   public function priceСalculation() 
   {
      if ($this->measure < 10) {
         $price=parent::$price;
      } else {
         $price=parent::$price*self::$price_modifier;
      }
      return $this->name.' '.$price;
   }

   use IncomeFromSale;

}

$products1 = new PhysicalProduct ('Фростморн','Предметы из игр','сталь','12'); 
$products2 = new DigitalProduct ('Посох','Промокод на предмет в игре','Легендарный','1'); 
$products3 = new WeightProduct ('кубик','Lego детали','кг','10'); 

var_dump($products1);
var_dump($products2);
var_dump($products3);

var_dump($products1->priceСalculation());
var_dump($products2->priceСalculation());
var_dump($products3->priceСalculation());

var_dump($products1->profitSales());
var_dump($products2->profitSales());
var_dump($products3->profitSales());


//Результат выполнения

object(PhysicalProduct)#1 (4) {
   ["name":protected]=>
   string(18) "Фростморн"
   ["category":protected]=>
   string(28) "Предметы из игр"
   ["count":protected]=>
   string(2) "12"
   ["material"]=>
   string(10) "сталь"
 }
 object(DigitalProduct)#2 (4) {
   ["name":protected]=>
   string(10) "Посох"
   ["category":protected]=>
   string(48) "Промокод на предмет в игре"
   ["count":protected]=>
   string(1) "1"
   ["rarityItem"]=>
   string(22) "Легендарный"
 }
 object(WeightProduct)#3 (4) {
   ["name":protected]=>
   string(10) "кубик"
   ["category":protected]=>
   string(17) "Lego детали"
   ["count":protected]=>
   string(2) "10"
   ["measure"]=>
   string(4) "кг"
 }
 string(22) "Фростморн 750"
 string(14) "Посох 750"
 string(14) "кубик 750"
 string(24) "Фростморн 12000"