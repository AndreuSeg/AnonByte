<?php include("../include/header.php"); ?>

<body>
    <?php include("../include/navbar_other.php"); ?>
    <div class="padre">
        <form class="contact-form" action="../data/contact.php" method="post">
            <div class="info">
                <h1>Contacta con nosotros</h1>
                <label for="name">
                    <span>Name</span>
                    <input type="text" name="name" id="name" type="name" placeholder="Name">
                </label>
                <label for="email">
                    <span>Email</span>
                    <input type="email" name="email" id="email" type="email" placeholder="Email">
                </label>
                <label for="name">
                    <span>Message</span>
                    <input type="text" name="message" id="message" type="message" placeholder="Message">
                </label>
                <button type="submit" class="submit-btn">Enviar</button>
            </div>
        </form>
    </div>

    <?php include("../include/footer.php"); ?>
