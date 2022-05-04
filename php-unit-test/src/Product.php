<?php

namespace Mamlzy\Test;

class Product
{
  private string $id, $name, $desc;
  private int $price, $quantity;

  public function getId(): string
  {
    return $this->id;
  }

  public function setId(string $id): void
  {
    $this->id = $id;
  }

  public function getName(): string
  {
    return $this->name;
  }

  public function setName(string $name): void
  {
    $this->name = $name;
  }

  public function getDesc(): string
  {
    return $this->desc;
  }

  public function setDesc(string $desc): void
  {
    $this->desc = $desc;
  }

  public function getPrice(): int
  {
    return $this->price;
  }

  public function setPrice(int $price): void
  {
    $this->price = $price;
  }

  public function getQuantity(): int
  {
    return $this->quantity;
  }

  public function setQuantity(int $quantity): void
  {
    $this->quantity = $quantity;
  }
}
