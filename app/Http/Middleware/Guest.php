<?php 

namespace App\Http\Middleware;

class Guest
{
    public function handle()
    {
        if (isset($_SESSION['user'])) {
            header('location: /');
            exit();
        }
    }
}