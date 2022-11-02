<?php

require "../db/connection.php";

$error = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['name']) || (empty($_POST['email'])) || (empty($_POST['message']))) {
        $error = 'Please fill all the files';
        return $error;
    } else {
        $datos = [
            $name = $_POST['name'],
            $email = $_POST['email'],
            $message = $_POST['message']
        ];

        $passDataToJson = json_encode($datos);
        $escribirDatos = file_put_contents('../forms/data-forms.json', $passDataToJson);
        header('Location: ../index.php');
    }
}
