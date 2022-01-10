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
            "email"=>"zinmin@gmail.com",
            "password"=>"",
            "playlist"=>"",
        ], "users");
        redirect('home');
    }

    public function deleteUser($id)
    {
        App::get("database")->delete("users",$id);
        redirect(url().'/home');
    }

    public function editUser($id)
    {
        $user = App::get('database')->selectOne('users','id',$id);
       view("edit",[
           "id"=>$id,
           "user"=>$user
       ]);
    }

    public function updateUser($id)
    {
        App::get("database")->update([
            "name"=> request('name'),
            "email"=>request('email'),
            "role"=>request('role'),
        ], "users",$id);
        redirect(url().'/home');
    }
}
