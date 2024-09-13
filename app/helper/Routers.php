<?php
namespace App\Helper;

class Routers
{
    private array $routes = [];
    public function get($uri, $controller):void
    {
        $this->routes[] = [
            'method' => 'GET',
            'uri' => $uri,
            'controller' => $controller
        ];
    }
    public function post($uri, $controller):void
    {
        $this->routes[] = [
            'method' => 'POST',
            'uri' => $uri,
            'controller' => $controller
        ];
    }
    public function put($uri, $controller):void
    {
        $this->routes[] = [
            'method' => 'PUT',
            'uri' => $uri,
            'controller' => $controller
        ];
    }

    public function delete($uri, $controller):void
    {
        $this->routes[] = [
            'method' => 'DELETE',
            'uri' => $uri,
            'controller' => $controller
        ];
    }

    public function getRouters():array
    {
        return $this->routes;
    }

    public function run(string $uri, string $method): void
    {
        foreach ($this->getRouters() as $route) {
            if (in_array($uri, $route))
            {
                $this->includController($route['controller']);
                exit();
            }
        }

        echo 'erro';
    }

    private function includController(string $contorller): void
    {
        [$class, $method] = explode('@', $contorller);
        $use = "\\App\\Controllers\\$class";
        $object = new $use();
        $object->$method();
    }
}