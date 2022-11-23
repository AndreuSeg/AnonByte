<?php

require "../db/connection.php";
session_start();

$statement = $conn->prepare("SELECT network_name FROM networks n INNER JOIN users u ON n.user_id = u.user_id WHERE n.user_id = :user_id");
$statement->bindParam(":user_id", $_SESSION["user_id"]);
$statement->execute();
$result = $statement->fetchAll(\PDO::FETCH_ASSOC);
for ($i = 0; $i < sizeof($result); $i++) {
    $networkName = $result[$i]["network_name"];
}

// $statement2 = $conn->prepare("SELECT container_name FROM containers c INNER JOIN users u ON c.container_id = u.container_id");
// $statement2->execute();
// $result2 = $statement2->fetch(\PDO::FETCH_ASSOC);
// $containerName = $result2["container_name"];

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
                <h3 class="nameContainer"><?php echo $containerName ?></h3>
                <a href="./form-container.php">Crear contenedor</a><br>
            </div>
            <div class="network">
                <h2>Tu red propia</h2>
                <h3 class="nameNetwork">
                    <?php
                        echo $networkName;
                    ?>
                </h3>
            </div>
        </div>
    </div>

    <?php include("../include/footer.php"); ?>
