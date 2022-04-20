<?php

function sayHello(string $first, string $last)
{
}

function sum(int ...$numbers)
{
  $total = 0;

  foreach ($numbers as $number) {
    $total += $number;
  }

  return $total;
}

sayHello(
  'Ahok',
  'Jarot', //! 'Jarot', <= Example of "Comma Argument"
);

echo sum(
  5,
  5,
  5,
  5,
  5, //! 5, <= Example of "Comma Argument"
) . PHP_EOL;


$array = [
  'first' => 'Imam',
  'middle' => 'Alfarizi',
  'last' => 'Syahputra', //! 'last' => 'Syahputra', <= Example of "Comma Argument"
];
