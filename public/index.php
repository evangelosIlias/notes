<?php

session_start();

use App\Providers\Session;
use function functions\main\base_path;

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . "functions/main.php";

spl_autoload_register(function ($class)
{   
    $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);
    require base_path("{$class}.php");
});

require base_path('bootstrap.php');

$router = new \App\Providers\Router();

$routes = require base_path("routes/web.php");

$uri = parse_url($_SERVER["REQUEST_URI"])['path'];

$method = $_POST["_method"] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);

Session::unflash();