<?php

class Manager
{
  private function test(): void
  {
  }
}

class VicePresident extends Manager
{
  //! Override "Private Function" Now is Not Error in PHP v8.0.0
  public function test(string $name): string
  {
    return 'string';
  }
}
