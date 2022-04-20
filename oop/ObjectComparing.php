<?php

require_once __DIR__ . '/data/Student.php';

$student1 = new Student();
$student1->id = 1;
$student1->name = 'Ahok';
$student1->value = 100;

$student2 = new Student();
$student2->id = 1;
$student2->name = 'Ahok';
$student2->value = 100;

var_dump($student1 === $student2);
