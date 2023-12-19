<?php

session_start();

use classes\Container;
use database\Database;
use classes\App;

$container = new Container();

$container->bind(Database::class, function() {
    return new Database();
});

App::setContainer($container);
