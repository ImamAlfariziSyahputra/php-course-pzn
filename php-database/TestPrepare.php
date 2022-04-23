<?php

require_once __DIR__ . '/GetConnection.php';

$connection = getConnection();

$username = "admin";
$password = "admin";

$sql = "SELECT * FROM admin WHERE username=:username AND password=:password";

$result = $connection->prepare($sql);
$result->bindParam("username", $username);
$result->bindParam("password", $password);
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
