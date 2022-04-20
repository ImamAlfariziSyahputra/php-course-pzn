<?php

require_once __DIR__ . '/data/Animal.php';

use \Data\{Animal, Cat, Dog};

$anggora = new Cat();
$anggora->name = 'Anggora';
$anggora->run();

$pitbull = new Dog();
$pitbull->name = 'Pitbull';
$pitbull->run();


// var_dump($anggora);
// var_dump($pitbull);
