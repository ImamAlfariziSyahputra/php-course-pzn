<?php

class Foo
{
  //! Final constant gak bisa di override oleh child class
  final const XX = 'Foo';
}

class Bar extends Foo
{
  // const XX = 'Bar';
}

var_dump(Bar::XX);
