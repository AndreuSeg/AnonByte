<?php

require "../db/connection.php";
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
            <div class="user">
                <div class="containers">
                    <h2>Tus contenedores</h2>
                    <a href="./form-container.php">Crear contenedor</a>
                </div>
                <div class="networks">
                    <h2>Tus redes</h2>
                </div>
            </div>
        </div>
    </div>

    <?php include("../include/footer.php"); ?>
