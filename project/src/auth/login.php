<?php

require "../db/connection.php";

$error = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["email"]) || empty($_POST["password"])) {
        $error = "Please fill all the fileds.";
        return $error;
    } else if (!str_contains($_POST["email"], "@")) {
        $error = "Email format is incorrect.";
        return $error;
    } else {
        $statement = $conn->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
        $statement->bindParam(":email", $_POST["email"]);
        $statement->execute();

        if ($statement->rowCount() == 0) {
            $error = "Invalid credentials.";
            return $error;
        } else {
            $user = $statement->fetch(PDO::FETCH_ASSOC);

            if (!password_verify($_POST["password"], $user["password"])) {
                $error = "Invalid credentials.";
                return $error;
            } else {
                session_start();

                unset($user["password"]);

                $_SESSION["user"] = $user;

                header("Location: ../public/dashboard.php");
            }
        }
    }
}
?>
