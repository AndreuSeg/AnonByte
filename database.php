<?php

$host = "127.0.0.1";
$database = "AnonByte";
$user = "Andreu";
$password = "Caliudos123.";

try {
    $conn = new PDO("mysql:host=$host;dbname=$database", $user, $password);
} catch (PDOException $e) {
    die("PDO Connection Error: " . $e->getMessage());
}
