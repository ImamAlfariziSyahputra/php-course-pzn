<?php

require_once __DIR__ . '/GetConnection.php';

$connection = getConnection();

$connection->beginTransaction();

$connection->exec("INSERT INTO comments(email, comment) VALUES('ahok@gmail.com', 'hello2')");
$connection->exec("INSERT INTO comments(email, comment) VALUES('ahok@gmail.com', 'hello2')");

$connection->commit();

$connection = null;
