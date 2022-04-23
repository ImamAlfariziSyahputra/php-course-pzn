<?php

require_once __DIR__ . '/GetConnection.php';

$connection = getConnection();

$username = "ahok";
$password = "asd";

$sql = "SELECT * FROM admin WHERE username=? AND password=?";

$result = $connection->prepare($sql);
$result->bindParam(1, $username);
$result->bindParam(2, $password);
$result->execute(); //! Result will Return Value for "SELECT Query"

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
