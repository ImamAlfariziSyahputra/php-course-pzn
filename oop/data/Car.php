<?php

namespace Data;

interface HasBrand
{
  function getBrand(): string;
}

interface isMaintenance
{
  function isMaintenance(): bool;
}

interface Car extends HasBrand, isMaintenance
{
  function drive(): void;
  function getTire(): int;
}

class Avanza implements Car
{
  function getBrand(): string
  {
    return 'Avanza';
  }

  function isMaintenance(): bool
  {
    return false;
  }

  function drive(): void
  {
    echo "Driving an Avanza..." . PHP_EOL;
  }

  function getTire(): int
  {
    return 4;
  }
}
