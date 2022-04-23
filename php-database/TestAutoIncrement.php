<?php

require_once __DIR__ . '/GetConnection.php';

$connection = getConnection();

$connection->exec("INSERT INTO comments(email,comment) VALUES('ahok@gmail.com', 'hello')");

$id = $connection->lastInsertId();

echo $id;

$connection = null;
