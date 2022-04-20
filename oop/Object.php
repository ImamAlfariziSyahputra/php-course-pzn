<?php
require_once __DIR__ . '/data/Person.php';

$tony = new Person('Tony', null);

$tony->name = 'Tony';
// $tony->address = 'Manhattan';
// $tony->country = 'New York';

var_dump($tony);

//! Properties / Fields / Variables
echo "Name : $tony->name" . PHP_EOL;
echo "Address : $tony->address" . PHP_EOL;
echo "Country : $tony->country" . PHP_EOL;
echo "===========================" . PHP_EOL;

//! Method
echo $tony->sayHello('Stark') . PHP_EOL;

//! Constant
echo "Author : " . Person::AUTHOR . PHP_EOL;

//! Method access Constant Property with "self"
echo $tony->greetAuthor() . PHP_EOL;

echo "=== Program Selesai ===" . PHP_EOL;
