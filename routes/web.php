<?php

$router->get("/", "index.php");
$router->get("/about", "about.php");
$router->get("/notes", "notes.php")->only('auth');
$router->get("/contact", "contact.php");

$router->post('/notes', 'notes/store.php');
$router->get("/notes/create", "notes/create.php");

$router->get("/note", "notes/show.php");
$router->get("/note/edit", "notes/edit.php");
$router->delete("/note", "notes/destroy.php");

$router->get('/register', 'register/create.php')->only('guest');
$router->post('/register', 'register/store.php')->only('guest');

$router->get('/login', 'login/create.php')->only('guest');
$router->post('/login', 'login/store.php')->only('guest');
$router->delete('/logout', 'login/destroy.php');