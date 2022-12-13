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
        <div class="suges-y-form">
            <div class="sugerencias">
                <h1>
                    Cosas importantes a tener en cuenta!
                </h1>
                <h5>
                    Los puertos por defecto de <b>nginx</b> son: 80 y 433. Aunque es recomendable poner siempre el 80,
                    ya que el 443 es para cuando tienes un certificado ssl
                </h5>
                <h5>
                    El puerto por defecto de <b>mysql</b> es: 3306
                </h5>
                <h5>
                    <b>PhpMyAdmin</b> es una aplicación, y normalmente va por el puerto 80, pero si tienes un nginx,
                    nuestra recomendación seria que le pusieras otro prueto, por ejemplo el peurto 8080
                </h5>
                <h5>
                    Cuando se defina la version de cada servicio, se tiene que poner el nombre del servicio, ex: php.
                    Y acompadñado de : la version, o latest, indicando que es la ultima version. <br>
                    Ejemplo: <b>php:latest , nginx:alpine , mysql:5.7</b>
                </h5>
            </div>
            <div class="opciones">
                <label for="service">Seleciona el servicio que quieres crear</label>
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
    </div>

    <?php include("../include/footer.php"); ?>
