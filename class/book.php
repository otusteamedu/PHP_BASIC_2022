<?php
/**
 * @Book класс параметры Книг
 *
 * @var string $bookType Тип книг
 * @var string $author Автор
 * @var string $numberOfPage Количество страниц
 * @var string $publishingHouse Издательский дом
 * @var string $yearOfPublishing Год издания
 * @var string $editionNumber Номер издания
 *
 */

require_once 'product.php';

class Book extends Product {

    public $bookType;
    public $author;
    public $numberOfPage;
    public $publishingHouse;
    public $yearOfPublishing;
    public $editionNumber;

    public function __construct(int $id, string $name, int $price, string $bookType, string $author,
                                int $numberOfPage, string $publishingHouse, int $yearOfPublishing,
                                int $editionNumber, int $productInStock, int $vendorCode)
    {
        parent::__construct($id, $name, $price, $productInStock, $vendorCode);
        $this->bookType = $bookType;
        $this->author = $author;
        $this->numberOfPage = $numberOfPage;
        $this->publishingHouse = $publishingHouse;
        $this->yearOfPublishing = $yearOfPublishing;
        $this->editionNumber = $editionNumber;
    }
}
?>