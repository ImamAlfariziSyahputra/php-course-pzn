<?php

trait SimpleTrait
{
  public abstract function sampleFunction(string $name): string;
}

class SampleClass
{
  use SimpleTrait;

  public function sampleFunction(int $name): string //! Error
  {
    return 'string';
  }
}
