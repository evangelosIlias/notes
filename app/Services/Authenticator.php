<?php

namespace App\Services;
use App\Providers\App;
use database\Database;
use App\Providers\Session;

class Authenticator
{   
    public function attempt($email, $password)
    {   
        $db = App::resolve(Database::class);

        $user = $db->query("SELECT * FROM users WHERE email = :email", [
                'email' => $email,
            ])->find();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                    // Start session
                    Session::check($user['username'], $email);

                    return true;
            };  
        }
        return false;
    }
}