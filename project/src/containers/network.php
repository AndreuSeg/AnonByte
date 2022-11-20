<?php

require "../db/connection.php";

$error = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["network_name"])) {
        $error = "Please put a name";
        header("../public/create-network-user.php");
    } else {
        $statement = $conn->prepare("SELECT * FROM networks WHERE network_name = :network_name");
        $statement->bindParam(":network_name", $_POST["network_name"]);
        $statement->execute();

        if ($statement->rowCount() > 0) {
            $error = "Network name exists";
            header("../public/create-network-user.php");
        } else {
            $statement = $conn->prepare("INSERT INTO networks (network_name) VALUES (:network_name)");
            $statement->bindParam(":network_name", $_POST["network_name"]);
            $statement->execute();

            $statement2 = $conn->prepare("SELECT network_id FROM networks WHERE network_name = :network_name");
            $statement2->bindParam(":network_name", $_POST["network_name"]);
            $statement2->execute();
            $result = $statement2->fetch(\PDO::FETCH_ASSOC);
            $network_id = $result["network_id"];

            $statement3 = $conn->prepare("UPDATE users SET network_id = $network_id");
            $statement3->execute();


            header("Location: ../public/dashboard.php");
        }
    }
}
