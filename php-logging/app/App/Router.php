<?php

namespace Mamlzy\PhpLogging\App;

class Router
{
  private static array $routes = [];

  public static function add(
    string $method,
    string $path,
    string $controller,
    string $function,
    array $middlewares = []
  ): void {
    self::$routes[] = [
      'method' => $method,
      'path' => $path,
      'controller' => $controller,
      'function' => $function,
      'middlewares' => $middlewares
    ];
  }

  public static function run(): void
  {
    $path = '/';

    if (!empty($_SERVER['PATH_INFO'])) $path = $_SERVER['PATH_INFO'];
    $method = $_SERVER['REQUEST_METHOD'];

    foreach (self::$routes as $route) {
      $pattern = "#^" . $route['path'] . "$#";

      if (preg_match($pattern, $path, $matches) && $route['method'] == $method) {
        //! Call Middleware First!
        foreach ($route['middlewares'] as $middleware) {
          $instance = new $middleware();
          $instance->before();
        }

        $controller = new $route['controller'];
        $function = $route['function'];

        //! Remove First Index in Array
        array_shift($matches);
        //! naro array "matches" jadi parameter di function
        call_user_func_array([$controller, $function], $matches);
        return;
      }
    }

    http_response_code(404);
    echo "CONTROLLER NOT FOUND!" . PHP_EOL;
  }
}
