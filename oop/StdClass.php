<?php

$arr = [
  'firstName' => 'Imam',
  'lastName' => 'Alfarizi',
  'Age' => 19,
];

var_dump($arr);

$object = (object) $arr;

var_dump($object);

echo "My first name is: $object->firstName" . PHP_EOL;
