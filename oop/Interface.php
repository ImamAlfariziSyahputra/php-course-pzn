<?php

require_once __DIR__ . '/data/Car.php';

use \Data\{Car, Avanza, isMaintenance};

$avanza = new Avanza();

$isMaintenance = $avanza->isMaintenance() ? 'true' : 'false';

echo "Brand Name: {$avanza->getBrand()}" . PHP_EOL;
echo "Tire Count: {$avanza->getTire()}" . PHP_EOL;
echo "Is Maintenance: {$isMaintenance}" . PHP_EOL;
$avanza->drive();
