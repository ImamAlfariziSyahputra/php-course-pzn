<?php

require_once __DIR__ . '/data/Manager.php';

$manager = new Manager();
$manager->name = 'Jokowi';
$manager->sayHello('Tony');

$vp = new VicePresident();
$vp->name = 'Prabowo';
$vp->sayHello('Tony');
