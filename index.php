<?php 
    abstract class Product {

        protected static $cost = 30;
    
        abstract public function getFinalCost();
    }
    
    class DigitalProduct extends Product {
    
        public function getFinalCost() {
            return self::$cost/2;
        }
    
    }
    
    class PeiceProduct extends Product {
    
        public function getFinalCost() {
            return self::$cost;
        }
    
    }
    
    class WeightProduct extends Product {
        private $qty;
    
        public function __construct() {
            $this->qty = 0;
        }
    
        public function setQty($qty) {
            $this->qty = $qty;
        }
    
        public function getQty($qty) {
            $this->qty = $qty;
        }
    
        public function getFinalCost() {
            return $this->qty * self::$cost;
        }
    }
    
    $prod1 = new DigitalProduct();
    $prod2 = new PeiceProduct();
    $prod3 = new WeightProduct();
    
    $prod3->setQty(3);
    
    echo "Стоимость цифрового товара {$prod1->getFinalCost()} <br/>";
    echo "Стоимость штучного товара {$prod2->getFinalCost()} <br/>";
    echo "Стоимость весового товара {$prod3->getFinalCost()} <br/>"; 
?>