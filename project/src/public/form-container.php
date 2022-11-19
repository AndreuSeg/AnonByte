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
        <div class="opciones">
            <label for="service">Seleciona el servicioque quieres crear</label>
            <select class="service" name="service" id="service" onclick="servicio(); renderForm()">
                <option class="option" id="nginx" value="nginx">NGINX</option>
                <option class="option" id="mysql" value="mysql">MYSQL</option>
                <option class="option" id="phpmyadmin" value="phpmyadmin">PhpMyAdmin</option>
                <option class="option" id="php" value="php">php</option>
            </select>
        </div>
        <div class="servicio">
        </div>
    </div>

    <?php include("../include/footer.php"); ?>
