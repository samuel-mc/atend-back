<main class="main">
    <section class="main__content" id="main">
        <header class="main__header--servicios">
            <section>
                <h2>Servicios</h2>
            </section>

            <section>
                <button class="button button--primary button--filter" id="buttonFiltrar">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                        <path
                            d="M3.853 54.87C10.47 40.9 24.54 32 40 32H472C487.5 32 501.5 40.9 508.1 54.87C514.8 68.84 512.7 85.37 502.1 97.33L320 320.9V448C320 460.1 313.2 471.2 302.3 476.6C291.5 482 278.5 480.9 268.8 473.6L204.8 425.6C196.7 419.6 192 410.1 192 400V320.9L9.042 97.33C-.745 85.37-2.765 68.84 3.854 54.87L3.853 54.87z" />
                    </svg>
                    Filtrar
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                        <path
                            d="M192 384c-8.188 0-16.38-3.125-22.62-9.375l-160-160c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L192 306.8l137.4-137.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-160 160C208.4 380.9 200.2 384 192 384z" />
                    </svg>
                </button>
                <button class="button button--circle button--primary">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                        <path
                            d="M480 352h-133.5l-45.25 45.25C289.2 409.3 273.1 416 256 416s-33.16-6.656-45.25-18.75L165.5 352H32c-17.67 0-32 14.33-32 32v96c0 17.67 14.33 32 32 32h448c17.67 0 32-14.33 32-32v-96C512 366.3 497.7 352 480 352zM432 456c-13.2 0-24-10.8-24-24c0-13.2 10.8-24 24-24s24 10.8 24 24C456 445.2 445.2 456 432 456zM233.4 374.6C239.6 380.9 247.8 384 256 384s16.38-3.125 22.62-9.375l128-128c12.49-12.5 12.49-32.75 0-45.25c-12.5-12.5-32.76-12.5-45.25 0L288 274.8V32c0-17.67-14.33-32-32-32C238.3 0 224 14.33 224 32v242.8L150.6 201.4c-12.49-12.5-32.75-12.5-45.25 0c-12.49 12.5-12.49 32.75 0 45.25L233.4 374.6z" />
                    </svg>
                </button>
            </section>
        </header>

        <table class="main__table">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>ID</th>
                    <th>Servicio</th>
                    <th>Prestador(a)</th>
                    <th>Cliente</th>
                    <th>ECA</th>
                    <th>Extras</th>
                    <th>Bitacora</th>
                </tr>
            </thead>
            <tbody id="serviciosTable">
                <!-- <tr>
                    <td>
                        <button class="buttonEditarFecha">
                            21.03.2021
                        </button>
                    </td>
                    <td>000 – 00</td>
                    <td>Enf Gral –12hrs </td>
                    <td>
                        Jane Doe
                        <a>
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                    </td>
                    <td>
                        $1,500
                        <a>    
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                    </td>
                    <td>
                        $ 500
                        <a>
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                    </td>
                    <td>
                        $ 120
                        <a>
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                    </td>
                    <td>
                        <a href="./bitacora">
                            Ver Bitácora
                        </a>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <button class="buttonEditarFecha">
                            21.03.2021
                        </button>
                    </td>
                    <td>000 – 00</td>
                    <td>Enf Gral –12hrs </td>
                    <td>
                        Jane Doe
                        <a>
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                    </td>
                    <td>
                        $1,500
                        <a>    
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                    </td>
                    <td>
                        $ 500
                        <a>
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                    </td>
                    <td>
                        $ 120
                        <a>
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                    </td>
                    <td>
                        N/A
                    </td>
                </tr> -->
            </tbody>
        </table>

        <footer class="main__footer">
            <div class="footer__progress--number">
                1 de 16
            </div>
            <div class="footer__progress--buttons">
                <button class="button--transparent">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M224 480c-8.188 0-16.38-3.125-22.62-9.375l-192-192c-12.5-12.5-12.5-32.75 0-45.25l192-192c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25L77.25 256l169.4 169.4c12.5 12.5 12.5 32.75 0 45.25C240.4 476.9 232.2 480 224 480z"/></svg>
                </button>

                <button class="button--transparent">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z"/></svg>
                </button>
            </div>
        </footer>
    </section>
</main>

<script>
    const paciente = <?php echo json_encode($patient); ?>;
    console.log(paciente);

    const serviciosTable = document.getElementById('serviciosTable');

    const fillServicesTable = (service) => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>
                <button class="buttonEditarFecha">
                    ${service.date}
                </button>
            </td>
            <td>${service.id}</td>
            <td>${service.service_type.name} – ${service.duration.name} </td>
            <td>
                ${service.provider ? service.provider.name + service.provider.lastname : 'N/A'}
                <a>
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>
            </td>
            <td>
                $ ${service.costs.cost}
                <a>    
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>
            </td>
            <td>
                $ ${service.costs.eca_cost}
                <a>
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>
            </td>
            <td>
                $ ${service.costs.extra_cost}
                <a>
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>
            </td>
            <td>
                <a href="./bitacora">
                    Ver Bitácora
                </a>
            </td>
        `;
        serviciosTable.appendChild(row);
    }

    if (paciente.services) {
        paciente.services.forEach(service => {
            fillServicesTable(service);
        });
    } else {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td colspan="8">
                <p>
                    No hay servicios registrados
                </p>
            </td>
        `;
        serviciosTable.appendChild(row);
    }
</script>