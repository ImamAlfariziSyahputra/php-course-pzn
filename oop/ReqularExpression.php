<?php

$matches = [];

//! Parameter Ke-3 itu "Optional"
$result = (bool)preg_match_all("/alfa|putra|im/i", 'Imam Alfarizi Syahputra', $matches);

// var_dump($result);
// var_dump($matches);

//! nge-Replace kata kasar jadi "***"
$result = preg_replace('/anjing|bangsat/i', '***', 'dasar lu anjing dan bangsat!');

// var_dump($result);

//! nge-Split String Menjadi Array
//* \s => Spasi
//* , => Koma
//* - => Strip
$result = preg_split('/[\s,-]/', 'Imam Alfarizi,Syahputra-ganteng');

var_dump($result);
