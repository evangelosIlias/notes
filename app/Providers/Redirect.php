<?php

namespace App\Providers;

class Redirect
{
    public function redirect($path)
    {
        header("Location: {$path}");
        exit();
    }
}