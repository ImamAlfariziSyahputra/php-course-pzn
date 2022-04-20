<?php

class Category
{
  private string $name;
  private bool $isExpensive;

  public function getName(): string
  {
    return $this->name;
  }

  public function setName(string $name): void
  {
    //! Validation
    //! Jika data yang sudah ada ditimpa data kosong, jangan timpa!
    if (trim($name) != '') {
      $this->name = $name;
    }
  }

  public function isExpensive(): bool
  {
    return $this->isExpensive;
  }

  public function setIsExpensive(bool $isExpensive): void
  {
    $this->isExpensive = $isExpensive;
  }
}
