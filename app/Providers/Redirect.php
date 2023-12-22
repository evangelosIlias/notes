<?php

namespace App\Providers;

class Redirect
{
    public static function redirect($path)
    {
        header("Location: {$path}");
        exit();
    }
}