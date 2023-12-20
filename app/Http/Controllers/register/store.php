<?php

use function functions\main\view;
use function functions\main\dd;
use App\Services\Validator;
use App\Providers\App;
use database\Database;
use App\Providers\Session;

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if (! Validator::email($email)) {
    $errors['email'] = "Please proivde a valid email address";
}

if (! Validator::string($password, 7, 255)) {
    $errors['password'] = "Please make sure your password is 7 characters long";
}

if (! empty($errors)) {
    return view("register/create.view.php", [
        'heading' => "Register Page",
        'errors' => $errors,
    ]);
}

$db = App::resolve(Database::class);

$user = $db->query("SELECT * FROM users WHERE email = :email", [
    'email' => $email,
])->find();

if ($user) {
    header("Location: /");
    exit();
} else {
   
    $db->query("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)", [
        'username' => $username,
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT),
    ]);

    Session::check($username, $email);

    header("Location: /");
    exit();
}
