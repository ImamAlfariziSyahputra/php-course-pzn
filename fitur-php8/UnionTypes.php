<?php

class Example
{
  public string|int|bool|array $data;

  function sampleFunction(string|array $data): string|array
  {
    if (is_string($data)) {
      return "This Parameter is a String";
    } else if (is_array($data)) {
      return ["This Parameter is an Array"];
    }
  }
}

$example = new Example();

$example->data = 1;
$example->data = 'Test';
$example->data = true;
$example->data = [];
// var_dump($example->data);

print_r($example->sampleFunction([]));
