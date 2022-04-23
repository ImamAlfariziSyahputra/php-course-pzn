<?php

require_once __DIR__ . '/Database.php';

use Config\Database;

$connection = Database::getConnection();

echo "DB Connection Success!" . PHP_EOL;

$connection = null;
