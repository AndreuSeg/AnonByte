<?php

require "../db/connection.php";

$error = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"]) || empty($_POST["php"])) {
        $error = "Please fill all the fileds.";
        header("Location: ../public/form-container.php");
    } else {

        $statement = $conn->prepare("INSERT INTO containers (container_name, container_image) VALUES (:container_name, :container_image)");
        $statement->execute([
            ":container_name" => $_POST["name"],
            ":container_image" => $_POST["php"]
        ]);

        $statement2 = $conn->prepare("SELECT container_id FROM containers WHERE container_name = :container_name");
        $statement2->bindParam(":container_name", $_POST["name"]);
        $statement2->execute();
        $result = $statement2->fetch(\PDO::FETCH_ASSOC);
        $container_id = $result["container_id"];

        $statement3 = $conn->prepare("UPDATE users SET container_id = $container_id");
        $statement3->execute();

        header("Location: ../public/dashboard.php");
    }
}
