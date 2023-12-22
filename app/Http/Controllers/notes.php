<?php

use function functions\main\view;
use App\Providers\App;
use App\Database\Database;

$db = App::resolve(Database::class);

$notes = $db->query("SELECT * FROM notes")->findAll();

view("notes/index.view.php", [
    'heading' => 'My Notes',
    'notes' => $notes,
]);