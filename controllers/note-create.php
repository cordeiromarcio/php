<?php

$config = require 'config.php';
$db = new Database($config['database']);

$heading = "Criar Nota";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $errors = [];
//validação campo em branco BD
    if (strlen($_POST["body"]) === 0) {
        $errors["body"] = "Por favor informe o texto.";
    }

    //validação quntidade de caracteres
    if (strlen($_POST["body"]) > 1000) {
        $errors["body"] = "O corpo não pode ter mais de 1000 caracteres.";
    }

    if (empty($errors)) {

        $db->query('insert into notes(body,user_id) values (:body,:user_id)', [
            'body' => $_POST['body'],
            'user_id' => 1
        ]);
    }

}
require 'views/note-create.view.php';
