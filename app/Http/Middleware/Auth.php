<?php 

namespace App\Http\Middleware;

class Auth
{
    public function handle()
    {
        if (! isset($_SESSION['user'])) {
            header('location: /');
            exit();
        }
    }
}