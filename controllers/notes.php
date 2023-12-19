<?php

use function functions\main\view;
use classes\App;
use database\Database;

$db = App::resolve(Database::class);

$notes = $db->query("SELECT * FROM notes")->findAll();

view("notes/index.view.php", [
    'heading' => 'My Notes',
    'notes' => $notes,
]);