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
            <div class="section-inputs">
                <label for="name">
                    <span>Nombre del contenedor</span>
                    <input type="text" name="name" id="name" placeholder="Nombre contenedor" autocomplete="off">
                </label>
                <label for="portI">
                    <span>Puerto interior</span>
                    <input type="num" name="PortI" id="portI" placeholder="Puerto interior: Por defecto 80" autocomplete="off">
                </label>
                <label for="portE">
                    <span>Puerto exterior</span>
                    <input type="num" name="portE" id="portE" placeholder="Puerto exterior: Por defecto 80" autocomplete="off">
                </label>
                <label for="${service}">
                    <span>Version de ${service}</span>
                    <input type="text" name="${service}" id="${service}" placeholder="${service}" autocomplete="off">
                </label>
                <button class="btn-container" type="submit">Crear contenedor ${service}</button>
            </div>
            `
            break;
        case 'mysql':
            const service2 = document.querySelector('.servicio')
            service2.innerHTML = `
            <div class="section-inputs">
                <label for="name">
                    <span>Nombre del contenedor</span>
                    <input type="text" name="name" id="name" placeholder="Nombre contenedor" autocomplete="off">
                </label>
                <label for="portI">
                    <span>Puerto interior</span>
                    <input type="num" name="PortI" id="portI" placeholder="Puerto interior: Por defecto 3306" autocomplete="off">
                </label>
                <label for="portE">
                    <span>Puerto exterior</span>
                    <input type="num" name="portE" id="portE" placeholder="Puerto exterior: Por defecto 3306" autocomplete="off">
                </label>
                <label for="root-psw">
                    <span>MYSQL root password</span>
                    <input type="text" name="root-psw" id="root-psw" placeholder="root password" autocomplete="off">
                </label>
                <label for="${service}">
                    <span>Version de ${service}</span>
                    <input type="text" name="${service}" id="${service}" placeholder="${service}" autocomplete="off">
                </label>
                <button class="btn-container" type="submit">Crear contenedor ${service}</button>
            </div>
            `
            break;
        case 'phpmyadmin':
            const service3 = document.querySelector('.servicio')
            service3.innerHTML = `
            <div class="section-inputs">
                <label for="name">
                    <span>Nombre del contenedor</span>
                    <input type="text" name="name" id="name" placeholder="Nombre contenedor" autocomplete="off">
                </label>
                <label for="portI">
                    <span>Puerto interior</span>
                    <input type="num" name="PortI" id="portI" placeholder="Puerto interior: Por defecto 80" autocomplete="off">
                </label>
                <label for="portE">
                    <span>Puerto exterior</span>
                    <input type="num" name="portE" id="portE" placeholder="Puerto exterior: Por defecto 80" autocomplete="off">
                </label>
                <label for="${service}">
                    <span>Version de ${service}</span>
                    <input type="text" name="${service}" id="${service}" placeholder="${service}" autocomplete="off">
                </label>
                <button class="btn-container" type="submit">Crear contenedor ${service}</button>
            </div>
            `
            break;
        case 'php':
            break
    }

}
