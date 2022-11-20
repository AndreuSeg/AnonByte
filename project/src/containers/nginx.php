<?php

require "../db/connection.php";

$error = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"]) || empty($_POST["portI"]) || empty($_POST["portE"]) || empty($_POST["nginx"])) {
        $error = "Please fill all the fileds.";
        header("Location: ../public/form-container.php");
    } else {

        }
    }
