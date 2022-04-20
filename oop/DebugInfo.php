<?php

require_once __DIR__ . '/data/Student.php';

$student = new Student();

$student->id = 1;
$student->name = 'Ahok';
$student->value = 100;
$student->setSample('Sample');

var_dump($student);
