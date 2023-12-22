<?php

use App\Providers\Redirect;
use App\Http\Forms\LoginForm;
use App\Services\Authenticator;

$form = LoginForm::validate($attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password'],
]);

$singedIn = (new Authenticator)->attempt($attributes['email'], $attributes['password']);
    
if (! $singedIn) {
    $form->error('email', "No matching account found for that email address and password.")
    ->throw();   
} 

Redirect::redirect("/");