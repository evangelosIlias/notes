<?php

use function functions\main\view;
use App\Providers\App;
use database\Database;
use App\Providers\Session;
use App\Http\Forms\LoginForm;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

// Validate the form
if (! $form->validate($email, $password)) {
    return view("login/create.view.php", [
        'heading' => "Login Page",
        'errors' => $form->errors(),
    ]);
}

// Find the user
$user = $db->query("SELECT * FROM users WHERE email = :email", [
    'email' => $email,
])->find();

if ($user) {
   if (password_verify($password, $user['password'])) {
        // Start session
        Session::bind($user['username'], $email);

        header("Location: /");
        exit();
   };  
}

return view("login/create.view.php", [
    'heading' => "Login Page",
    'errors' => [
        'password' => "Incorrect password or email",
    ],
]);




