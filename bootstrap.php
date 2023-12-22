<?php

use App\Providers\App;
use App\Database\Database;
use App\Providers\Container;

$container = new Container();

$container->bind(Database::class, function() {
    return new Database();
});

App::setContainer($container);
