<?php
require "vendor/autoload.php";
require "core/bootstrap.php";
cors();
// dd($_SERVER);
Router::load("routes.php")
                ->direct(Request::uri(), $_SERVER["REQUEST_METHOD"]);
