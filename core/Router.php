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
        $uri = explode('/',$uri);
        $uri = $uri[0];
        $this->routes['GET'][$uri]=$controller;
    }
    public function post($uri, $controller)
    {
        $uri = explode('/',$uri);
        $uri = $uri[0];
        $this->routes['POST'][$uri]=$controller;
    }
    public function direct($uri, $method)
    {
        $uri = explode('/',$uri);
        if(count($uri)>1){
            $uri1 = intval($uri[1]);

        }else{
            $uri1 = null;
        }
        $uri = $uri[0];
        if (!array_key_exists($uri, $this->routes[$method])) { //contact

           die("404 page");
        }
        $explosion = $this->routes[$method][$uri];
        $this->callMethod($explosion[0], $explosion[1],$uri1);
        // return $this->routes[$method][$uri];
       // controllers/ContactController.php
       
        // dd($this->routes[$method][$uri]);
    }
    public function callMethod($class, $method,$uri1)
    {
       if($uri1===null){
           $class = new $class();
           $class->$method();
       }else{
           $class = new $class();
           $class->$method($uri1);
       }

    }
}
