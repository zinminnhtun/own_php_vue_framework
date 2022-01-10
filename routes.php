<?php

use controllers\PagesController;
use controllers\UsersController;
use controllers\ApiController;
use controllers\FileController;
use music\MusicApiController;

$router->get("api/users",[MusicApiController::class,"users"]);

$router->get("", [PagesController::class,"index"]);

$router->get("home", [PagesController::class,"home"]);
$router->get("about", [PagesController::class,"about"]);
$router->get("contact", [PagesController::class,"contact"]);
$router->get("orders", [PagesController::class,"order"]);
$router->get("customers", [PagesController::class,"customer"]);

$router->get("users", [UsersController::class,"index"]);

//files Save
$router->post("save",[FileController::class,"file"]);

// CRUD
$router->post("names", [PagesController::class,"createUsers"]);
$router->get("delete/{id}",[PagesController::class,"deleteUser"]);
$router->get("edit/{id}",[PagesController::class,"editUser"]);
$router->post("update/{id}",[PagesController::class,"updateUser"]);

//api
$router->get("api/all",[ApiController::class,"all"]);

//MUSIC
$router->get("api/user/{id}",[MusicApiController::class,"user"]);




// dd($router->routes);
