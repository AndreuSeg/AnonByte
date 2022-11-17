<?php include("../include/header.php"); ?>

<body>
    <?php include("../include/navbar_other.php") ?>
    <div class="padre">
        <div class="register">
            <h1>Registrate en <span>AnonByte</span></h1>
            <form class="section-inputs" action="../auth/register.php" method="POST">
                <label for="name">
                    <span>Name</span>
                    <input type="text" name="name" id="name" placeholder="Nombre" autofocus autocomplete="off">
                </label>
                <label for="lastname">
                    <span>Last Name</span>
                    <input type="text" name="lastname" id="lastname" placeholder="Apellidos" autocomplete="off">
                </label>
                <label for="email">
                    <span>Email</span>
                    <input type="email" name="email" id="email" placeholder="Email" autocomplete="off">
                </label>
                <label for="password">
                    <span>Password</span>
                    <input type="password" name="password" id="password" placeholder="Password" autocomplete="off">
                </label>
                <button class="btn-register" type="submit">Crear cuenta</button>
                <p>¿Ya tienes cuenta?<br><a href="./login_page.php">¡Inicia sesión!</a></p>
            </form>
        </div>
    </div>

    <?php include("../include/footer.php"); ?>
