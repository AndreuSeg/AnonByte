<?php

require "../db/connection.php";
include("../include/header.php");

?>

<body>
    <nav>
        <a href="./dashboard.php">
            <img src="../static/img/logo.png" alt="logo">
        </a>
        <a class="logout" href="../auth/logout.php">
            <button>Logout</button>
        </a>
    </nav>
    <div class="padre">
        <div class="panel-user">
            <div class="contenedores">
                <h2>Tus contenedores</h2>
                <ul>
                    <p>1</p>
                    <p>2</p>
                    <p>3</p>
                </ul>
            </div>
            <div class="imagenes">
                <h2>Tus imagenes</h2>
                <ul>
                    <p>1</p>
                    <p>2</p>
                    <p>3</p>
                </ul>
                <p>Puedes encontrar las imagenes que buscas en: <a href="https://hub.docker.com/search?q=">Docker hub</a></p>
            </div>
            <div class="volumenes">
                <h2>Tus volumenes</h2>
                <ul>
                    <p>1</p>
                    <p>2</p>
                    <p>3</p>
                </ul>
            </div>
            <div class="redes">
                <h2>Tus redes</h2>
                <ul>
                    <p>1</p>
                    <p>2</p>
                    <p>3</p>
                </ul>
            </div>
            <div class="docker-compose">
                <h2>Docker-compose</h2>
            </div>
        </div>
    </div>
    </div>

    <?php include("../include/footer.php"); ?>
