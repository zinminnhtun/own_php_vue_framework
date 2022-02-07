<?php

function url($path=""){
//    $dir = "/Codes/my_php_framework";

    return "http://{$_SERVER["HTTP_HOST"]}$path";
}

function _public($path=""){
//    $dir = "/Codes/my_php_framework";

    return "http://{$_SERVER["HTTP_HOST"]}/public/$path";
}

function asset($path){
    return url()."/resources/".$path;
}

function dd($data)
{
    echo "<pre>";
    die(var_dump($data));
}

function dp($data)
{
    echo "<pre>";
    die(print_r($data));
}

function cors() {

    // Allow from any origin
    if (isset($_SERVER['HTTP_ORIGIN'])) {
        // Decide if the origin in $_SERVER['HTTP_ORIGIN'] is one
        // you want to allow, and if so:
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');    // cache for 1 day
    }

    // Access-Control headers are received during OPTIONS requests
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            // may also be using PUT, PATCH, HEAD etc
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

        exit(0);
    }

//            echo "You have CORS!";
}

function view($name, $data=[],$withVueCli=false)
{
    extract(
        $data
    );
    
    if($withVueCli == false){
        return require "views/$name.view.php";
    }else{
        return require "public/index.php";
    }
}

function redirect($uri)
{
    header("location: $uri");
}

function request($name)
{
    if ($_SERVER['REQUEST_METHOD']==="POST") {
        return $_POST[$name];
    }
    if ($_SERVER['REQUEST_METHOD']==="GET") {
        return $_GET[$name];
    }
}
