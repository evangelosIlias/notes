<?php

use function functions\main\view;
use classes\App;
use database\Database;

$db = App::resolve(Database::class);

$note = $db->query("SELECT * FROM notes where id = :id", [
    'id' => $_GET['id']
])->findOrFail();

view("notes/show.view.php", [
    'heading' => 'My Notes',
    'note' => $note,
]);
