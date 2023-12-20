<?php

use App\Providers\Session;
use App\Providers\Redirect;
use App\Http\Forms\LoginForm;
use App\Services\Authenticator;
use function functions\main\view;

$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

$form = new LoginForm(); 
$path = new Redirect();

// Validate the form
if ($form->validate($email, $password)) {
    if ((new Authenticator)->attempt($email, $password)) {
        $path->redirect("/");
    } 
    
    $form->error('email', "No matching account found for that email address and password.");
}

Session::flash('errors', $form->errors());

return $path->redirect("/login");

// return view("login/create.view.php", [
//     'heading' => "Login Page",
//     'errors' => $form->errors(),
// ]);
