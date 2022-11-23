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

            session_start();
            $statement2 = $conn->prepare("SELECT user_id FROM users WHERE user_id = :user_id");
            $statement2->bindParam(":user_id", $_SESSION["user_id"]);
            $statement2->execute();
            $result = $statement2->fetch(\PDO::FETCH_ASSOC);
            $userID = $result["user_id"];

            $statement3 = $conn->prepare("SELECT network_name FROM networks WHERE network_name = :network_name");
            $statement3->bindParam(":network_name", $_POST["network_name"]);
            $statement3->execute();
            $result2 = $statement3->fetch(\PDO::FETCH_ASSOC);
            $networkName = $result2["network_name"];

            $statement4 = $conn->prepare("UPDATE networks SET user_id = $userID WHERE network_name = '$networkName'");
            $statement4->execute();

            header("Location: ../public/dashboard.php");
        }
    }
}
