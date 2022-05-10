<?php

class Category
{
  public function __construct(public readonly string $id, public readonly string $name)
  {
  }
}

$category = new Category(1, 'gadget');
echo $category->name;
