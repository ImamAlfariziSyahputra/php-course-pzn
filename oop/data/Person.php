<?php
class Person
{
  const AUTHOR = 'Lazy Pizy';

  var string $name;
  var ?string $address = null;
  var string $country = 'Indonesia';

  function __construct(string $name, ?string $address)
  {
    $this->name = $name;
    $this->address = $address;
  }

  function sayHello(string $name = 'unknown')
  {
    echo "Hello $name, my name is $this->name";
  }

  function greetAuthor()
  {
    echo "Hello I'm the Author my name is \"" . self::AUTHOR . "\"";
  }

  function __destruct()
  {
    echo "Object Person: {$this->name} is detroyed" . PHP_EOL;
  }
};
