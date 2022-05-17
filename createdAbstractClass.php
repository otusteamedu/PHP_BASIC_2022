<?php
abstract class Product 
{
   protected string $name; // название продукта
   protected string $category; // категория товара
   protected string $count; // количество
   protected static string $price_modifier ='1'; //модификатор цены
   protected static string $price = '1000'; // цена продукта

   public function priceСalculation() 
   {
      $price=self::$price*static::$price_modifier;
      return $this->name.' '.$price;
   }
   
   abstract public function returnProduct(); //операция возврата товара
}

trait IncomeFromSale {
   public function profitSales () 
   {
      $sale=self::$price*static::$price_modifier*$this->count;
      return "Если продать все ".''.$this->name.''.", а всего их шт. - ".' '.$this->count.''.", то получим: ".' '.$sale;
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
   }
   
   public function returnProduct()
   {
      if ($this->count < 1) {
         $shipping_cost='5000';
      } else {
         $shipping_cost='15000';
      }
      return "Вам необходимо оплатить пересылку. Стоимость:".' '.$shipping_cost;
   }

   use IncomeFromSale;

}

class DigitalProduct extends product 
{
   protected static string $price_modifier ='0.5';
   public string $rarity_item;

   public function __construct($name, $category, $rarity_item, $count) 
   {
      $this->name = $name;
      $this->category = $category;
      $this->rarity_item = $rarity_item;
      $this->count = $count;
   }
   
   use IncomeFromSale;

   public function returnProduct()
   {
      if ($this->rarity_item = 1) {
         return "Можно вернуть. Напишите нам на auction@bay.com";
      } else {
         return "Не редкие товары можете выставить на аукцион, вернуть не получится, он уже попользованный...";
      }
   }

}


class WeightProduct extends product 
{
   protected static string $price_modifier ='0.75';
   public string $measure; 
   
   public function __construct($name, $category, $measure, $count) 
   {
      $this->name = $name;
      $this->category = $category;
      $this->measure = $measure;
      $this->count = $count;
   }
   
   public function priceСalculation() 
   {
      if ($this->count < 10) {
         $price=parent::$price;
      } else {
         $price=parent::$price*self::$price_modifier;
      }
      return $this->name.' '.$price;
   }

   use IncomeFromSale;

   public function returnProduct()
   {
      return "Вернуть Lego? Серьезно? Играйте и будьте счастливы!";
   }

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

var_dump($products1->returnProduct());
var_dump($products2->returnProduct());
var_dump($products3->returnProduct());



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
   ["rarity_item"]=>
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
 string(23) "Фростморн 1000"
 string(14) "Посох 500"
 string(14) "кубик 750"
 string(110) "Если продать все Фростморн, а всего их шт. -  12, то получим:  12000"
 string(99) "Если продать все Посох, а всего их шт. -  1, то получим:  500"
 string(101) "Если продать все кубик, а всего их шт. -  10, то получим:  7500"
 string(90) "Вам необходимо оплатить пересылку. Стоимость: 15000"
 string(71) "Можно вернуть. Напишите нам на auction@bay.com"
 string(89) "Вернуть Lego? Серьезно? Играйте и будьте счастливы!"