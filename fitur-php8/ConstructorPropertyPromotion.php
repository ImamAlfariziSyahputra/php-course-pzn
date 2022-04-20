<?php

class Product
{

  public function __construct(
    public string $id,
    public string $name,
    public int $price = 0,
    public int $quantity = 0,
    private bool $isExpensive = false
  ) {
  }
}

$product = new Product(id: '1', name: 'Chitato', quantity: 5);

var_dump($product);
