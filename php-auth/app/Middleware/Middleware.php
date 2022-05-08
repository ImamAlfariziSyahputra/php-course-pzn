<?php

namespace Mamlzy\PhpAuth\Middleware;

interface Middleware
{
  function before(): void;
}
