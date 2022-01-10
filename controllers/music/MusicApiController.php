<?php
namespace music;
use core\App;
class MusicApiController
{
//    USERS
    public function users()
    {
        $users = App::get("database")->selectAll("users","id","asc");
        header('Content-Type: application/json; charset=utf-8');
        $users = json_encode($users,JSON_UNESCAPED_UNICODE);
        print_r($users);
    }

    public function user($id)
    {
        header('Content-Type: application/json; charset=utf-8');
        $user = App::get("database")->selectOne("users","id",$id);
        $user = json_encode($user,JSON_UNESCAPED_UNICODE);
        print_r($user);
    }

//    SONGS
    public function postSong()
    {
        $song = json_decode(file_get_contents("php://input"),true);

//        Database Table for songs
        App::get("database")->insert([
            "name"=> $song['name'],
        ], "songs");



//        Database Table for details
        $lastSong = App::get("database")->last("songs");
        App::get("database")->insert([
            "singer"=> $song['singer'],
            "composer"=> $song['composer'],
            "type"=> $song['type'],
            "language"=> $song['language'],
            "songId"=>$lastSong->id,
        ], "details");

        $Song = json_encode($song,JSON_UNESCAPED_UNICODE);
        echo $Song;
    }

    public function songs()
    {
        $songs = App::get("database")->selectAll("songs","id","desc");
        header('Content-Type: application/json; charset=utf-8');
        $songs = json_encode($songs,JSON_UNESCAPED_UNICODE);
        print_r($songs);
    }

    public function song($id)
    {
        header('Content-Type: application/json; charset=utf-8');
        $song = App::get("database")->selectOne("songs","id",$id);
        $song = json_encode($song,JSON_UNESCAPED_UNICODE);
        print_r($song);
    }

}

