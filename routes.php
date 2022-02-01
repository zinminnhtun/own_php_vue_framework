<?php

// https://localhost:8000.com
// $router->register([
//     "" => "controllers/IndexController.php",
//     "about" => "controllers/AboutController.php",
//     "contact" => "controllers/ContactController.php",
//     "orders" => "controllers/OrdersController.php",
//     "customers" => "controllers/CustomersController.php",
//     "names" => "controllers/add-name.php",
// ]);

use controllers\PagesController;
use controllers\UsersController;
use controllers\ApiController;
use controllers\FileController;


// For temporary
$router->get("Codes/my_php_framework", [PagesController::class,"index"]);

$router->get("", [PagesController::class,"index"]);


$router->get("home", [PagesController::class,"home"]);
$router->get("about", [PagesController::class,"about"]);
$router->get("contact", [PagesController::class,"contact"]);
$router->get("orders", [PagesController::class,"order"]);
$router->get("customers", [PagesController::class,"customer"]);


$router->get("users", [UsersController::class,"index"]);
$router->post("names", [PagesController::class,"createUsers"]);

//files Save
$router->post("save",[FileController::class,"file"]);
//For Temporary
$router->post("Codes/my_php_framework/save",[FileController::class,"file"]);

//apiJson
$router->get("api/all",[ApiController::class,"all"]);




// dd($router->routes);
