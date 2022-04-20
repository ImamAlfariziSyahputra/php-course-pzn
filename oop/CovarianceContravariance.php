<?php

require_once __DIR__ . '/data/Food.php';
require_once __DIR__ . '/data/Animal.php';
require_once __DIR__ . '/data/AnimalShelter.php';

use \Data\{Food, AnimalFood, CatShelter, DogShelter};

$catShelter = new CatShelter();
$cat = $catShelter->adopt('Anggora');
$cat->eat(new AnimalFood);
// var_dump($cat);

$dogShelter = new DogShelter();
$dog = $dogShelter->adopt('Pitbull');
$dog->eat(new Food);
// var_dump($dog);
