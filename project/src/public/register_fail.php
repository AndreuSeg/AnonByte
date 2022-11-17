<?php

require "../db/connection.php";
include("../include/header.php");

?>

<body>
    <?php include("../include/navbar_other.php")?>
    <div class="fail">
        <img src="../static/img/giphy.gif" alt="Error">
        <h1>UPS!!!</h1>
        <h1>Algo ha salido mal</h1>
        <h3>Rellena todos los campos correctamente!</h3>
        <a href="../public/register_page.php">Vuleve a la pagina de registro</a>
    </div>
    <?php include("../include/footer.php"); ?>
