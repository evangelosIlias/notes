<?php

use App\Providers\Session;
use function functions\main\view;

view("login/create.view.php", [
    'heading' => 'Login Page',
    'errors' => Session::get('errors'),
]);