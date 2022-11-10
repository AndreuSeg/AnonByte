<?php

require "../db/connection.php";

$error = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['name']) || (empty($_POST['email'])) || (empty($_POST['message']))) {
        $error = 'Please fill all the files';
        echo $error;
    } else {
        date_default_timezone_set('Europe/Madrid');
        $date = date('l jS \of F Y h:i:s A');
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        $datos = array('date' => $date, 'name' => $name, 'email' => $email, 'message' => $message);

        $passDataToJson = json_encode($datos);
        $nameArchivo = '../data/data.json';
        $crearArchivo = fopen($nameArchivo, 'a+');
        if (!filesize($nameArchivo) == null) {
            $escribirComa = fputs($crearArchivo, ',');
        }
        $escribirDatos = fputs($crearArchivo, $passDataToJson);
        $cerrarArchivo = fclose($crearArchivo);
        header('Location: ../index.php');
    }
}
