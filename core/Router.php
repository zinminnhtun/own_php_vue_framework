<?php
class Router
{
    public $routes=[
        "GET" =>[],
        "POST" =>[]
    ];
    public static function load($filename)
    {
        $router = new Router;
        require $filename;
        return $router;
    }
    public function register($routes)
    {
        $this->routes = $routes;
    }
    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri]=$controller;
    }
    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri]=$controller;
    }
    public function direct($uri, $method)
    {
        if (!array_key_exists($uri, $this->routes[$method])) { //contact

           die("404 page");
        }
        // dd();
        $explosion = $this->routes[$method][$uri];
        $this->callMethod($explosion[0], $explosion[1]);
        // return $this->routes[$method][$uri];
       // controllers/ContactController.php
       
        // dd($this->routes[$method][$uri]);
    }
    public function callMethod($class, $method)
    {
       
        $class = new $class();
        $class->$method();
    }
}
