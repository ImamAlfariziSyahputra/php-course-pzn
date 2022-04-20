<?php

class Manager
{
  var string $name;
  var string $title;

  public function __construct(string $name = '', string $title = 'Manager')
  {
    $this->name = $name;
    $this->title = $title;
  }

  function sayHello(string $name): void
  {
    echo "Hello {$name}, I'm the {$this->title}, my name is: {$this->name}" . PHP_EOL;
  }
}

class VicePresident extends Manager
{
  //! Construct Overriding
  public function __construct(string $name = '')
  {
    parent::__construct($name, 'Vice President');
  }

  //! Overriding
  function sayHello(string $name): void
  {
    echo "Hello {$name}, I'm the {$this->title}, my name is: {$this->name}" . PHP_EOL;
  }
}
