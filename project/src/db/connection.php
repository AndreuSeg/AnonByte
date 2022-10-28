<?php

$host = "db";
$database = "AnonByte";
$user = "root";
$password = "AnonByteADMIN";

try {
    $conn = new PDO("mysql:host=$host;port=3306;dbname=$database", $user, $password);
} catch (PDOException $e) {
    die("PDO Connection Error: " . $e->getMessage());
}
