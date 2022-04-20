<?php
require_once __DIR__ . '/../Helper/Input.php';

$name = input('Name');
echo "Hello $name" . PHP_EOL;

$age = input('Age');
echo "$age years old" . PHP_EOL;
