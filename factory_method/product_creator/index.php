<?php

interface Product {
    public function save();
    public function getId();
    public function getName();
}

class VariableProduct implements Product {
    private $id;
    private $name;

    public function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function save() {
        echo "Saving the product to database as variable product.\n";
    }
}

class SimpleProduct implements Product {
    private $id;
    private $name;

    public function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function save() {
        echo "Saving the product to database as simple product.\n";
    }
}

interface ProductCreator {
    public function createProduct();
}

class SimpleProductCreator implements ProductCreator {
    private $id;
    private $name;

    public function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
    }

    public function createProduct() {
        return new SimpleProduct($this->id, $this->name);
    }
}


class VariableProductCreator implements ProductCreator {
    private $id;
    private $name;

    public function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
    }

    public function createProduct() {
        return new VariableProduct($this->id, $this->name);
    }
}


class ProductFactory
{
    public static function create(ProductCreator $creator)
    {
        $product = $creator->createProduct();

        // Save product to Database.
        $product->save();

        return $product;
    }
}

$product = ProductFactory::create(new SimpleProductCreator(01, "Simple Product 1"));
echo $product->getName() . "\n";

$product = ProductFactory::create(new VariableProductCreator(02, "Variable Product 1"));
echo $product->getName();