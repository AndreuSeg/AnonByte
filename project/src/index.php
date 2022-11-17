<?php

require "./db/connection.php";
include("./include/header.php");

?>

<body>
    <?php include("./include/navbar_index.php"); ?>
    <div class="padre">
        <div class="home-page">
            <div class="empezar">
                <h1>¿Quieres empezar ya <br> y no sabes como?</h1>
                <div class="animation">
                    <h4>Pues registrate ya en AnonByte</h4>
                    <a href="./public/register_page.php"><button type="submit">Empieza ya!</button></a>
                </div>
            </div>
            <img class="iceberg" src="./static/img/iceberg.png" alt="Iceberg">
        </div>
    </div>

    <?php include("./include/footer.php"); ?>
