<?php

$date = new DateTime();

$date->setDate(2012, 1, 1); //! Set Tanggal
$date->setTime(12, 12, 12); //! Set Waktu

$date->add(new DateInterval('P1Y')); //! Add "1 Year"

//! Set Minus "1 Month", invert must be true.
$minusOneMonth = new DateInterval('P1M');
$minusOneMonth->invert = true;

//! Execute minus "1 Month"
$date->add($minusOneMonth);

// var_dump($date);

//! Set DateTimeZone to another country
$now = new DateTime();
$now->setTimezone(new DateTimeZone('America/Toronto'));

// var_dump($now);

//! Formatting Date (Biasanya untuk Front End)
$string = $now->format('Y-m-d H:i:s') . PHP_EOL;

echo "Wakut saat ini: $string" . PHP_EOL;

//! Formatting Date dari string yang diinputkan  
$date = DateTime::createFromFormat('Y-m-d H:i:s', "2020-01-01 10:10:10", new DateTimeZone('Asia/Jakarta'));

if ($date) {
  var_dump($date);
} else {
  echo "Masukkan tanggal dengan format yang benar!" . PHP_EOL;
}
