<?php

interface SayHello
{
  function sayHello(): string;
}

trait IndonesiaGender
{
  function inIndonesia(): string
  {
    return match ($this) {
      Gender::Male => 'Tuan',
      Gender::Female => 'Nyonya',
    };
  }
}

enum Gender: string implements SayHello
{
  use IndonesiaGender;

  case Male = 'Mr';
  case Female = 'Mrs';

  const UNKNOWN = 'unkown';

  static function fromIndonesia(string $value): Gender
  {
    return match ($value) {
      "Tuan" => Gender::Male,
      "Nyonya" => Gender::Female,
      default => throw new Exception('Value nya gak support!')
    };
  }

  function sayHello(): string
  {
    return "Hello " . $this->value;
  }
}

class Customer
{
  public function __construct(
    public string $id,
    public string $name,
    public ?Gender $gender = null
  ) {
  }
}

function sayHello(Customer $customer): string
{
  if ($customer->gender == null) {
    return "Hello {$customer->name}";
  } else {
    return "Hello " . $customer->gender->value . ' ' . $customer->name;
  }
}

echo sayHello(new Customer(1, 'Ahok', Gender::Male)) . PHP_EOL;
echo sayHello(new Customer(2, 'Jenny', Gender::Female)) . PHP_EOL;
echo sayHello(new Customer(3, 'Unkown')) . PHP_EOL;

// var_dump(Gender::cases());

var_dump(Gender::Male->sayHello());
var_dump(Gender::Female->sayHello());
var_dump(Gender::Male->inIndonesia());
var_dump(Gender::Female->inIndonesia());

var_dump(Gender::fromIndonesia('Tuan'));
var_dump(Gender::fromIndonesia('Nyonya'));
// var_dump(Gender::fromIndonesia('salah'));

var_dump(Gender::UNKNOWN);
