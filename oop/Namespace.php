<?php

require_once __DIR__ . '/data/Conflict.php';
require_once __DIR__ . '/data/Helper.php';

//! namespace "use" keyword
//! "use group" pake kurung kurawal "{}"
use \Data\One\{Conflict as Conflict1, Sample, Dummy};
use \Data\Two\Conflict as Conflict2;
use const \Helper\APPLICATION;
use function \Helper\helpMe;

//! Access Class with "namespace"
$conflict1 = new Conflict1();
$dummy = new Dummy();
$conflict2 = new Conflict2();

var_dump($conflict1, $dummy, $conflict2);

//! "namespace's" function & constant
echo APPLICATION . PHP_EOL;
echo helpMe() . PHP_EOL;
