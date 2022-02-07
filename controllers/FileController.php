<?php
namespace controllers;
use core\App;
class FileController
{
    public function file()
    {
        cors();
        $files = $_FILES['files'];
        $saveFolder = "storage/";
        $tmp_name = $files['tmp_name'];
        $name = $files['name'];

        for($i=0;$i < count($tmp_name); $i++) {
            move_uploaded_file($tmp_name[$i],$saveFolder.$name[$i]);
        }


       $data = [
           'message'=>"အဆင်ပြေပြီ",
           'filename'=> $name,

       ];


       echo json_encode($data,JSON_UNESCAPED_UNICODE);
//        var_dump($data);
    }
}