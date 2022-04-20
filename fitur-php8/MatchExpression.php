<?php

$value = 'E';
$result = '';

//! Ketika Menggunakan "Switch Case"
switch ($value) {
  case 'A':
  case 'B':
  case 'C':
    $result = 'Anda Lulus!';
    break;
  case 'D':
    $result = 'Anda Tidak Lulus!';
    break;
  case 'E':
    $result = 'Mungkin Anda Salah Jurusan';
    break;
  default:
    $result = 'Nilai apa itu?';
}

//! Menggunakan "Match Expression"  (Better for simple logic)
$value2 = 'F';
$result2 = match ($value2) {
  'A', 'B', 'C' => 'Anda Lulus!',
  'D' => 'Anda Tidak Lulus!',
  'E' => 'Sepertinya Anda Salah Jurusan.',
  default => 'Nilai apa itu?',
};

//! "Match Expression Non Equals"
$value3 = 80;

$result3 = match (true) {
  $value3 >= 80 => 'A',
  $value3 >= 70 => 'B',
  $value3 >= 60 => 'C',
  $value3 >= 50 => 'D',
  default => 'E',
};

//! Match Expression dengan Kondisi
$name = 'Mr. Imam';

$result4 = match (true) {
  str_contains($name, 'Mr. ') => 'Hello Sir!',
  str_contains($name, 'Mrs. ') => 'Hello Mam!',
  default => 'Hello!',
};

echo $result4 . PHP_EOL;
