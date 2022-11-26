<?php

require "../db/connection.php";

$error = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"]) || empty($_POST["lastname"]) || empty($_POST["email"]) || empty($_POST["password"])) {
        $error = "Please fill all the fields.";
        header("Location: ../public/register_fail.php");
    } else if (!str_contains($_POST["email"], "@")) {
        $error = "Email format is incorrect.";
        header("Location: ../public/register_fail.php");
    } else {
        $statement = $conn->prepare("SELECT * FROM users WHERE email = :email");
        $statement->bindParam(":email", $_POST["email"]);
        $statement->execute();

        if ($statement->rowCount() > 0) {
            $error = "Invalid credentials.";
            header("Location: ../public/register_fail.php");
        } else {
            $conn
                ->prepare("INSERT INTO users (name, lastname, email, password) VALUES (:name, :lastname, :email, :password)")
                ->execute([
                    ":name" => $_POST["name"],
                    ":lastname" => $_POST["lastname"],
                    ":email" => $_POST["email"],
                    ":password" => password_hash($_POST["password"], PASSWORD_BCRYPT),
                ]);

            $statement = $conn->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
            $statement->bindParam(":email", $_POST["email"]);
            $statement->execute();
            $user = $statement->fetch(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION["user"] = $user;

            header("Location: ../public/login_page.php");
        }
    }
}
