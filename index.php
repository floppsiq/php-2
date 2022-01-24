<?php 
    class Product {
        public $id;
        public $name;
        public $brand;
        public $category;
        public $price;
        public $count;

        public function __construct($id, $category, $name, $brand, $price, $count)
        {
            $this->id = $id;
            $this->category = $category;
            $this->name = $name;
            $this->brand = $brand;
            $this->price = $price;
            $this->count = $count;
        }

        public function getProduct()
        {
            echo "<hr><h2>Карточка товара</h2>
            <b>Категория:</b> $this->category<br>
            <b>Наименование:</b> $this->name<br>
            <b>Бренд:</b> $this->brand<br>
            <b>Цена:</b> $this->price руб.<br>
            <b>Количество на складе:</b> $this->count шт.<br>";
        }

        public function getPrice() {
            return $this->price;
        }

        public function setPrice(int $newPrice) {
            $this->price = $newPrice;
        }
    }

    class promoProduct extends Product {

        public $discount;
        public $sale;

        public function __construct($id, $category, $name, $brand, $price, $count, $discount, $sale)
        {
            parent::__construct($id, $category, $name, $brand, $price, $count);
            $this->discount = $discount;
            $this->sale = $sale;
        }

        public function getProduct()
        {
            parent::getProduct();
            echo "<b>Скидка:</b> $this->discount%<br>
            <b>Акция:</b> $this->sale<br>";
        }

        public function getSale() {
            return ($this->price) - ($this->price*$this->discount/100);
        }
    }

    $good1 = new Product(1, "ЦП", "Intel Core i3-7100T", "INTEL", 13000, 7);
    $good1->getProduct();
    echo "Стоимость товара " . $good1->getPrice(). " руб";
    $good1->setPrice(14000);
    echo "<br>Новая стоимость товара " . $good1->getPrice(). " руб";
    $good2 = new promoProduct(1, "ЦП", "Intel Core i5-9400F", "INTEL", 18087, 10, 25, "Черная пятница");
    $good2->getProduct();
    echo "Стоимость товара " . $good2->getPrice(). " руб<br>Со скидкой: " . $good2->getSale();
?>