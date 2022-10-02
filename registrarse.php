<?php

require "database.php";

$error = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"]) || empty($_POST["lastname"]) || empty($_POST["email"]) || empty($_POST["password"])) {
        $error = "Rellena todos los campos.";
    } else if (!str_contains($_POST["email"], "@")) {
        $error = "Formato email incorrecto.";
    } else {
        $statement = $conn->prepare("SELECT * FROM users WHERE email = :email");
        $statement->bindParam(":email", $_POST["email"]);
        $statement->execute();

        if ($statement->rowCount() > 0) {
            $error = "Hay alguien registrado con este email.";
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

            header("Location: index.php");
        }
    }
}
?>

<?php include("include/header.php"); ?>

<body>
    <nav>
        <img src="./static/img/logo.png" alt="logo">
    </nav>
    <div class="padre">
        <div class="registro">
            <h1>Registrate en <span>AnonByte</span></h1>
            <form class="section-inputs" action="./registrarse.php" method="POST">
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
                <button type="submit">Crear Cuenta</button>
            </form>
        </div>
    </div>

    <?php include("include/footer.php"); ?>