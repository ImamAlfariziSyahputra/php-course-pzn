<?php


class Data implements IteratorAggregate
{
  private string $first = 'first';
  public string $second = 'second';
  protected string $third = 'third';
  public string $fourth = 'fourth';

  //! Cara ke - 1
  // public function getIterator(): Traversable
  // {
  //   $arr = [
  //     'first' => $this->first,
  //     'second' => $this->second,
  //     'third' => $this->third,
  //     'fourth' => $this->fourth,
  //   ];

  //   return new ArrayIterator($arr);
  // }

  //! Cara ke - 2 (BETTER)
  public function getIterator(): Traversable
  {
    yield 'first' => $this->first;
    yield 'second' => $this->second;
    yield 'third' => $this->third;
    yield 'fourth' => $this->fourth;
  }
}

$data = new Data();

foreach ($data as $key => $value) {
  echo "Key => $key, Value => $value" . PHP_EOL;
}
