<?php

require "../db/connection.php";

$error = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["container_name"]) || empty($_POST["port_i"]) || empty($_POST["port_e"]) || empty($_POST["MYSQL_root_psw"]) || empty($_POST["mysql"])) {
        $error = "Please fill all the fileds.";
        header("Location: ../public/form-container.php");
    } else {

        $statement = $conn->prepare("INSERT INTO containers (container_name, container_image, port_i, port_e, MYSQL_root_psw) VALUES (:container_name, :container_image, :port_i, :port_e, :MYSQL_root_psw)");
        $statement->execute([
            ":container_name" => $_POST["container_name"],
            ":container_image" => $_POST["mysql"],
            ":port_i" => $_POST["port_i"],
            ":port_e" => $_POST["port_e"],
            ":MYSQL_root_psw" => password_hash($_POST["MYSQL_root_psw"], PASSWORD_BCRYPT)
        ]);

        session_start();
        $statement2 = $conn->prepare("Select u.user_id FROM users u INNER JOIN networks n ON u.user_id = n.user_id WHERE u.user_id = :user_id");
        $statement2->bindParam(":user_id", $_SESSION["user_id"]);
        $statement2->execute();
        $result = $statement2->fetch(\PDO::FETCH_ASSOC);
        $userID = $result["user_id"];

        $statement3 = $conn->prepare("UPDATE containers SET user_id = $userID WHERE container_name = :container_name");
        $statement3->bindParam(":container_name", $_POST["container_name"]);
        $statement3->execute();

        $statement4 = $conn->prepare("SELECT network_id FROM networks n INNER JOIN users u ON n.user_id = u.user_id WHERE n.user_id = :user_id");
        $statement4->bindParam(":user_id", $_SESSION["user_id"]);
        $statement4->execute();
        $result2 = $statement4->fetch(\PDO::FETCH_ASSOC);
        $networkId = $result2["network_id"];

        $statement5 = $conn->prepare("UPDATE containers SET network_id = $networkId WHERE container_name = :container_name");
        $statement5->bindParam(":container_name", $_POST["container_name"]);
        $statement5->execute();

        header("Location: ../public/dashboard.php");
    }
}
