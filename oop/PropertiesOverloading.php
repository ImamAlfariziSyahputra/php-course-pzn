<?php

class Zero
{
  private array $properties = [];

  public function __get($name)
  {
    return $this->properties[$name];
  }

  public function __set($name, $value)
  {
    $this->properties[$name] = $value;
  }

  public function __isset($name): bool
  {
    return isset($this->properties[$name]);
  }

  public function __unset($name)
  {
    unset($this->properties[$name]);
  }

  public function __call($name, $arguments)
  {
    // var_dump($arguments);
    $join = join(',', $arguments);

    echo "Call function $name, with arguments: $join" . PHP_EOL;
  }

  public static function __callStatic($name, $arguments)
  {
    $join = join(',', $arguments);

    echo "Call static function $name, with arguments: $join" . PHP_EOL;
  }
}

$zero = new Zero();

//! Properties "Overloading" Example
$zero->firstName = 'Ahok'; //! execute "__set" function
$zero->lastName = 'Jarot'; //! execute "__set" function

echo "First Name: $zero->firstName" . PHP_EOL; //! execute "__get" function
echo "Latt Name: $zero->lastName" . PHP_EOL; //! execute "__get" function

$zero->sayHello('Ahok', 'Jarot');
Zero::sayHello('Matt', 'Murdock');
