<?php

require "database.php";

$error = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["email"]) || empty($_POST["password"])) {
        $error = "Please fill all the fileds.";
    } else if (!str_contains($_POST["email"], "@")) {
        $error = "Email format is incorrect.";
    } else {
        $statement = $conn->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
        $statement->bindParam(":email", $_POST["email"]);
        $statement->execute();

        if ($statement->rowCount() == 0) {
            $error = "Invalid credentials.";
        } else {
            $user = $statement->fetch(PDO::FETCH_ASSOC);

            if (!password_verify($_POST["password"], $user["password"])) {
                $error = "Invalid credentials.";
            } else {
                session_start();

                unset($user["password"]);

                $_SESSION["user"] = $user;

                header("Location: dashboard.php");
            }
        }
    }
}
?>


<?php include("include/header.php"); ?>

<body>
    <nav>
        <a href="./index.php">
            <img src="./static/img/logo.png" alt="logo">
        </a>
    </nav>
    <div class="padre">
        <div class="login">
            <h1>Inicia sesion en <span>AnonByte</span></h1>
            <form class="section-inputs" action="./login.php" method="POST">
                <label for="email">
                    <span>Email</span>
                    <input type="email" name="email" id="email" type="email" autofocus>
                </label>
                <label for="password">
                    <span>Password</span>
                    <input type="password" name="password" id="password" type="password" autofocus>
                </label>
                <button type="submit">Iniciar sesion</button>
            </form>
        </div>
    </div>

    <?php include("include/footer.php"); ?>