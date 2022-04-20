<?php

require_once __DIR__ . '/data/Location.php';

use \Data\{Location, City, Province, Country};

// $location = new Location(); //! Error

$city = new City();
$city->name = 'Manhattan';

$province = new Province();

$country = new Country();

var_dump($city);
var_dump($province);
var_dump($country);
