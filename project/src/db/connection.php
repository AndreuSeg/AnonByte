<?php

$host_PMA = "db";
$database_PMA = "AnonByte";
$user_PMA = "root";
$password_PMA = "AnonByteADMIN";

try {
    $conn = new PDO("mysql:host=$host_PMA;port=3306;dbname=$database_PMA", $user_PMA, $password_PMA);
} catch (PDOException $e) {
    die("PDO Connection Error: " . $e->getMessage());
}
