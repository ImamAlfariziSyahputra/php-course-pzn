<?php

namespace Mamlzy\PhpMvc\Middleware;

interface Middleware
{
  function before(): void;
}
