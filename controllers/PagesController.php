<?php
namespace controllers;
use core\App;
class PagesController
{
    public function index()
    {
        $users = App::get("database")->selectAll("users","id","desc");

        view("index", [
            "users" => $users
        ],true);
    }

    public function home()
    {
        $users = App::get("database")->selectAll("users","id","desc");

        view("index", [
            "users" => $users
        ]);
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
        redirect('home');
    }
}
