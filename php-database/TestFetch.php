<?php

require_once __DIR__ . '/GetConnection.php';

$connection = getConnection();

$username = "ahok";
$password = "asd";

$sql = "SELECT * FROM admin WHERE username = ? AND password = ?";

$result = $connection->prepare($sql);
$result->execute([$username, $password]); //! Result will Return Value for "SELECT Query"

if ($row = $result->fetch()) {
  echo "Login Success with : {$row['username']}" . PHP_EOL;
} else {
  echo "Login Failed." . PHP_EOL;
}

$connection = null;
