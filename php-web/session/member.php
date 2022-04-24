<?php
session_start();

if ($_SESSION['login'] != true) {
  header('Location: /session/login.php');
  exit();
}

$username = $_SESSION['username'];

$say = "Hello $username";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h1><?= $say ?></h1>

  <a href="/session/logout.php">Logout</a>
</body>

</html>