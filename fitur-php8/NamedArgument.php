<?php

function sayHello(string $first = 'Pertama', string $middle = 'Tengah', string $last = 'last'): void
{
  echo "Hello $first $middle $last!" . PHP_EOL;
}

sayHello(first: 'Alfarizi');
