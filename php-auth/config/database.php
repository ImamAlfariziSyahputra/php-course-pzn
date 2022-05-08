<?php

function getDatabaseConfig(): array
{
  return [
    "database" => [
      "test" => [
        "url" => "mysql:host=localhost;dbname=pzn_php_auth_test",
        "username" => "root",
        "password" => "",
      ],
      "prod" => [
        "url" => "mysql:host=localhost;dbname=pzn_php_auth",
        "username" => "root",
        "password" => "",
      ]
    ]
  ];
}
