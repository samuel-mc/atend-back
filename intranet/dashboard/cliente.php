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
                <button class="button button--circle button--primary" onclick="generarPdf()">
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
                    <th>Paciente</th>
                    <th>Servicio</th>
                    <th>Prestador(a)</th>
                    <th>Cliente</th>
                    <th>ECA</th>
                    <th>Extras</th>
                    <th>Estatus</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="table_data">
                <tr class="table__row--disable">
                    <td>21.03.2021</td>
                    <td>000 – 00</td>
                    <td>Enrique Fuentes F</td>
                    <td>Enf Gral –12hrs </td>
                    <td>
                        Jane Doe
                        #aquiVaUnBotonEditar
                    </td>
                    <td>
                        $1,500
                         #aquiVaUnBotonEditar
                    </td>
                    <td>
                        $ 500
                         #aquiVaUnBotonEditar
                    </td>
                    <td>
                        $ 120
                         #aquiVaUnBotonEditar
                    </td>
                    <td class="main__table--estatus">
                        <span class="disable"> ● </span> Sin registro 
                         #aquiVaUnBotonEditar
                    </td>
                    <td>
                        <i class="fa-solid fa-trash-can"></i>
                    </td>
                </tr>
                
                <tr>
                    <td>21.03.2021</td>
                    <td>000 – 00</td>
                    <td>Enrique Fuentes F</td>
                    <td>Enf Gral –12hrs </td>
                    <td>
                        Jane Doe
                        <a>
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td>
                        $1,500
                        <a>    
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td>
                        $ 500
                        <a>
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td>
                        $ 120
                        <a>
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td class="main__table--estatus">
                        <span class="green"> ● </span> A tiempo 
                        <a>
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td>
                        <i class="fa-solid fa-trash-can"></i>
                    </td>
                </tr>
                
                <tr>
                    <td>21.03.2021</td>
                    <td>000 – 00</td>
                    <td>Enrique Fuentes F</td>
                    <td>Enf Gral –12hrs </td>
                    <td>
                        Jane Doe
                        <a>
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td>
                        $1,500
                        <a>    
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td>
                        $ 500
                        <a>
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td>
                        $ 120
                        <a>
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td class="main__table--estatus">
                        <span class="red"> ● </span> No llegó 
                        <a>
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td>
                        <i class="fa-solid fa-trash-can"></i>
                    </td>
                </tr>
                
                <tr>
                    <td>21.03.2021</td>
                    <td>000 – 00</td>
                    <td>Enrique Fuentes F</td>
                    <td>Enf Gral –12hrs </td>
                    <td>
                        Jane Doe
                        <a>
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td>
                        $1,500
                        <a>    
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td>
                        $ 500
                        <a>
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td>
                        $ 120
                        <a>
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td class="main__table--estatus">
                        <span class="yellow"> ● </span> Llegó tarde 
                        <a>
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td>
                        <i class="fa-solid fa-trash-can"></i>
                    </td>
                </tr>

                <tr>
                    <td>21.03.2021</td>
                    <td>000 – 00</td>
                    <td>Enrique Fuentes F</td>
                    <td>Enf Gral –12hrs </td>
                    <td>
                        Jane Doe
                        <a>
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td>
                        $1,500
                        <a>    
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td>
                        $ 500
                        <a>
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td>
                        $ 120
                        <a>
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td class="main__table--estatus">
                        <span class="green"> ● </span> A tiempo 
                        <a>
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td>
                        <i class="fa-solid fa-trash-can"></i>
                    </td>
                </tr>

                <tr>
                    <td>21.03.2021</td>
                    <td>000 – 00</td>
                    <td>Enrique Fuentes F</td>
                    <td>Enf Gral –12hrs </td>
                    <td>
                        Jane Doe
                        <a>
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td>
                        $1,500
                        <a>    
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td>
                        $ 500
                        <a>
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td>
                        $ 120
                        <a>
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td class="main__table--estatus">
                        <span class="green"> ● </span> A tiempo 
                        <a>
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td>
                        <i class="fa-solid fa-trash-can"></i>
                    </td>
                </tr>

                <tr class="table__row--disable">
                    <td>21.03.2021</td>
                    <td>000 – 00</td>
                    <td>Enrique Fuentes F</td>
                    <td>Enf Gral –12hrs </td>
                    <td>
                        Jane Doe
                        <a>
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td>
                        $1,500
                        <a>    
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td>
                        $ 500
                        <a>
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td>
                        $ 120
                        <a>
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td class="main__table--estatus">
                        <span class="disable"> ● </span> Sin registro 
                        <a>
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td>
                        <i class="fa-solid fa-trash-can"></i>
                    </td>
                </tr>

                <tr>
                    <td>21.03.2021</td>
                    <td>000 – 00</td>
                    <td>Enrique Fuentes F</td>
                    <td>Enf Gral –12hrs </td>
                    <td>
                        Jane Doe
                        <a>
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td>
                        $1,500
                        <a>    
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td>
                        $ 500
                        <a>
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td>
                        $ 120
                        <a>
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td class="main__table--estatus">
                        <span class="green"> ● </span> A tiempo 
                        <a>
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td>
                        <i class="fa-solid fa-trash-can"></i>
                    </td>
                </tr>

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
    let pacientes = [];
    $.ajax({
        url: '<?php echo __ROOT__; ?>/bridge/routes.php?action=get_services_by_client',
        type: 'GET',
        data:{
            client_id:<?php echo $client['id']; ?>
        },
        success: function(data) {
            pacientes = JSON.parse(data);
            console.log(JSON.parse(data));
            fillindexTable(JSON.parse(data));
        }
    });

    const fillindexTable = (data) => {
        let table = '';
        data.forEach(element => {
            table += `<tr>
                <td>
                    <button class="buttonEditarFecha">
                        ${element.date.split(" ")[0]}
                    </button>
                </td>
                <td>${element.id}</td>
                <td>
                    <a href="<?php echo __ROOT__; ?>/servicios-paciente/${element.patient?.id}">
                        ${element.patient?.name}
                    </a>
                </td>
                <td>${element.service?.name} - ${element.duration}</td>
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
                    $ ${element.cost.cost ? element.cost.cost : '$ 0'}
                    <button 
                        onclick="showEditarModal(this, 'cost', ${element?.id}, ${element?.cost.cost})"
                        class="button--edit"
                    >    
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                </td>
                <td class="td__editable">
                    $ ${element.cost.eca_cost ? element.cost.eca_cost : '0'}
                    <button 
                        onclick="showEditarModal(this, 'eca_cost', ${element?.id}, ${element?.cost.eca_cost})"
                        class="button--edit"

                    >
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                </td>
                <td class="td__editable">
                    $ ${element.cost.extra_cost ? element.cost.extra_cost : '0'}
                    <button 
                        onclick="showEditarModal(this, 'extra_cost', ${element?.id}, ${element?.cost.extra_cost})"
                        class="button--edit"
                    >    
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                </td>
                <td class="td__editable main__table--estatus">
                    <span class="disable"> ● </span> ${element.status.name} 
                    <button class="buttonEditar" onclick="showStatusModal(this, ${element?.id})">
                        <i class="fa-solid fa-pencil"></i>
                    </button>
                </td>
                <td>
                    <button class="buttonEditar" onclick="eliminarServicio(${element.id})">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </td>
            </tr>`;
        });
        $("#table_data").html(table);
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
                <!-- <label for="aplica">Aplica a</label>
                    <select name="aplica" id="aplica">
                        <option value="0">Cliente</option>
                        <option value="101011">Foo</option>
                        <option value="101012">Foo</option>
                    </select> -->

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
                    <input id="monto" name="monto" type="text" value="${costo}">
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
        const aplica = document.getElementById('aplica'); // Esta variable determina el valor del "aplica a" (ya sea cliente, eca o extras);
        const recurrencia = document.getElementById('recurrencia');
        const monto = document.getElementById('monto');
        const comentario = document.getElementById('comentario');
        
        let data = {
            recurrency: recurrencia.value,
            reason: $("#comentario").val(),
            id: idCosto.value
        }
        data[aplica.value] = monto.value;
        $.ajax({
            url: '<?php echo __ROOT__; ?>/bridge/routes.php?action=update_cost',
            type: 'GET',
            data,
            success: function(resp) {
                alert('Información actualizada');
                showingModalEditarCosto = false;
                if(aplica.value === 'cost') {
                    pacientes.forEach(element => {
                        if(element.id == idCosto.value) {
                            element.cost.cost = monto.value;
                        }
                    });
                } else if(aplica.value === 'eca_cost') {
                    pacientes.forEach(element => {
                        if(element.id == idCosto.value) {
                            element.cost.eca_cost = monto.value;
                        }
                    });
                } else if(aplica.value === 'extra_cost') {
                    pacientes.forEach(element => {
                        if(element.id == idCosto.value) {
                            element.cost.extra_cost = monto.value;
                        }
                    });
                }
                event.target.parentNode.remove();
                fillindexTable(pacientes);
                //window.location.reload();
            }
        });
    }
</script>

<script> //Script para editar el status del pacientes.
    let showingModalEditarStatus = false;
    function showStatusModal(boton, idServicio) {
        console.log('llegó', idServicio);
        const modalEditarStatus = document.createElement("div");
        modalEditarStatus.classList.add('main__modal', 'main__modal--edit');
        modalEditarStatus.setAttribute('id', 'modalEdit');
        modalEditarStatus.innerHTML =
            `<div>
                <button
                    class="button button--primary button--circle"
                    onclick="closeModalEditarCosto(this)"
                >
                    <i class="fa-solid fa-x"></i>
                </button>
            </div>
            <form id="formEditarCosto" onsubmit="handleUpdateStatus(event)">
                <input type="hidden" name="idServicio" id="idServicio" value="${idServicio}"> 
                <div>
                    <label for="newStatus">Estatus</label>
                    <select name="newStatus" id="newStatus">
                        <?php foreach($service_status as $status) {
                                echo '<option value="'.$status['id'].'">'.$status['name'].'</option>';
                            }   
                        ?>
                    </select>
                </div>
                <button type="submit" class="button button--primary button--submit">
                    Guardar
                </button>
            </form>
            `;
        if (!showingModalEditarCosto) {
            boton.parentNode.appendChild(modalEditarStatus);
            showingModalEditarCosto = true;
        }
    };
    const handleUpdateStatus = (event) => {
        event.preventDefault();
        const statuses = <?php echo json_encode($service_status); ?>;

        const newStatus = document.getElementById('newStatus').value;
        const idServicio = document.getElementById('idServicio').value;
        const status = statuses.filter(status => status.id == parseInt(newStatus))[0];

        const data = {
            id: idServicio,
            status: newStatus
        }

        console.log(status);

        $.ajax({
            url: '<?php echo __ROOT__; ?>/bridge/routes.php?action=update_status',
            type: 'GET',
            data,
            success: function(resp) {
                alert('Información actualizada');
                pacientes.forEach(element => {
                    if (element.id === parseInt(idServicio)) {
                        element.status = status;
                    }
                });
                showingModalEditarCosto = false;
                event.target.parentNode.remove();
                fillindexTable(pacientes);
            }
        });

    }

</script>

<script> //Script para filtrar los pacientes
    const modalFiltrado = document.getElementById('modalFiltrado');
    modalFiltrado.style.display = 'none';
    function showModal() {
        modalFiltrado.style.display = 'block';
    }
    function closeModal() {
        modalFiltrado.style.display = 'none';
    }

    let fechaFiltro = null;
    let pacienteFiltro = null;
    let servicioFiltro = null;
    let prestadorFiltro = null;
    let estatusFiltro = null;
    const formFiltrado = document.getElementById('formFiltrado');
    formFiltrado.addEventListener('submit', (event) => {
        event.preventDefault();
        fechaFiltro = document.getElementById('fechaFiltro').value;
        pacienteFiltro = document.getElementById('pacienteFiltro').value;
        servicioFiltro = document.getElementById('servicioFiltro').value;
        prestadorFiltro = document.getElementById('prestadorFiltro').value;
        estatusFiltro = document.getElementById('estatusFiltro').value;
        let pacientesFiltrados = [...pacientes];
        if (fechaFiltro !== '') {
            pacientesFiltrados = pacientesFiltrados.filter(paciente => {
                return paciente.date.split(' ').includes(fechaFiltro);
            });
        }
        if (pacienteFiltro !== '0') {
            pacientesFiltrados = pacientesFiltrados.filter(paciente => {
                return paciente.patient.id === parseInt(pacienteFiltro);
            });
        };
        if (servicioFiltro !== '0') {
            pacientesFiltrados = pacientesFiltrados.filter(paciente => {
                return paciente.service.id === parseInt(servicioFiltro);
            });
        }
        if (prestadorFiltro !== '0') {
            pacientesFiltrados = pacientesFiltrados.filter(paciente => {
                return paciente.provider.id === parseInt(prestadorFiltro);
            });
        }
        if (estatusFiltro !== '0') {
            pacientesFiltrados = pacientesFiltrados.filter(paciente => {
                return paciente.service_status === parseInt(estatusFiltro);
            });
        }
        console.log("pacientesFiltrados", pacientesFiltrados);
        fillindexTable(pacientesFiltrados);

        closeModal();
    });

    function resetFiltros() {
        document.getElementById('fechaFiltro').value = '';
        document.getElementById('pacienteFiltro').value = '0';
        document.getElementById('servicioFiltro').value = '0';
        document.getElementById('prestadorFiltro').value = '0';
        document.getElementById('estatusFiltro').value = '0';
        fillindexTable(pacientes);
        closeModal();
    }
</script>

<script> //Script para filtrar los pacientes por status
    const filtrarServicioPorEstatus = (estatus) => {
        let servicioFiltrados = [...pacientes];
        const FECHA_HOY = new Date();
        const FECHA_HOY_STRING = FECHA_HOY.getFullYear() + '-0' + (FECHA_HOY.getMonth() + 1) + '-' + FECHA_HOY.getDate();        

        if (estatus === 'activos') {
            botonActivos.classList.add('active');
            botonFuturos.classList.remove('active');
            botonPasados.classList.remove('active');
            servicioFiltrados = pacientes.filter(servicio => {
                return servicio.date.split(' ')[0] === FECHA_HOY_STRING;

            });
        } else if (estatus === 'pasados') {
            botonActivos.classList.remove('active');
            botonFuturos.classList.remove('active');
            botonPasados.classList.add('active');
            servicioFiltrados = pacientes.filter(servicio => {
                return servicio.date.split(' ')[0] < FECHA_HOY_STRING;
            });
        } else if (estatus === 'futuros') {
            botonActivos.classList.remove('active');
            botonFuturos.classList.add('active');
            botonPasados.classList.remove('active');
            servicioFiltrados = pacientes.filter(servicio => {
                return servicio.date.split(' ')[0] > FECHA_HOY_STRING;
            });
        }
        fillindexTable(servicioFiltrados);
    }
</script>

<script> // Script para manejar la edicion de prestadora    
    const prestadoras = <?php echo json_encode($providers); ?>;
    
    let estaEditandoPrestador = false;

    const editarPrestador = (element, idServicio) => {
        console.log('editPrestador');
        if (estaEditandoPrestador) {
            return;
        }
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
                        <option value="0">Por asignar</option>
                        ${prestadoras.map(prestadora => `
                            <option value="${prestadora.id}">${prestadora.name} ${prestadora.lastname}</option>
                        `).join('')}
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

    const closeModalEditarPrestadora = (element) => {
        element.parentNode.parentNode.remove();
        estaEditandoPrestador = false;
    }

    const handlePrestadorSubmit = (event) => {
        event.preventDefault();
        const nuevoPrestador = event.target.nuevoPrestador.value;
        const idServicio = event.target.idServicio.value;
        const provider = prestadoras.filter(prestadora => prestadora.id === parseInt(nuevoPrestador));

        const data = {
            id: idServicio,
            provider_id: nuevoPrestador
        }

        $.ajax({
            url: '<?php echo __ROOT__; ?>/bridge/routes.php?action=update_provider',
            type: 'GET',
            data,
            success: function(resp) {
                alert('Información actualizada');
                closeModalEditarPrestadora(event.target.parentNode);
                pacientes.forEach(element => {
                    if (element.id === parseInt(idServicio)) {
                        element.provider = provider[0];
                    }
                });
                fillindexTable(pacientes);
            }
        });
    }

</script>

<script> //Script para eliminar un paciente
    const eliminarServicio = (id) => {
        console.log('eliminarServicio: ', id);
        if (confirm('¿Está seguro de eliminar este servicio?')) {
            $.ajax({
                url: '<?php echo __ROOT__; ?>/bridge/routes.php?action=delete_service',
                type: 'GET',
                data: {
                    id
                },
                success: function(resp) {
                    alert('Servicio eliminado');
                    pacientes = pacientes.filter(paciente => paciente.id !== id);
                    fillindexTable(pacientes);
                }
            });
        }
    }
</script>

<script> //Script para mostrar el saldo de un cliente
    const clientBalance = <?php echo json_encode($client_balance); ?>;
    let saldo = 0;
    clientBalance?.forEach(element => {
        saldo += parseFloat(element?.amount);
    });
    document.getElementById('saldoCliente').innerHTML = ` $${saldo}`;

</script>

<script> //Script para la funcionalidad de la barra de búsqueda.
    const searchInput = document.getElementById('searchInput');
    searchInput.addEventListener('keyup', (event) => {
        let searchValue = event.target.value;        
        let servicioFiltrados = [...pacientes];
        if (searchValue !== '') {
            servicioFiltrados = pacientes.filter(servicio => {
                return (servicio?.patient?.name.toLowerCase().includes(searchValue.toLowerCase()) ||
                    servicio?.service?.name.toLowerCase().includes(searchValue.toLowerCase()) ||
                    (servicio?.provider?.name + ' ' + servicio?.provider?.lastname).toLowerCase().includes(searchValue.toLowerCase()) ||
                    servicio?.duration.toLowerCase().includes(searchValue.toLowerCase()) ||
                    servicio?.date.toLowerCase().includes(searchValue.toLowerCase()) ||
                    servicio?.cost.cost.toString().includes(searchValue.toLowerCase()) ||
                    servicio?.cost.eca_cost.toString().includes(searchValue.toLowerCase()) ||
                    servicio?.cost.extra_cost.toString().includes(searchValue.toLowerCase())
                )});
        }        
        fillindexTable(servicioFiltrados);
    });
    const clearSearch = () => {
        searchInput.value = '';
        searchButton.style.display = 'none';
        fillindexTable(pacientes);
    };
</script>