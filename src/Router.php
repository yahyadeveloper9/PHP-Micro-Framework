<?php
namespace Framework;
class Router {
    protected $routes = [];
    public function add($method, $path, $callback) {
        $this->routes[] = compact('method', 'path', 'callback');
    }
    public function dispatch($requestMethod, $requestUri) {
        foreach ($this->routes as $route) {
            if ($route['method'] === $requestMethod && $route['path'] === $requestUri) {
                return call_user_func($route['callback']);
            }
        }
    }
}
