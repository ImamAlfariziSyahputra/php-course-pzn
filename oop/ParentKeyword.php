<?php

require_once __DIR__ . '/data/Shape.php';

use \Data\{Shape, Rectangle};

$shape = new Shape();
echo $shape->getCorner() . PHP_EOL;

$rectangle = new Rectangle();
echo $rectangle->getParentCorner() . PHP_EOL;
