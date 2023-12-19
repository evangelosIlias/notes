<?php

use function functions\main\view;
use function functions\main\dd;
use classes\App;
use database\Database;
use classes\Session;
use classes\Validator;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if (! Validator::email($email)) {
    $errors['email'] = "Please proivde a valid email address";
}

if (! Validator::string($password)) {
    $errors['password'] = "Please provide a valid password";
}

if (! empty($errors)) {
    return view("login/create.view.php", [
        'heading' => "Login Page",
        'errors' => $errors,
    ]);
}

$user = $db->query("SELECT * FROM users where email = :email", [
    'email' => $email,
])->find();

if ($user) {
    if (password_verify($password, $user['password'])) {
        Session::bind($user['username'], $email);

        header("Location: /");
        exit(); 
    }  
}

return view("login/create.view.php", [
    'heading' => "Login Page",
    'errors' =>[
        'email' => 'No matching account found for that email address and password',
    ],
]);