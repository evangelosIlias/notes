<?php

use function functions\main\view;
use App\Providers\App;
use database\Database;

$db = App::resolve(Database::class);

view("about.view.php", [
    'heading' => 'About US',
]);