<?php

use App\Providers\Container;
use database\Database;
use App\Providers\App;

$container = new Container();

$container->bind(Database::class, function() {
    return new Database();
});

App::setContainer($container);
