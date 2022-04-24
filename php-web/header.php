<?php

header('Application: Belajar PHP Web');
header('Author: Imam Alfarizi');

$client = $_SERVER['HTTP_CLIENT_NAME'];

echo "Hello $client";
