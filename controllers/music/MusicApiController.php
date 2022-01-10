<?php
namespace music;
use core\App;
class MusicApiController
{
    public function users()
    {
        cors();
        $users = App::get("database")->selectAll("users","id","asc");

        header('Content-Type: application/json; charset=utf-8');
        $users = json_encode($users,JSON_UNESCAPED_UNICODE);
        print_r($users);
    }

    public function user($id)
    {
        cors();
        $user = App::get("database")->selectOne("users","id",$id);

        header('Content-Type: application/json; charset=utf-8');
        $user = json_encode($user,JSON_UNESCAPED_UNICODE);
        print_r($user);
    }
}