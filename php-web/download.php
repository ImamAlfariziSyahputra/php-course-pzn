<?php

if (!empty($_GET['key']) && $_GET['key'] == 'rahasia') {
  header('Content-Disposition: attachment; filename="dog.jpg"');
  header('Content-Type: image/jpg');
  readfile(__DIR__ . '/files/dog.jpg');
  exit();
} else {
  echo "Invalid Key!";
}
