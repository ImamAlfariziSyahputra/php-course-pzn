<?php

require __DIR__ . '/Category.php';
require __DIR__ . '/Customer.php';

class Product
{
  public function __construct(
    public string $name,
    public Category $category = new Category('1', 'Gadget'),
  ) {
  }
}

function sayHelloNew(Customer $customer = new Customer('1', 'Unkown', Gender::Male))
{
}

var_dump(new Product('iPhone'));
var_dump(new Product('Erigo', new Category('2', 'Clothes')));

sayHelloNew();
