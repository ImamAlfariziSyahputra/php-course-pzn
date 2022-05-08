<?php

namespace Mamlzy\PhpAuth\App;

use PHPUnit\Framework\TestCase;

class ViewTest extends TestCase
{
  public function testRender()
  {
    View::render('Home/index', [
      'title' => 'PHP Auth'
    ]);

    $this->expectOutputRegex('[PHP Auth]');
    $this->expectOutputRegex('[html]');
    $this->expectOutputRegex('[body]');
    $this->expectOutputRegex('[Login Management]');
    $this->expectOutputRegex('[Login]');
    $this->expectOutputRegex('[Register]');
  }
}
