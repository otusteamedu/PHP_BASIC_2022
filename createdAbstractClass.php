<?php
abstract class product {
   protected string $name; // название продукта
   protected string $category; // категория товара
   public static $price = '1000'; // цена продукта
   protected string $count; // количество

   abstract public function priceСalculation(); //метод расчета цены
 
}

trait incomeFromSale {
   public function salesProd () {
      $sale=parent::$price*$this->count;
      return $this->name.' '.$sale;
   }
}

class physicalProduct extends product {
   public string $material;
   private static string $priceModifier = '1';
   

   public function __construct($name,$category,$material,$count) {
      $this->name = $name;
      $this->category = $category;
      $this->material = $material;
      $this->count = $count;
   }
   
   public function priceСalculation() {
      $price=parent::$price*self::$priceModifier;
      return $this->name.' '.$price;
   }

   use incomeFromSale;

}

class digitalProduct extends product {
   public string $rarityItem;
   private static string $priceModifier = '0.5';

   public function __construct($name,$category,$rarityItem,$count) {
      $this->name = $name;
      $this->category = $category;
      $this->rarityItem = $rarityItem;
      $this->count = $count;
   }
   
   public function priceСalculation() {
      $price=parent::$price*self::$priceModifier;
      return $this->name.' '.$price;
   }
   
   use incomeFromSale;

}

class weightProduct extends product {
   public string $measure; 
   private static string $priceModifier = '0.75';


   public function __construct($name,$category,$measure,$count) {
      $this->name = $name;
      $this->category = $category;
      $this->measure = $measure;
      $this->count = $count;
   }
   
   public function priceСalculation() {
      if ($this->measure < 10) {
         $price=parent::$price;
      } else {
         $price=parent::$price*self::$priceModifier;
      }
      return $this->name.' '.$price;
   }

   use incomeFromSale;

}



$products1 = new physicalProduct ('Фростморн','Предметы из игр','сталь','12'); 
$products2 = new digitalProduct ('Посох','Промокод на предмет в игре','Легендарный','1'); 
$products3 = new weightProduct ('кубик','Lego детали','кг','10'); 

var_dump($products1);
var_dump($products2);
var_dump($products3);
var_dump($products1->priceСalculation());
var_dump($products2->priceСalculation());
var_dump($products3->priceСalculation());

var_dump($products1->salesProd());



//Результат выполнения кода

object(physicalProduct)#1 (4) {
   ["name":protected]=>
   string(18) "Фростморн"
   ["category":protected]=>
   string(28) "Предметы из игр"
   ["count":protected]=>
   string(2) "12"
   ["material"]=>
   string(10) "сталь"
 }
 object(digitalProduct)#2 (4) {
   ["name":protected]=>
   string(10) "Посох"
   ["category":protected]=>
   string(48) "Промокод на предмет в игре"
   ["count":protected]=>
   string(1) "1"
   ["rarityItem"]=>
   string(22) "Легендарный"
 }
 object(weightProduct)#3 (4) {
   ["name":protected]=>
   string(10) "кубик"
   ["category":protected]=>
   string(17) "Lego детали"
   ["count":protected]=>
   string(2) "10"
   ["measure"]=>
   string(4) "кг"
 }
 string(23) "Фростморн 1000"
 string(14) "Посох 500"
 string(14) "кубик 750"
 string(24) "Фростморн 12000"




