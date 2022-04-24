<?php
session_start();

if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
  header('Location: /session/member.php');
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];
  if ($username == 'ahok' && $password == 'asd') {
    $_SESSION['login'] = true;
    $_SESSION['username'] = 'ahok';

    header('Location: /session/member.php');
    exit();
  } else {
    $error = "Login Failed.";
  }
}

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
  <?php if ($error != '') : ?>
    <h2 style="color: red;"><?= $error ?></h2>
  <?php endif; ?>

  <h1>Login</h1>
  <form action="/session/login.php" method="POST">
    <label>Username :
      <input type="text" name="username">
    </label>
    <br>
    <label>Password :
      <input type="text" name="password">
    </label>
    <br>
    <button type="submit">Login</button>
  </form>
</body>

</html>