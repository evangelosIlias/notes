<?php

namespace App\Providers;

class Session
{
    public static function bind($username, $email)
    {  
        $user = [
            'username' => $username, 
            'email' => $email,
        ];

        $_SESSION['user'] = $user;
    }

    public static function resolve()
    {
        return $_SESSION['user'] ?? false;
    }

    public static function destroy()
    {   
        unset($_SESSION['user']);
        session_destroy();

        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 3600,
            $params['path'],
            $params['domain'],
            $params['secure'],
            $params['httponly']
        );

        setcookie(session_name(), session_id(), [
            'expires' => 0,
            'path' => '/',
            'domain' => '',
            'secure' => true,
            'httponly' => true,
            'samesite' => 'None',
        ]);
    }
}