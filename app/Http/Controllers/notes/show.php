<?php

use function functions\main\view;
use App\Providers\App;
use App\Database\Database;

$db = App::resolve(Database::class);

$note = $db->query("SELECT * FROM notes where id = :id", [
    'id' => $_GET['id']
])->findOrFail();

view("notes/show.view.php", [
    'heading' => 'My Notes',
    'note' => $note,
]);
