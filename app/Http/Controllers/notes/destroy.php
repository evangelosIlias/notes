<?php

use App\Providers\App;
use App\Database\Database;

$db = App::resolve(Database::class);

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $note = $db->query("SELECT * FROM notes WHERE id = :id", ["id" => $id])->findOrFail();

    $db->query("DELETE FROM notes WHERE id = :id", ["id" => $id]);

    header("Location: /notes");
    exit();
}
