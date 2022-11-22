<?php

require "../db/connection.php";

$error = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["email"]) || empty($_POST["password"])) {
        $error = "Please fill all the fileds.";
        header("Location: ../public/login_fail.php");
    } else if (!str_contains($_POST["email"], "@")) {
        $error = "Email format is incorrect.";
        header("Location: ../public/login_fail.php");
    } else {
        $statement = $conn->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
        $statement->bindParam(":email", $_POST["email"]);
        $statement->execute();

        if ($statement->rowCount() == 0) {
            $error = "Invalid credentials.";
            header("Location: ../public/login_fail.php");
        } else {
            $user = $statement->fetch(PDO::FETCH_ASSOC);

            if (!password_verify($_POST["password"], $user["password"])) {
                $error = "Invalid credentials.";
                header("Location: ../public/login_fail.php");
            } else {

                session_start();

                unset($user["password"]);

                $_SESSION = $user;

                $statement2 = $conn->prepare("SELECT n.user_id FROM networks n INNER JOIN users u ON u.user_id = n.user_id");
                $statement2->execute();
                $result = $statement2->fetch(\PDO::FETCH_ASSOC);
                // $userNetwork = $result["network_name"];

                if ($result != false) {
                    header("Location: ../public/dashboard.php");
                } else {
                    header("Location: ../public/create-network-user.php");
                }
            }
        }
    }
}
