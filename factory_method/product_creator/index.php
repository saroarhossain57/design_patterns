<?php

class SimpleProduct {
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

$product = ProductFactory::create(new SimpleProductCreator(01, "Simple Product"));