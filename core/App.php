<?php
namespace core;

class App
{
    protected static $datas=[];
    public static function bind($key, $value)
    {
        static::$datas[$key]=$value;
    }

    public static function get($key)
    {
        return static::$datas[$key];
    }
}
