<?php

interface HasBrand
{
  function getBrand(): string;
}

interface HasName
{
  function getName(): string;
}

class Car implements HasBrand, HasName
{
  public function __construct(private string $brand, private string $name)
  {
  }

  public function getBrand(): string
  {
    return $this->brand;
  }

  public function getName(): string
  {
    return $this->name;
  }
}

//! IntersectionTypes Example
function printBrandName(HasBrand & HasName $value)
{
  echo $value->getBrand() . " - " . $value->getName() . PHP_EOL;
}

printBrandName(new Car('Toyota', 'Avanza'));
printBrandName(new Car('Honda', 'Mobilio'));
