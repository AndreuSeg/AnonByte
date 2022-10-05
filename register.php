<?php

require "database.php";

$error = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"]) || empty($_POST["lastname"]) || empty($_POST["email"]) || empty($_POST["password"])) {
        $error = "Please fill all the fileds.";
    } else if (!str_contains($_POST["email"], "@")) {
        $error = "Email format is incorrect.";
    } else {
        $statement = $conn->prepare("SELECT * FROM users WHERE email = :email");
        $statement->bindParam(":email", $_POST["email"]);
        $statement->execute();

        if ($statement->rowCount() > 0) {
            $error = "Invalid credentials.";
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

            header("Location: login.php");
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
        <div class="register">
            <h1>Registrate en <span>AnonByte</span></h1>
            <form class="section-inputs" action="./register.php" method="POST">
                <label for="name">
                    <span>Name</span>
                    <input type="text" name="name" id="name" type="text" autofocus>
                </label>
                <label for="lastname">
                    <span>Last Name</span>
                    <input type="text" name="lastname" id="lastname" type="text" autofocus>
                </label>
                <label for="email">
                    <span>Email</span>
                    <input type="email" name="email" id="email" type="email" autofocus>
                </label>
                <label for="password">
                    <span>Password</span>
                    <input type="password" name="password" id="password" type="password" autofocus>
                </label>
                <button type="submit">Crear cuenta</button>
            </form>
        </div>
    </div>

    <?php include("include/footer.php"); ?>