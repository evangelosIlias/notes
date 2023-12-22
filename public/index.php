<?php

session_start();

use App\Providers\Session;
use App\Providers\Redirect;
use function functions\main\base_path;
use App\Exceptions\ValidationException;

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . "/vendor/autoload.php";
require BASE_PATH . "functions/main.php";
require base_path('bootstrap.php');

// spl_autoload_register(function ($class)
// {   
//     $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);
//     require base_path("{$class}.php");
// });

$router = new \App\Providers\Router();

$routes = require base_path("routes/web.php");

$uri = parse_url($_SERVER["REQUEST_URI"])['path'];

$method = $_POST["_method"] ?? $_SERVER['REQUEST_METHOD'];

try {
    $router->route($uri, $method);
} catch (ValidationException $exception) {
    Session::flash('errors', $exception->errors);
    return Redirect::redirect($router->previousUrl());
}

Session::unflash();