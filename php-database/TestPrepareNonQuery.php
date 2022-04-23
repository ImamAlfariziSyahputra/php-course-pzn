<?php

require_once __DIR__ . '/GetConnection.php';

$connection = getConnection();

$username = "stark";
$password = "stark";

$sql = "INSERT INTO admin(username, password) VALUES (?, ?)";

$result = $connection->prepare($sql);
$result->execute([$username, $password]); //! Result will Return Boolean for "INSERT Query"

if ($result) {
  echo "Add Data Success!" . PHP_EOL;
} else {
  echo "Add Data Failed." . PHP_EOL;
}

$connection = null;
