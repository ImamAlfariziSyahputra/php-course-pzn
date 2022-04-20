<?php

namespace Data;

class Product
{
  protected string $name;
  protected int $price;

  public function __construct(string $name, int $price)
  {
    $this->name = $name;
    $this->price = $price;
  }

  public function getName(): string
  {
    return $this->name;
  }

  public function getPrice(): int
  {
    return $this->price;
  }
}

class ProductDummy extends Product
{
  public function info()
  {
    echo "Info Product => Name: {$this->name}, Price: {$this->price}" . PHP_EOL;
  }
}
