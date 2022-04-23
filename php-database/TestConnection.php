<?php

$host = 'localhost';
$port = 3306;
$database = 'pzn_php_database';
$username = 'root';
$password = '';

try {
  //! Throwing Error if Failed
  $connection = new PDO("mysql:host=$host:$port;dbname=$database", $username, $password);

  echo "Database MYSQL Connection Success!" . PHP_EOL;

  //! Close Connection
  $connection = null;
} catch (PDOException $exception) {
  echo "Failed Connect to Database MYSQL. => " . $exception->getMessage() . PHP_EOL;
}
