<?php include("../include/header.php"); ?>

<body>
    <nav>
        <a href="./index.php">
            <img src="../static/img/logo.png" alt="logo">
        </a>
    </nav>
    <div class="padre">
        <div class="login">
            <h1>Inicia sesion en <span>AnonByte</span></h1>
            <form class="section-inputs" action="../auth/login.php" method="POST">
                <label for="email">
                    <span>Email</span>
                    <input type="email" name="email" id="email" type="email" autofocus>
                </label>
                <label for="password">
                    <span>Password</span>
                    <input type="password" name="password" id="password" type="password" autofocus>
                </label>
                <button type="submit" class="submit-btn">Iniciar sesion</button>
            </form>
        </div>
    </div>

    <?php include("../include/footer.php"); ?>