<?php include("../include/header.php"); ?>

<body>
    <?php include("../include/navbar_other.php") ?>
    <div class="padre">
        <div class="login">
            <h1>Inicia sesion en <span>AnonByte</span></h1>
            <form class="section-inputs" action="../auth/login.php" method="POST">
                <label for="email">
                    <span>Email</span>
                    <input type="email" name="email" id="email" type="email" autofocus autocomplete="off">
                </label>
                <label for="password">
                    <span>Password</span>
                    <input type="password" name="password" id="password" type="password" autocomplete="off">
                </label>
                <button type="submit" class="submit-btn">Iniciar sesion</button>
                <p>¿No eres miembro todavía?<br><a href="./register_page.php">¡Registrate!</a>¡Y empieza ya!</p>
            </form>
        </div>
    </div>

    <?php include("../include/footer.php"); ?>
