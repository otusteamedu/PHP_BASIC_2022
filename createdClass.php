<?php
abstract class  product {
   public string $manufacturer; // название компании
   public string $name; // название продукта
   public string $price; // цена продукта
   public string $category; // категория товара
   abstract public function promo(); //метод для продвижения товара в разных акциях
   
   public function __construct($manufacturer,$name,$price,$category) {
      $this->manufacturer = $manufacturer;
      $this->name = $name;
      $this->price = $price;
      $this->category = $category;
   }
}


class foreignSeller extends product {
   public string $storeName; //название другого магазина у которого буду покупать для перепродажи
   public string $deliveryTime; //срок поставки
   public string $currency; // валюта
   public function __construct($manufacturer,$name,$price,$category,$storeName,$deliveryTime,$currency) {
      $this->manufacturer = $manufacturer;
      $this->name = $name;
      $this->price = $price;
      $this->category = $category;
      $this->storeName = $storeName;
      $this->deliveryTime = $deliveryTime;
      $this->currency = $currency;
      parent::__construct($manufacturer,$name,$price,$category,$storeName,$deliveryTime,$currency);
   }
   
   public function promo() {
   return "11 ноября распрадажи на Aliexpress и у нас на {$this->category}!";
   }
}

class ourProduce extends product {
   public string $quantityPerDay; //название другого магазина у которого буду покупать для перепродажи
   public string $import; //разрешен ли импорт
   public function __construct($manufacturer,$name,$price,$category,$quantityPerDay,$import) {
      $this->manufacturer = $manufacturer;
      $this->name = $name;
      $this->price = $price;
      $this->category = $category;
      $this->quantityPerDay = $quantityPerDay;
      $this->import = $import;
      parent::__construct($manufacturer,$name,$price,$category,$quantityPerDay,$import);
   }
   public function promo() {
   return "4 сентября День Трудовика! {$this->category} со скидкой!";
   }
}

$products1 = new foreignSeller ('DEEPCOOL ','RGB 350','1600','RGB подстветка для корпуса','Aliexpress','3 дня','евро'); 
$products2 = new ourProduce ('Рога и Копыта','Табурет','3000','Мебель','5','Нет, древесина запрещена на импорт');


var_dump($products1);
var_dump($products2);
var_dump($products1->promo());
var_dump($products2->promo());





Result for 8.1.5:
Execution time: 0.000534s Mem: 397KB Max: 441KB
object(foreignSeller)#1 (7) {
  ["manufacturer"]=>
  string(9) "DEEPCOOL "
  ["name"]=>
  string(7) "RGB 350"
  ["price"]=>
  string(4) "1600"
  ["category"]=>
  string(46) "RGB подстветка для корпуса"
  ["storeName"]=>
  string(10) "Aliexpress"
  ["deliveryTime"]=>
  string(8) "3 дня"
  ["currency"]=>
  string(8) "евро"
}
object(ourProduce)#2 (6) {
  ["manufacturer"]=>
  string(24) "Рога и Копыта"
  ["name"]=>
  string(14) "Табурет"
  ["price"]=>
  string(4) "3000"
  ["category"]=>
  string(12) "Мебель"
  ["quantityPerDay"]=>
  string(1) "5"
  ["import"]=>
  string(63) "Нет, древесина запрещена на импорт"
}
string(118) "11 ноября распрадажи на Aliexpress и у нас на RGB подстветка для корпуса!"
string(81) "4 сентября День Трудовика! Мебель со скидкой!"

