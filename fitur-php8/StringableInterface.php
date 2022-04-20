<?php

function sayHello(Stringable $stringable): void
{
  echo "Hello {$stringable->__toString()}" . PHP_EOL;
}

class Person
{
  //! di PHP 8, gak perlu "implements Stringable" ketika override "__toString()"
  public function __toString(): string
  {
    return "Person";
  }
}

sayHello(new Person());
