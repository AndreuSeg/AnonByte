<?php

require "../db/connection.php";
include("../include/header.php");

$statement = $conn->prepare("SELECT network_name FROM networks n INNER JOIN users u ON n.network_id = u.network_id");
$statement->execute();
$result = $statement->fetch(\PDO::FETCH_ASSOC);
$network_name = $result["network_name"];

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
                <a href="./form-container.php">Crear contenedor</a><br>
            </div>
            <div class="network">
                <h2>Tu red propia</h2>
                <h3 class="nameNetwork"><?php echo $network_name ?></h3>
            </div>
        </div>
    </div>

    <?php include("../include/footer.php"); ?>
