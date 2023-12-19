<?php

use function functions\main\view;
use classes\App;
use database\Database;

$db = App::resolve(Database::class);

view("contact.view.php", [
    'heading' => 'Contact US',
]);