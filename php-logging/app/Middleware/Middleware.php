<?php

namespace Mamlzy\PhpLogging\Middleware;

interface Middleware
{
  function before(): void;
}
