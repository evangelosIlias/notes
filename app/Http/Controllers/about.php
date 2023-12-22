<?php

use function functions\main\view;
use App\Providers\App;
use App\Database\Database;

$db = App::resolve(Database::class);

view("about.view.php", [
    'heading' => 'About US',
]);