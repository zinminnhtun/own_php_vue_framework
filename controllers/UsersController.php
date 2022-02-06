<?php
namespace controllers;
use core\App;
class UsersController
{
    public function index()
    {
        view("index", [
            "users"=> App::get("database")->selectAll("users","id",40)
        ]);
    }
}
