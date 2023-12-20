<?php

namespace App\Providers;

class Session
{
    public static function check($username, $email)
    {  
        $users = [
            'username' => $username, 
            'email' => $email,
        ];

        $_SESSION['user'] = $users;
    }

    public static function resolve($key)
    {
        return $_SESSION['user'][$key] ?? false;
    }

    public static function has($key)
    {
        return (bool) static::get($key);
    }

    public static function put($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function get($key, $default = null)
    {
        return $_SESSION['_flash'][$key] ?? $_SESSION[$key] ?? $default;
    }

    public static function flash($key, $value)
    {
        $_SESSION['_flash'][$key] = $value;
    }

    public static function unflash()
    {
       unset($_SESSION['_flash']); 
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