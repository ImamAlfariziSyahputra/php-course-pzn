<?php

namespace Data\Traits;

trait SayGoodbye
{
  public function goodBye(?string $name): void
  {
    if (is_null($name)) {
      echo 'Good bye~~' . PHP_EOL;
    } else {
      echo "Good bye $name" . PHP_EOL;
    }
  }
}

trait SayHello
{
  public function hello(?string $name): void
  {
    if (is_null($name)) {
      echo 'Hello~~' . PHP_EOL;
    } else {
      echo "Hello $name" . PHP_EOL;
    }
  }
}

trait HasName
{
  public string $name;
}

trait CanRun
{
  //! Trait Abstract Function
  public abstract function run(): void;
}

class ParentPerson
{
  public function hello(?string $name): void
  {
    echo "Hello in Person Class" . PHP_EOL;
  }

  public function goodBye(?string $name): void
  {
    echo "Good bye in Person Class" . PHP_EOL;
  }
}

//! Inherit ALL Traits
trait All
{
  use SayGoodbye, SayHello, HasName, CanRun {
    //! Trait Visibility Override Example
    //* hello as private;
    //* goodBye as private;
  }
}

class Person
{
  use All;

  //! Wajib Override Abstract Function
  public function run(): void
  {
    echo "Person: {$this->name} is running..." . PHP_EOL;
  }
}
