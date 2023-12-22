<?php

use function functions\main\view;
use App\Services\Validator;
use App\Providers\App;
use App\Database\Database;

$db = App::resolve(Database::class);

$errors = [];

if (! Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = "The body of no more 1,000 characters is required.";
}

if (! empty($errors)) {
    return view("notes/create.view.php", [
        'heading' => 'Create a Note',
        'errors' => $errors,
    ]);
}
$db->query("INSERT INTO notes(body, user_id) VALUES(?, ?)", [
    filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS),
    filter_var($_POST['user_id'] = 1, FILTER_SANITIZE_NUMBER_INT)
]);

header("Location: /notes");
die();
