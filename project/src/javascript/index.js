function servicio() {
    const service = document.querySelector('.service').value
    return service
}

function renderForm() {
    const service = servicio()

    switch (service) {
        case 'nginx':
            const service1 = document.querySelector('.servicio')
            service1.innerHTML = `
            <form action="../containers/nginx.php" method="POST">
                <div class="section-inputs">
                    <label for="container_name">
                        <span>Nombre del contenedor</span>
                        <input type="text" name="container_name" id="container_name" placeholder="Nombre contenedor" autocomplete="off">
                    </label>
                    <label for="port_i">
                        <span>Puerto interior</span>
                        <input type="num" name="port_i" id="port_i" placeholder="Puerto interior" autocomplete="off">
                    </label>
                    <label for="port_e">
                        <span>Puerto exterior</span>
                        <input type="num" name="port_e" id="port_e" placeholder="Puerto exterior" autocomplete="off">
                    </label>
                    <label for="${service}">
                        <span>Versión de ${service}</span>
                        <input type="text" name="${service}" id="${service}" placeholder="${service}" autocomplete="off">
                    </label>
                    <button class="btn-container" type="submit">Crear contenedor ${service}</button>
                </div>
            </form>
            `
            break;
        case 'mysql':
            const service2 = document.querySelector('.servicio')
            service2.innerHTML = `
            <form action="../containers/mysql.php" method="POST">
                <div class="section-inputs">
                    <label for="container_name">
                        <span>Nombre del contenedor</span>
                        <input type="text" name="container_name" id="container_name" placeholder="Nombre contenedor" autocomplete="off">
                    </label>
                    <label for="port_i">
                        <span>Puerto interior</span>
                        <input type="num" name="port_i" id="port_i" placeholder="Puerto interior" autocomplete="off">
                    </label>
                    <label for="port_e">
                        <span>Puerto exterior</span>
                        <input type="num" name="port_e" id="port_e" placeholder="Puerto exterior" autocomplete="off">
                    </label>
                    <label for="MYSQL_root_psw">
                        <span>MYSQL root password</span>
                        <input type="text" name="MYSQL_root_psw" id="MYSQL_root_psw" placeholder="MYSQL root password" autocomplete="off">
                    </label>
                    <label for="${service}">
                        <span>Versión de ${service}</span>
                        <input type="text" name="${service}" id="${service}" placeholder="${service}" autocomplete="off">
                    </label>
                    <button class="btn-container" type="submit">Crear contenedor ${service}</button>
                </div>
            </form>
            `
            break;
        case 'phpmyadmin':
            const service3 = document.querySelector('.servicio')
            service3.innerHTML = `
            <form action="../containers/phpmyadmin.php" method="POST">
                <div class="section-inputs">
                    <label for="container_name">
                        <span>Nombre del contenedor</span>
                        <input type="text" name="container_name" id="container_name" placeholder="Nombre contenedor" autocomplete="off">
                    </label>
                    <label for="port_i">
                        <span>Puerto interior</span>
                        <input type="num" name="port_i" id="port_i" placeholder="Puerto interior" autocomplete="off">
                    </label>
                    <label for="port_e">
                        <span>Puerto exterior</span>
                        <input type="num" name="port_e" id="port_e" placeholder="Puerto exterior" autocomplete="off">
                    </label>
                    <label for="${service}">
                        <span>Versión de ${service}</span>
                        <input type="text" name="${service}" id="${service}" placeholder="${service}" autocomplete="off">
                    </label>
                    <button class="btn-container" type="submit">Crear contenedor ${service}</button>
                </div>
            </form>
            `
            break;
        case 'php':
            const service4 = document.querySelector('.servicio')
            service4.innerHTML = `
            <form action="../containers/php.php" method="POST">
                <div class="section-inputs">
                    <label for="container_name">
                        <span>Nombre del contenedor</span>
                        <input type="text" name="container_name" id="container_name" placeholder="Nombre contenedor" autocomplete="off">
                    </label>
                    <label for="${service}">
                        <span>Versión de ${service}</span>
                        <input type="text" name="${service}" id="${service}" placeholder="${service}" autocomplete="off">
                    </label>
                    <button class="btn-container" type="submit">Crear contenedor ${service}</button>
                </div>
            </form>
            `
            break
    }

}
