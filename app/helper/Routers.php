<?php
namespace App\Helper;

class Routers
{
    private array $routes = [];
    public function get($uri, $controller):void
    {
        $this->routes = [
            'method' => 'GET',
            'uri' => $uri,
            'controller' => $controller
        ];
    }
    public function post($uri, $controller):void
    {
        $this->routes = [
            'method' => 'POST',
            'uri' => $uri,
            'controller' => $controller
        ];
    }
    public function put($uri, $controller):void
    {
        $this->routes = [
            'method' => 'PUT',
            'uri' => $uri,
            'controller' => $controller
        ];
    }

    public function delete($uri, $controller):void
    {
        $this->routes = [
            'method' => 'DELETE',
            'uri' => $uri,
            'controller' => $controller
        ];
    }

    public function getRouters():array
    {
        return $this->routes;
    }
}