<?php

require_once __DIR__ . '/data/Student.php';

$student1 = new Student();

$student1->id = 1;
$student1->name = 'Ahok';
$student1->value = 100;

$student1(1, 'Ahok', true);
