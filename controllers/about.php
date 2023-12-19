<?php

use function functions\main\view;
use classes\App;
use database\Database;

$db = App::resolve(Database::class);

view("about.view.php", [
    'heading' => 'About US',
]);