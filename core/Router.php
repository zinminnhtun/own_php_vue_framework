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
        $uriArr = explode('/',$uri);
        $arrLen = count($uriArr);
        if (strpos($uriArr[$arrLen-1],'{') === 0){
            $uriStr ="";
            for ($x=0;$x<$arrLen-1;$x++) {
                $uriStr .= "/".$uriArr[$x];
            }
            $uriStr = ltrim($uriStr,"/");
            $uri = $uriStr;
        }

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

        $uriArr = explode('/',$uri);
        $arrLen = count($uriArr);
        $uriNum = intval($uriArr[$arrLen-1]);
        $uriNum > 0 ? $uriNum=$uriNum : $uriNum=null;
        if (is_int($uriNum)){
            $uriStr ="";
            for ($x=0;$x<$arrLen-1;$x++) {
                $uriStr .= "/".$uriArr[$x];
            }
            $uriStr = ltrim($uriStr,"/");
            $uri = $uriStr;
        }
//        dd($uri);
//        dd($uriNum);
        if (!array_key_exists($uri, $this->routes[$method])) { //contact

           die("404 page");
        }
        $explosion = $this->routes[$method][$uri];
        $this->callMethod($explosion[0], $explosion[1],$uriNum);
        // return $this->routes[$method][$uri];
       // controllers/ContactController.php
       
        // dd($this->routes[$method][$uri]);
    }
    public function callMethod($class, $method,$uriNum)
    {
       if($uriNum===null){
           $class = new $class();
           $class->$method();
       }else{
           $class = new $class();
           $class->$method($uriNum);
       }
    }
}
