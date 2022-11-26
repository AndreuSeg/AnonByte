<?php

require "../db/connection.php";

$error = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"]) || empty($_POST["portI"]) || empty($_POST["portE"]) || empty($_POST["nginx"])) {
        $error = "Please fill all the fileds.";
        header("Location: ../public/form-container.php");
    } else {

        $statement = $conn->prepare("INSERT INTO containers (container_name, container_image, port_i, port_e) VALUES (:container_name, :container_image, :port_i, :port_e)");
        $statement->execute([
            ":container_name" => $_POST["name"],
            ":container_image" => $_POST["nginx"],
            ":port_i" => $_POST["portI"],
            ":port_e" => $_POST["portE"]
        ]);

        session_start();
        $statement2 = $conn->prepare("Select u.user_id FROM users u INNER JOIN networks n ON u.user_id = n.user_id WHERE u.user_id = :user_id");
        $statement2->bindParam(":user_id", $_SESSION["user_id"]);
        $statement2->execute();
        $result = $statement2->fetch(\PDO::FETCH_ASSOC);
        $userID = $result["user_id"];

        $statement3 = $conn->prepare("UPDATE containers SET user_id = $userID WHERE container_name = :container_name");
        $statement3->bindParam(":container_name", $_POST["name"]);
        $statement3->execute();

        $statement4 = $conn->prepare("SELECT network_id FROM networks n INNER JOIN users u ON n.user_id = u.user_id WHERE n.user_id = :user_id");
        $statement4->bindParam(":user_id", $_SESSION["user_id"]);
        $statement4->execute();
        $result2 = $statement4->fetch(\PDO::FETCH_ASSOC);
        $networkId = $result2["network_id"];

        $statement5 = $conn->prepare("UPDATE containers SET network_id = $networkId WHERE container_name = :container_name");
        $statement5->bindParam(":container_name", $_POST["name"]);
        $statement5->execute();

        header("Location: ../public/dashboard.php");
    }
}
