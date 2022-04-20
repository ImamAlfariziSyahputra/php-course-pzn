<?php

//! Old Way (Bad)
function sayHello(?string $name)
{
  if ($name == null) {
    throw new Exception('Tidak Boleh Null!');
  }

  echo "Hello $name" . PHP_EOL;
}

//! New Way (Better)
function sayHelloExpression(?string $name)
{

  $result = $name != null ? "Hello $name" : throw new Exception('Tidak Boleh Null!');

  echo $result . PHP_EOL;
}

// sayHello('Ahok');
sayHello(null);
