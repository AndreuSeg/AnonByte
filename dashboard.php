<?php require "database.php"; ?>

<?php include("include/header.php"); ?>

<body>
    <nav>
        <a href="./dashboard.php">
            <img src="./static/img/logo.png" alt="logo">
        </a>
    </nav>
    <div class="padre">
        <div class="panel-user">
            <div class="section">
                <p>MVs</p>
            </div>
            <div class="section">
                <p>DHCP</p>
            </div>
            <div class="section">
                <p>DNS</p>
            </div>
            <div class="section">
                <p>Correo</p>
            </div>
        </div>
    </div>

    <?php include("include/footer.php"); ?>