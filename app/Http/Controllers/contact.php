<?php

use function functions\main\view;
use App\Providers\App;
use App\Database\Database;

$db = App::resolve(Database::class);

view("contact.view.php", [
    'heading' => 'Contact US',
]);