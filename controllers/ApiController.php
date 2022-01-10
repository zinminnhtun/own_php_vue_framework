<?php
namespace controllers;
use core\App;
class ApiController
{
    public function all()
    {
        $users = App::get("database")->selectAll("users","id","asc");

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
