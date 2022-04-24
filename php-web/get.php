<?php

if (!isset($_GET['name'])) {
  http_response_code(400);
  echo "Name is Required!";
  exit();
}

$name = htmlspecialchars(isset($_GET['name']) ? "{$_GET['name']}!" : 'Buddy!');

$say = "Hello $name";
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
</body>

</html>