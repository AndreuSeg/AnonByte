<?php include("../include/header.php"); ?>

<body>
    <nav>
        <a href="./index.php">
            <img src="../static/img/logo.png" alt="logo">
        </a>
    </nav>
    <div class="padre">
        <div class="register">
            <h1>Registrate en <span>AnonByte</span></h1>
            <form class="section-inputs" action="../auth/register.php" method="POST">
                <label for="name">
                    <span>Name</span>
                    <input type="text" name="name" id="name" type="text" autofocus>
                </label>
                <label for="lastname">
                    <span>Last Name</span>
                    <input type="text" name="lastname" id="lastname" type="text" autofocus>
                </label>
                <label for="email">
                    <span>Email</span>
                    <input type="email" name="email" id="email" type="email" autofocus>
                </label>
                <label for="password">
                    <span>Password</span>
                    <input type="password" name="password" id="password" type="password" autofocus>
                </label>
                <button type="submit">Crear cuenta</button>
            </form>
        </div>
    </div>

    <?php include("../include/footer.php"); ?>