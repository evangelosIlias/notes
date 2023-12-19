<?php

$router->get("/", "controllers/index.php");
$router->get("/about", "controllers/about.php");
$router->get("/notes", "controllers/notes.php")->only('auth');
$router->get("/contact", "controllers/contact.php");

$router->post('/notes', 'controllers/notes/store.php');
$router->get("/notes/create", "controllers/notes/create.php");

$router->get("/note", "controllers/notes/show.php");
$router->get("/note/edit", "controllers/notes/edit.php");
$router->delete("/note", "controllers/notes/destroy.php");

$router->get('/register', 'controllers/register/create.php')->only('guest');
$router->post('/register', 'controllers/register/store.php')->only('guest');

$router->get('/login', 'controllers/login/create.php')->only('guest');
$router->post('/login', 'controllers/login/store.php')->only('guest');
$router->delete('/logout', 'controllers/login/destroy.php');