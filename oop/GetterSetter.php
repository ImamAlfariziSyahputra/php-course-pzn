<?php

require_once __DIR__ . '/data/Category.php';

$category = new Category();
$category->setName('Clothes');
$category->setIsExpensive(false);

$category->setName('');
echo "Name: {$category->getName()}" . PHP_EOL;

$isExpensive = $category->isExpensive() == 1 ? 'Expensive' : 'Cheap';
echo "Price: {$isExpensive}" . PHP_EOL;
