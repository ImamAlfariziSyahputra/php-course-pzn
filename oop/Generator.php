<?php

function getGenap(int $max): Iterator
{
  $arr = [];

  for ($i = 1; $i <= $max; $i++) {
    if ($i % 2 == 0) {
      $arr[] = $i;
    }
  }

  return new ArrayIterator($arr);
}

function getGanjil(int $max): Iterator
{

  for ($i = 1; $i <= $max; $i++) {
    if ($i % 2 == 1) {
      yield $i;
    }
  }
}

foreach (getGanjil(100) as $value) {
  echo "ganjil: $value" . PHP_EOL;
}
