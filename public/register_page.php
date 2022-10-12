<?php include("../include/header.php"); ?>

<body>
    <?php include("../include/navbar_other.php") ?>
    <div class="padre">
        <div class="register">
            <h1>Registrate en <span>AnonByte</span></h1>
            <form class="section-inputs" action="../auth/register.php" method="POST">
                <label for="name">
                    <span>Name</span>
                    <input type="text" name="name" id="name" type="text" placeholder="Nombre" autofocus autocomplete="off">
                </label>
                <label for="lastname">
                    <span>Last Name</span>
                    <input type="text" name="lastname" id="lastname" type="text" placeholder="Apellidos" autocomplete="off">
                </label>
                <label for="email">
                    <span>Email</span>
                    <input type="email" name="email" id="email" type="email" placeholder="Email" autocomplete="off">
                </label>
                <label for="password">
                    <span>Password</span>
                    <input type="password" name="password" id="password" type="password" placeholder="Password" autocomplete="off">
                </label>
                <button type="submit">Crear cuenta</button>
            </form>
        </div>
    </div>

    <?php include("../include/footer.php"); ?>