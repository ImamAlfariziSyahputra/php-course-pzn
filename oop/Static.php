<?php

require_once __DIR__ . '/helper/MathHelper.php';

use \Helper\{MathHelper};

// MathHelper::$name = 'Ahok';

echo MathHelper::$name . PHP_EOL;

echo MathHelper::sum(1, 2, 3, 4, 5);
