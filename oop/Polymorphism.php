<?php

require_once __DIR__ . '/data/Programmer.php';

$company = new Company();
$company->programmer = new Programmer('Tony');
var_dump($company);

$company->programmer = new FrontendProgrammer('Tony');
var_dump($company);

$company->programmer = new BackendProgrammer('Tony');
var_dump($company);

sayHelloProgrammer(new Programmer('Tony'));
sayHelloProgrammer(new FrontendProgrammer('Stark'));
sayHelloProgrammer(new BackendProgrammer('Chris'));
