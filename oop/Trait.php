<?php

require_once __DIR__ . '/data/SayGoodbye.php';

use Data\Traits\{Person, SayHello, SayGoodbye, HasName};

$tony = new Person();

$tony->name = 'Tony';
echo "My name is {$tony->name}," . PHP_EOL;

$tony->hello('Stark');
$tony->goodBye('Evans');
$tony->run();
