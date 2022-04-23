<?php

require_once __DIR__ . '/GetConnection.php';

$connection = getConnection();

$username = $connection->quote("admin'; #");
$password = $connection->quote("admin");

//! Gak usah pakai petik satu setelah "=", kalo pake function "quote()"
$sql = "SELECT * FROM admin WHERE username=$username AND password=$password";

$result = $connection->query($sql);

$success = false;
$findUser = null;
foreach ($result as $row) {
  //! If Success
  $success = true;
  $findUser = $row['username'];
}

if ($success) {
  echo "Login Success with : $findUser" . PHP_EOL;
} else {
  echo "Login Failed." . PHP_EOL;
}

$connection = null;
