<?php

class Student
{
  public int $id;
  public string $name;
  public int $value;
  private string $sample;

  public function setSample(string $sample): void
  {
    $this->sample = $sample;
  }

  public function __clone()
  {
    unset($this->sample);
  }

  public function __toString(): string
  {
    return "Student id: $this->id, name: $this->name, value: $this->value";
  }

  public function __invoke(...$params): void
  {
    print_r($params);
    $join = join(",", $params);

    echo "Invoke student with params $join";
  }

  public function __debugInfo()
  {
    return [
      'id' => $this->id,
      'name' => $this->name,
      'value' => $this->value,
      'sample' => $this->sample,
      'author' => 'si author'
    ];
  }
}
