<?php

namespace functions\main;
use classes\Response;

function urlIS($value)
{
    if($_SERVER['REQUEST_URI'] == $value) {
        return 'bg-blue-900 text-white' ;
    } else {
        return 'text-gray-300'; 
    }
}

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}

function authorize($condition, $status = Response::FORBIDDEN)
{
    if (!$condition) {
        abort($status);
    }
}

function abort($code = 404)
{
    http_response_code($code);
    require base_path("views/{$code}.php");
    die();
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{   
    extract($attributes);
    require base_path('views/' . $path);
}
