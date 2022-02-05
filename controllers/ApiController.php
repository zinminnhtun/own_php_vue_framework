<?php
namespace controllers;
use core\App;
class ApiController
{
    public function all()
    {
        $users = App::get("database")->selectAll("users","id","asc");


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
        cors();


        header('Content-Type: application/json; charset=utf-8');
        $users = json_encode($users,JSON_UNESCAPED_UNICODE);
        print_r($users);
    }
    public function about()
    {
        view("about");
    }
    public function contact()
    {
        view("contact");
    }
    public function order()
    {
        view("order");
    }
    public function customer()
    {
        view("customer");
    }
    public function createUsers()
    {
        App::get("database")->insert([
            "name"=> request('name'),
        ], "users");
        redirect('/');
    }
}
