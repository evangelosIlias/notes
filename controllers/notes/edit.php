<?php

use function functions\main\view;
use function functions\main\authorize;
use classes\App;
use database\Database;

$db = App::resolve(Database::class);

$id = $_POST['id'];

if ($id = $_POST['id']) {
    $note = $db->query("SELECT * FROM notes WHERE id = :id", ["id" => $id])->findOrFail();

    // Check if the logged-in user is the owner of the note
    $loggedInUserId = $_SESSION['user_id'];
    authorize($note['user_id'] === $loggedInUserId);
}

view("notes/edit.view.php", [
    'heading' => 'Edit a Note',
    'errors' => [],
    'note' => $note
]);
