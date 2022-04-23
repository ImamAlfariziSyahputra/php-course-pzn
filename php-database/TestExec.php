<?php

require_once __DIR__ . '/GetConnection.php';

$connection = getConnection();

$sql = <<<SQL
  INSERT INTO customers(id, name, email)
  VALUES ('tony', 'Tony', 'tony@gmail.com');
SQL;

$exec = $connection->exec($sql); //! Return Boolean

var_dump($exec);

$connection = null;
