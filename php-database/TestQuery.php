<?php

require_once __DIR__ . '/GetConnection.php';

$connection = getConnection();

$sql = "SELECT * FROM customers";
$result = $connection->query($sql); //! Return "PDOStatement"

foreach ($result as $row) {
  $id = $row['id'];
  $name = $row['name'];
  $email = $row['email'];

  echo "Id: $id" . PHP_EOL;
  echo "Name: $name" . PHP_EOL;
  echo "Email: $email" . PHP_EOL;

  echo "----------------------------" . PHP_EOL;
}

$connection = null;
