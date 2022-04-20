<?php

require_once __DIR__ . '/data/Product.php';

use \Data\{Product, ProductDummy};

$product = new Product('Aqua', 3000);
// var_dump($product);

echo "Name: {$product->getName()}" . PHP_EOL;
echo "Price: {$product->getPrice()}" . PHP_EOL;

echo "========================" . PHP_EOL;

$productDummy = new ProductDummy('Chitato', 10000);

echo $productDummy->info();
