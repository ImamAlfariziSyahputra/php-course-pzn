<?php

require_once __DIR__ . '/vendor/autoload.php';

use ProgrammerZamanNow\Data\People;

$people = new People('Ahok');

echo $people->sayHello('Tony') . PHP_EOL;
