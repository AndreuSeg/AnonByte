<?php

require "../db/connection.php";
session_start();

include("../include/header.php");
?>

<body>
    <nav>
        <a href="./dashboard.php">
            <img src="../static/img/logo.png" alt="logo">
        </a>
        <a class="logout" href="../../auth/logout.php">
            <button>Logout</button>
        </a>
    </nav>
    <div class="padre">
        <div class="panel-user">
            <div class="containers">
                <h2>Tus contenedores</h2>
                <h3 class="nameContainer">
                    <?php
                    $statement = $conn->prepare("SELECT container_name FROM containers c INNER JOIN users u ON c.user_id = u.user_id WHERE c.user_id = :user_id");
                    $statement->bindParam(":user_id", $_SESSION["user_id"]);
                    $statement->execute();
                    $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
                    for ($i = 0; $i < sizeof($result); $i++) {
                        $containerName = $result[$i]["container_name"];
                        echo $containerName. "<br>";
                    }
                    ?>
                </h3>
                <a href="./form-container.php">Crear contenedor</a><br>
            </div>
            <div class="network">
                <h2>Tu red propia</h2>
                <h3 class="nameNetwork">
                    <?php
                    $statement2 = $conn->prepare("SELECT network_name FROM networks n INNER JOIN users u ON n.user_id = u.user_id WHERE n.user_id = :user_id");
                    $statement2->bindParam(":user_id", $_SESSION["user_id"]);
                    $statement2->execute();
                    $result = $statement2->fetchAll(\PDO::FETCH_ASSOC);
                    for ($i = 0; $i < sizeof($result); $i++) {
                        $networkName = $result[$i]["network_name"];
                        echo $networkName;
                    }
                    ?>
                </h3>
            </div>
        </div>
    </div>

    <?php include("../include/footer.php"); ?>
