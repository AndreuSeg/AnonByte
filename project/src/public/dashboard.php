<?php

require "../db/connection.php";
include("../include/header.php");

$statement = $conn->prepare("SELECT network_name FROM networks n INNER JOIN users u ON n.network_id = u.network_id");
$statement->execute();
$result = $statement->fetch(\PDO::FETCH_ASSOC);
$networkName = $result["network_name"];

$statement2 = $conn->prepare("SELECT container_name FROM containers c INNER JOIN users u ON c.container_id = u.container_id");
$statement2->execute();
$result = $statement2->fetch(\PDO::FETCH_ASSOC);
$containerName = $result["container_name"];

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
                <h3 class="nameNetwork"><?php echo $networkName ?></h3>
            </div>
        </div>
    </div>

    <?php include("../include/footer.php"); ?>
