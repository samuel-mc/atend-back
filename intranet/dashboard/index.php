<main class="main">
    <section class="main__content" id="main">
        <header class="main__header--servicios">
            <section>
                <h2>Servicios</h2>
                <button 
                    class="button button--primary"
                    onclick="filtrarServicioPorEstatus('activos')";
                    id="botonActivos"
                >Activos</button>
                <button 
                    class="button button--primary"
                    onclick="filtrarServicioPorEstatus('futuros')";
                    id="botonFuturos"
                >Futuros</button>
                <button 
                    class="button button--primary"
                    onclick="filtrarServicioPorEstatus('pasados')";
                    id="botonPasados"
                >Pasados</button>
            </section>

            <section>
                <button class="button button--primary button--filter" onclick="showModal()" id="buttonFiltrar">
                    <i class="fa-solid fa-filter"></i>
                        Filtrar
                    <i class="fa-solid fa-chevron-down"></i>
                </button>
                <button class="button button--circle button--primary" onclick="generarPdf()" >
                    <i class="fa-solid fa-download"></i>
                </button>
                <div class="main__modal main__modal--filtrar" id="modalFiltrado">
                    <div>
                        <button
                            class="button button--primary button--circle"
                            onclick="closeModal()"
                        >
                            <i class="fa-solid fa-x"></i>
                        </button>
                    </div>
                    <form id="formFiltrado">
                        <div>
                            <label for="fechaFiltro">Fecha</label>
                            <input type="date" name="fechaFiltro" id="fechaFiltro">
                        </div>
                        
                        <div>
                            <label for="clienteFiltro">Cliente</label>
                            <select name="clienteFiltro" id="clienteFiltro">
                                <option value="0">Seleccionar cliente</option>
                                <?php
                                    foreach ($clients as $cliente) {
                                        echo '<option value="'.$cliente['id'].'">'.$cliente['name']. ' ' .$cliente['lastname'].'</option>';
                                    }
                                ?>
                            </select>
                        </div>

                        <div>
                            <label for="pacienteFiltro">Paciente</label>
                            <select name="pacienteFiltro" id="pacienteFiltro">
                                <option value="0">Seleccionar paciente</option>
                                <?php
                                    foreach ($patients as $paciente) {
                                        echo '<option value="'.$paciente['id'].'">'.$paciente['name']. '</option>';
                                    }
                                ?>
                            </select>
                        </div>

                        <div>
                            <label for="servicioFiltro">Servicio</label>
                            <select name="servicioFiltro" id="servicioFiltro">
                                <option value="0">Seleccionar servicio</option>
                                <?php
                                    foreach ($service_types as $servicio) {
                                        echo '<option value="'.$servicio['id'].'">'.$servicio['name'].'</option>';
                                    }
                                ?>
                            </select>
                        </div>

                        <div>
                            <label for="prestadorFiltro">Prestador</label>
                            <select name="prestadorFiltro" id="prestadorFiltro">
                                <option value="0">Seleccionar prestador</option>
                                <?php
                                    foreach ($providers as $prestador) {
                                        echo '<option value="'.$prestador['id'].'">'.$prestador['name'].'</option>';
                                    }
                                ?>
                            </select>
                        </div>

                        <div>
                            <label for="estatusFiltro">Estatus</label>
                            <select name="estatusFiltro" id="estatusFiltro">
                                <option value="0">Seleccionar estatus</option>
                                <?php foreach($service_status as $status) {
                                        echo '<option value="'.$status['id'].'">'.$status['name'].'</option>';
                                    }   
                                ?>
                            </select>
                        </div>
                        <div class="form__field form__field--doble">
                            <button type="submit" class="button button--primary">Filtrar</button>
                            <button 
                                type="button" 
                                class="button button--primary button--circle" 
                                onclick="resetFiltros()"
                            >
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </section>
        </header>

        <table class="main__table" id="tablaServicios">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Paciente</th>
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
        <div id="elementH"></div>

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

<script> //Script para desplegar los datos en la tabla
    let servicios = [];
    $.ajax({
        url: 'bridge/routes.php?action=get_services_table',
        type: 'GET',
        success: function(data) {
            servicios = JSON.parse(data);
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
                        <p>${element.date.split(" ")[0]}</p>
                        <!-- <button class="buttonEditarFecha" onclick="editFecha()">
                            ${element.date.split(" ")[0]}
                        </button> -->
                    </td>
                    <td>${element.id}</td>
                    <td>
                        <a href="./cliente/${element.client.id}">
                            ${element.client.name} ${element.client.lastname}
                        </a>
                    </td>
                    <td>
                        <a href="./servicios-paciente/${element.patient.id}">
                            ${element.patient.name}
                        </a>
                    </td>
                    <td>${element?.service?.name} - ${element?.duration}</td>
                    <td class="td__editable">
                        ${element.provider?(element.provider.name+" "+element.provider.lastname):"Por asignar"}
                        <button 
                            class="buttonEditar"
                            onclick="editarPrestador(this, ${element.id})"
                        >
                            <i class="fa-solid fa-pencil"></i>
                        </button>
                    </td>
                    <td class="td__editable">
                        <span id="tdCosto${element?.cost?.id}">
                            $ ${element?.cost?.cost ? element.cost.cost : '0'}
                        </span>
                        <button
                            onclick="showEditarModal(this, 'cost', ${element?.id}, ${element?.cost?.cost})"
                            class="button--edit"
                        >
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                    </td>
                    <td class="td__editable">
                        <span>
                        $ ${element?.cost?.eca_cost ? element?.cost?.eca_cost : '$0'}
                        </span>
                        <button 
                            onclick="showEditarModal(this, 'eca_cost', ${element?.id}, ${element?.cost?.eca_cost})"
                            class="button--edit"
                        >
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                    </td>
                    <td class="td__editable">
                        <span>
                        $ ${element?.cost?.extra_cost ? element?.cost?.extra_cost : '0'}
                        </span>
                        <button
                            onclick="showEditarModal(this, 'extra_cost', ${element?.id}, ${element?.cost?.extra_cost})"
                            class="button--edit"
                        >
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                    </td>
                    <td>
                        <a href="./bitacora/${element.id}">
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
                    <i class="fa-solid fa-x"></i>
                </button>
            </div>
            <form id="formEditarCosto" onsubmit="handleEditSubmit(event)">
                <input type="hidden" name="idCosto" id="idCosto" value="${idCosto}">
                <input type="hidden" name="aplica" id="aplica" value="${aplica}">

                <div>
                    <label for="recurrencia">Recurrencia</label>
                    <select name="recurrencia" id="recurrencia">
                        <option value="1">De aquí en adelante</option>
                        <option value="2">Única ocasión</option>
                        <option value="3">Todos</option>
                    </select>
                </div>
    
                <div>
                    <label for="monto">Monto</label>
                    <input id="monto${idCosto}" name="monto" type="text" value="${costo}">
                </div>
    
                <div>
                    <label for="comentario">Comentario</label>
                    <input name="comentario" id="comentario" type="text" value="">
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
        const idCosto = document.getElementById('idCosto').value;
        const aplica = document.getElementById('aplica'); // Esta variable determina el valor del "aplica a" (ya sea cliente, eca o extras);
        const recurrencia = document.getElementById('recurrencia');
        const monto = document.getElementById(`monto${idCosto}`);
        const comentario = document.getElementById('comentario');
        
        let data = {
            recurrency: recurrencia.value,
            reason: $("#comentario").val(),
            id: idCosto
        }
        data[aplica.value] = monto.value;
        $.ajax({
            url: 'bridge/routes.php?action=update_cost',
            type: 'GET',
            data,
            success: function(resp) {
                alert('Información actualizada');
                showingModalEditarCosto = false;
                if (aplica.value === 'cost') {
                    servicios.forEach(element => {
                        if (element.cost.id === parseInt(idCosto)) {
                            element.cost.cost = monto.value;
                        }
                    });
                } else if (aplica.value === 'eca_cost') {
                    servicios.forEach(element => {
                        if (element.cost.id === parseInt(idCosto)) {
                            element.cost.eca_cost = monto.value;
                        }
                    });
                } else if (aplica.value === 'extra_cost') {
                    servicios.forEach(element => {
                        if (element.cost.id === parseInt(idCosto)) {
                            element.cost.extra_cost = monto.value;
                        }
                    });
                }
                event.target.parentNode.remove();
                fillindexTable(servicios);               
            }
        });
    }
</script>

<script> //Script para manejar el filtro de la tabla
    const modalFiltrado = document.getElementById('modalFiltrado');
    modalFiltrado.style.display = 'none';
    function showModal() {
        modalFiltrado.style.display = 'block';
    }
    function closeModal() {
        modalFiltrado.style.display = 'none';
    }
    function resetFiltros() {
        document.getElementById('fechaFiltro').value = '';
        document.getElementById('clienteFiltro').value = '0';
        document.getElementById('pacienteFiltro').value = '0';
        document.getElementById('servicioFiltro').value = '0';
        document.getElementById('prestadorFiltro').value = '0';
        document.getElementById('estatusFiltro').value = '0';
        fillindexTable(servicios);       
        closeModal();
    }


    const formFiltrado = document.getElementById('formFiltrado');
    formFiltrado.addEventListener('submit', (event) => {
        event.preventDefault();
        let fechaFiltro = document.getElementById('fechaFiltro').value;
        let clienteFiltro = document.getElementById('clienteFiltro').value;
        let pacienteFiltro = document.getElementById('pacienteFiltro').value;
        let servicioFiltro = document.getElementById('servicioFiltro').value;
        let prestadorFiltro = document.getElementById('prestadorFiltro').value;
        let estatusFiltro = document.getElementById('estatusFiltro').value;
        let servicioFiltrados = [...servicios];
        
        if (fechaFiltro !== '') {
            servicioFiltrados = servicios.filter(servicio => {
                return servicio.date.split(' ').includes(fechaFiltro);
            });
        }
        if (clienteFiltro !== '0') {
            servicioFiltrados = servicios.filter(servicio => {
                return servicio.client.id === parseInt(clienteFiltro)
            });
        }
        if (pacienteFiltro !== '0') {
            servicioFiltrados = servicioFiltrados.filter(servicio => {
                return servicio.patient.id === parseInt(pacienteFiltro);
            });
        };
        if (servicioFiltro !== '0') {
            servicioFiltrados = servicioFiltrados.filter(servicio => {
                return servicio.service_type === parseInt(servicioFiltro);
            });
        }
        if (prestadorFiltro !== '0') {
            servicioFiltrados = servicioFiltrados.filter(servicio => {
                return servicio.provider.id === parseInt(prestadorFiltro);
            });
        }
        if (estatusFiltro !== '0') {
            servicioFiltrados = servicioFiltrados.filter(servicio => {
                return servicio.service_status === parseInt(estatusFiltro);
            });
        }

        console.log("servicioFiltrados", servicioFiltrados);
        fillindexTable(servicioFiltrados);       
        closeModal();
    });

</script>

<script> //Script para la funcionalidad de la barra de búsqueda.
    const searchButton = document.getElementById('searchButton');
    searchButton.style.display = 'none';

    const searchInput = document.getElementById('searchInput');
    searchInput.addEventListener('keyup', (event) => {
        let searchValue = event.target.value;
        console.log(searchValue);
        let servicioFiltrados = [...servicios];
        if (searchValue !== '') {
            servicioFiltrados = servicios.filter(servicio => {
                return (servicio?.client?.name + ' ' + servicio?.client?.lastname).toLowerCase().includes(searchValue.toLowerCase()) ||
                    servicio?.patient?.name.toLowerCase().includes(searchValue.toLowerCase()) ||
                    servicio?.service?.name.toLowerCase().includes(searchValue.toLowerCase()) ||
                    (servicio?.provider?.name + ' ' + servicio?.provider?.lastname).toLowerCase().includes(searchValue.toLowerCase()) ||
                    servicio?.duration.toLowerCase().includes(searchValue.toLowerCase()) ||
                    servicio?.date.toLowerCase().includes(searchValue.toLowerCase()) ||
                    servicio?.cost.cost.toString().includes(searchValue.toLowerCase()) ||
                    servicio?.cost.eca_cost.toString().includes(searchValue.toLowerCase()) ||
                    servicio?.cost.extra_cost.toString().includes(searchValue.toLowerCase())
            });
        }
        searchButton.style.display = 'flex';
        fillindexTable(servicioFiltrados);               
    });
    const clearSearch = () => {
        searchInput.value = '';
        searchButton.style.display = 'none';
        fillindexTable(servicios);       
    };
</script>

<script> //Script para manejar el editado de la fecha
    const editFecha = () => {
        console.log('editFecha');
    }
</script>

<script>
    const filtrarServicioPorEstatus = (estatus) => {
        let servicioFiltrados = [...servicios];
        const FECHA_HOY = new Date();
        const FECHA_HOY_STRING = FECHA_HOY.getFullYear() + '-0' + (FECHA_HOY.getMonth() + 1) + '-' + FECHA_HOY.getDate();        

        if (estatus === 'activos') {
            botonActivos.classList.add('active');
            botonFuturos.classList.remove('active');
            botonPasados.classList.remove('active');
            servicioFiltrados = servicios.filter(servicio => {
                return servicio.date.split(' ')[0] === FECHA_HOY_STRING;

            });
        } else if (estatus === 'pasados') {
            botonActivos.classList.remove('active');
            botonFuturos.classList.remove('active');
            botonPasados.classList.add('active');
            servicioFiltrados = servicios.filter(servicio => {
                return servicio.date.split(' ')[0] < FECHA_HOY_STRING;
            });            
        } else if (estatus === 'futuros') {
            botonActivos.classList.remove('active');
            botonFuturos.classList.add('active');
            botonPasados.classList.remove('active');
            servicioFiltrados = servicios.filter(servicio => {
                return servicio.date.split(' ')[0] > FECHA_HOY_STRING;
            });
            servicioFiltrados.sort((a, b) => {
                return new Date(a.date) - new Date(b.date);
            });
        }
        console.log("servicioFiltrados", servicioFiltrados);
        fillindexTable(servicioFiltrados);
    }
</script>

<script> // Script para manejar la edicion de prestadora
    let estaEditandoPrestador = false;

    const editarPrestador = (element, idServicio) => {
        console.log('editPrestador');
        if (estaEditandoPrestador) {
            return;
        }

        $.ajax({
            url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=get_possible_provider",
            data:{
                service_id:idServicio
            },
            success: function(res) {
                res = JSON.parse(res)
                console.log(res);
                console.log(idServicio);
                const modalEditandoPrestado = document.createElement('div');
                modalEditandoPrestado.classList.add('main__modal', 'main__modal--edit');
                modalEditandoPrestado.innerHTML = `       
                    <div>
                        <button
                            class="button button--primary button--circle"
                            onclick="closeModalEditarPrestadora(this)"
                        >
                            <i class="fa-solid fa-x"></i>
                        </button>
                    </div>
                    <form id="formEditandoPrestador" onsubmit="handlePrestadorSubmit(event)">
                        <input type="hidden" name="idServicio" value="${idServicio}">
                        <div class="form-group">
                            <label for="prestador">Prestador</label>
                            <select class="form-control" id="nuevoPrestador">
                                <option value="0">Seleccione una prestadora</option>
                                <optgroup label="---Recomendados---">
                                    ${res.recommended.map(prestadora => `
                                        <option value="${prestadora.id}">${prestadora.name} ${prestadora.lastname}</option>
                                    `).join('')}
                                </optgroup>
                                <optgroup label="---Otros---">
                                    ${res.not_recommended.map(prestadora => `
                                        <option value="${prestadora.id}">${prestadora.name} ${prestadora.lastname}</option>
                                    `).join('')}
                                </optgroup>
                            </select>
                        </div>
                        <button type="submit" class="button button--primary button--submit">
                            Guardar
                        </button>
                    </form>
                `;
                element.parentNode.appendChild(modalEditandoPrestado);
                estaEditandoPrestador = true;
            }
        })

    }

    const closeModalEditarPrestadora = (element) => {
        element.parentNode.parentNode.remove();
        estaEditandoPrestador = false;
    }

    const handlePrestadorSubmit = (event) => {
        event.preventDefault();
        const nuevoPrestador = event.target.nuevoPrestador.value;
        const idServicio = event.target.idServicio.value;
        const provider = $("#nuevoPrestador").val();

        console.log("provider", provider);

        const data = {
            id: idServicio,
            provider_id: nuevoPrestador
        }

        $.ajax({
            url: 'bridge/routes.php?action=update_provider',
            type: 'GET',
            data,
            success: function(resp) {
                alert('Información actualizada');
                servicios.forEach(element => {
                    if (element.id === parseInt(idServicio)) {
                        element.provider = provider[0];
                    }
                });
                fillindexTable(servicios);
                closeModalEditarPrestadora(event.target.parentNode);
                location.reload(true);
            }
        });
    }

</script>

<!-- <script type="text/javascript" src="<?php echo __ROOT__; ?>/intranet/assets/js/paginate.js"></script> -->