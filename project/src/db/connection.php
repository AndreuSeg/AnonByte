<?php

$host_PMA = "db";
$database_PMA = "AnonByte";
$user_PMA = "Andreu";
$password_PMA = "Caliudos123.";

try {
    $conn = new PDO("mysql:host=$host_PMA;port=3306;dbname=$database_PMA", $user_PMA, $password_PMA);
} catch (PDOException $e) {
    die("PDO Connection Error: " . $e->getMessage());
}
