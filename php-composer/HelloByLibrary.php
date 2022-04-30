<?php

require __DIR__ . '/vendor/autoload.php';

use ProgrammerZamanNow\Belajar\Customer;

$customer = new Customer('Ahok');

echo $customer->sayHello('Tony') . PHP_EOL;
echo $customer->sayHello() . PHP_EOL;
