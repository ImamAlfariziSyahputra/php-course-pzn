<?php

require_once __DIR__ . '/data/Student.php';

$student1 = new Student();

$student1->id = 1;
$student1->name = 'Ahok';
$student1->value = 100;

echo $student1;

//! Object cannot be converted to string, if there is no "__toString" function
// $string = (string) $student1;

// echo $string . PHP_EOL;
