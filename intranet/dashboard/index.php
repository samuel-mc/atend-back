<main class="main">
    <section class="main__content" id="main">
        <header class="main__header--servicios">
            <section>
                <h2>Servicios</h2>
                <button class="button button--primary">Activos</button>
                <button class="button button--primary active">Futuros</button>
                <button class="button button--primary">Pasados</button>
            </section>

            <section>
                <button class="button button--primary button--filter" id="buttonFiltrar">
                    <i class="fa-solid fa-filter"></i>
                        Filtrar
                    <i class="fa-solid fa-chevron-down"></i>
                </button>
                <button class="button button--circle button--primary">
                    <i class="fa-solid fa-download"></i>
                </button>
            </section>
        </header>

        <table class="main__table">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Servicio</th>
                    <th>Prestador(a)</th>
                    <th>Cliente</th>
                    <th>ECA</th>
                    <th>Extras</th>
                </tr>
            </thead>
            <tbody id="indexTable">
                <tr class="table__row--disable">
                    <td>21.03.2021</td>
                    <td>000 – 00</td>
                    <td>
                        <a href="">
                            Enrique Fuentes F
                        </a>
                    </td>
                    <td>Enf Gral –12hrs </td>
                    <td>
                        <span id="name_1">Jane Doe</span>
                        <i class="fa-solid fa-pencil" onclick="cambiarNombre(1)"></i>
                    </td>
                    <td>
                        $1,500
                        <i class="fa-solid fa-pencil"></i>
                    </td>
                    <td>
                        $ 500
                        <i class="fa-solid fa-pencil"></i>
                    </td>
                    <td>
                        $ 120
                        <i class="fa-solid fa-pencil"></i>
                    </td>
                </tr>
            </tbody>
        </table>

        <footer class="main__footer">
            <div class="footer__progress--bar">
                <span></span>
            </div>
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


<script> //Script para desplegar los datos en la tabla
    $.ajax({
        url: 'bridge/routes.php?action=get_services_table',
        type: 'GET',
        success: function(data) {
            console.log(JSON.parse(data));
            fillindexTable(JSON.parse(data));
        }
    });

    /**
     * Funcion para insertar las fillas con datos en la tabla
     * @param {array} data 
     */
    const indexTable = document.getElementById('indexTable');
    const fillindexTable = (data) => {
        let table = '';
        data.forEach(element => {
            table += `
                <tr>
                    <td>
                        <button class="buttonEditarFecha">
                            ${element.date}
                        </button>
                    </td>
                    <td>${element.id}</td>
                    <td>
                        <a href="./cliente/${element.client.id}">
                            ${element.client.name}
                        </a>
                    </td>
                    <td>${element.service_type}</td>
                    <td>${element.provider.name} ${element.provider.lastname}</td>
                    <td class="td__editable">
                        $ ${element.cost.cost ? element.cost.cost : '0'}
                        <button onclick="showEditarModal(this, 'cliente', ${element?.id}, ${element?.cost.cost})">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                    </td>
                    <td class="td__editable">
                        ${element.cost.eca_cost ? element.cost.eca_cost : '$0'}
                        <button onclick="showEditarModal(this, 'eca', ${element?.id}, ${element?.cost.eca_cost})">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                    </td>
                    <td class="td__editable">
                        ${element.cost.extra_cost ? element.cost.extra_cost : '$0'}
                        <button onclick="showEditarModal(this, 'extra', ${element?.id}, ${element?.cost.extra_cost})">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                    </td>
                    <td>
                        <a href="./bitacora">
                            Ver Bitácora
                        </a>
                    </td>
                </tr>
            `;
        });
        indexTable.innerHTML = table;
    }
</script>

<script> //Script para editar los datos de la tabla
    /**
     * Funcion para mostrar el modal de editar
     * @param {Element} boton
     * @param {Number} idCosto
     * @param {Number} cost 
     */
    let showingModalEditarCosto = false;
    function showEditarModal(boton, aplica, idCosto, costo) {
        const modalEditarCosto = document.createElement("div");
        modalEditarCosto.classList.add('main__modal', 'main__modal--edit');
        modalEditarCosto.setAttribute('id', 'modalEdit');
        modalEditarCosto.innerHTML =
            `<div>
                <button
                    class="button button--primary button--circle"
                    onclick="closeModalEditarCosto(this)"
                >
                    X
                </button>
            </div>
            <form id="formEditarCosto" onsubmit="handleEditSubmit(event)">
                <input type="hidden" name="idCosto" id="idCosto" value="${idCosto}">
                <input type="hidden" name="aplica" id="aplica" value="${aplica}">
                <!-- <label for="aplica">Aplica a</label>
                    <select name="aplica" id="aplica">
                        <option value="0">Cliente</option>
                        <option value="101011">Foo</option>
                        <option value="101012">Foo</option>
                    </select> -->

                <div>
                    <label for="recurrencia">Recurrencia</label>
                    <select name="recurrencia" id="recurrencia">
                        <option value="0">De aquí en adelante</option>
                        <option value="101011">Foo</option>
                        <option value="101012">Foo</option>
                    </select>
                </div>
    
                <div>
                    <label for="monto">Monto</label>
                    <input id="monto" name="monto" type="text" value="$ ${costo}">
                </div>
    
                <div>
                    <label for="comentario">Comentario</label>
                    <input name="comentario" id="comentario" type="text" value="EPP y transporte de ECA">
                </div>
                <button type="submit" class="button button--primary button--submit">
                    Guardar
                </button>
            </form>
            `;
        if (!showingModalEditarCosto) {
            boton.parentNode.appendChild(modalEditarCosto);
            showingModalEditarCosto = true;
        }
    }

    /**
     * Funcion para cerrar el modal de editar
     * @param {Element} boton
     */
    const closeModalEditarCosto = (botonCerrar) => {
        botonCerrar.parentNode.parentNode.remove();
        showingModalEditarCosto = false;
    }

    /**
     * Funcion para enviar los datos del formulario de editar
     * @param {Event} event 
     */
    const handleEditSubmit = (event) => {
        event.preventDefault();
        const aplica = document.getElementById('aplica'); // Esta variable determina el valor del "aplica a" (ya sea cliente, eca o extras);
        const recurrencia = document.getElementById('recurrencia');
        const monto = document.getElementById('monto');
        const comentario = document.getElementById('comentario');
        const data = {
            aplica: aplica.value,
            recurrencia: recurrencia.value,
            monto: monto.value,
            comentario: comentario.value,
            idCosto: idCosto.value
        }
        $.ajax({
            url: 'bridge/routes.php?action=update_cost',
            type: 'POST',
            data: data,
            success: function(data) {
                alert('Información actualizada');
                window.location.reload();
            }
        });
    }
</script>