<?php

class Category
{

    private $name;
    private $description;

    public function __construct($name, $description)
    {
        $this->setName($name);
        $this->setDescription($description);
    }


    public function setName($name)
    {
        $this->name = $name;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getHtml()
    {

        return "Cat name: " . $this->getName() . "<br>"
            . "Cat description: " . $this->getDescription();
    }
}

class Product
{
    private $name;
    private $price;
    private $weight;
    private Category $category;

    public function __construct($name, $price, $weight, $category)
    {
        $this->setName($name);
        $this->setPrice($price);
        $this->setWeight($weight);
        $this->setCategory($category);
    }

    public function setName($name)
    {
        $this->name = $name;
    }
    public function getName()
    {
        return $this->name;
    }
    public function setPrice($price)
    {
        $this->price = $price;
    }
    public function getPrice()
    {
        return $this->price;
    }

    public function setWeight($weight)
    {
        $this->weight = $weight;
    }
    public function getWeight()
    {
        return $this->weight;
    }
    public function setCategory($category)
    {
        $this->category = $category;
    }
    public function getCategory()
    {
        return $this->category;
    }

    public function getHtml()
    {

        return "Product name: " . $this->getName() . "<br>"
            . "Product price: " . $this->getPrice() . "<br>"
            . "Product weight: " . $this->getWeight() . "<br>"
            . "Product category:<br>" . $this->getCategory()->getHtml();
    }
}

class Food extends Product {

    private $expDate;
    private $discount;

    public function __construct($name, $price, $weight, 
                                $category, $expDate) {

        parent :: __construct($name, $price, $weight, $category);
        $this -> setExpDate($expDate); 
        $this -> updateDiscount();
    }

    public function getExpDate() {

        return $this -> expDate;
    }
    public function setExpDate($expDate) {

        $this -> expDate = $expDate;
    }
    public function getDiscount() {

        return $this -> discount;
    }
    
    public function updateDiscount() {

        $nowTimeStamp = time();
        $expTimeStamp = strtotime($this -> getExpDate());

        $deltaTimeStamp = $expTimeStamp - $nowTimeStamp;
        $this -> discount = $deltaTimeStamp > 604800
                            ? 0
                            : 30;
    }

    public function getHtml() {

        return parent :: getHtml() . "<br>"
            . "Discount: " . $this -> getDiscount() . "%<br>"
            . "ExpDate: " . $this -> getExpDate();
    }
}


$category = new Category("prova1", "descrizione1");
$product = new Product("prod 1", 300, 23, $category);
$food = new Food("food 1", 100, 500, $category, "2023-02-02");
echo $category->getHtml();
echo "<br>" . "........." . "<br>";
echo $product->getHtml();
echo "<br>" . "........." . "<br>";
echo $food -> getHtml();
