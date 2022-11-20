<?php

require "../db/connection.php";
include("../include/header.php");

?>
<body>
    <nav>
        <a href="">
            <img src="../static/img/logo.png" alt="logo">
        </a>
        <a class="logout" href="../../auth/logout.php">
            <button>Logout</button>
        </a>
    </nav>
    <div class="padre2">
        <div class="tittle">
            <h1>Para empezar tienes que crearte una red.</h1>
            <h4>Solo se puede tener una red por usuario, y todos tus contenedores tienen que estar en esa red.</h4>
        </div>
            <form class="section-input" action="../containers/network.php" method="POST">
                <label for="network_name">
                    <span>Nombre de la red</span>
                    <input type="text" name="network_name" id="network_name" autofocus autocomplete="off">
                </label>
                <button type="submit" class="submit-btn">Crear red</button>
            </form>
        </div>
    </div>

    <?php include("../include/footer.php"); ?>
