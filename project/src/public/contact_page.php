<?php require "../db/connection.php"; ?>

<?php include("../include/header.php"); ?>

<body>
    <?php include("../include/navbar_index.php"); ?>
    <div class="padre">
        <form class="contact-form" action="../forms/contact.php" method="post">
            <div class="info">
                <h1>Contacta con nosotros</h1>
                <label for="name">Nombre</label>
                <input type="text" name="name" placeholder="Introduce tu nombre aqui">
                <label for="email">Email</label>
                <input type="email" name="email" placeholder="Introduce tu email aqui">
                <label for="message">Consulta</label>
                <input type="text" name="message" placeholder="Escribe tu consulta aqui">
                <button type="submit">Enviar</button>
            </div>
        </form>
    </div>

    <?php include("../include/footer.php"); ?>
