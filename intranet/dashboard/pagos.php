<main class="main">
    <section class="main__content" id="main">
        <header class="main__header--servicios">
            <section>
                <h2>Historial de pagos</h2>
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
                                <option value="1">Paciente1</option>
                                <option value="101012">Foo</option>
                            </select>
                        </div>

                        <div>
                            <label for="bancoFiltro">Banco</label>
                            <select name="bancoFiltro" id="bancoFiltro">
                                <option value="0">Seleccionar banco</option>
                                <option value="101011">Foo</option>
                                <option value="101012">Foo</option>
                            </select>
                        </div>

                        <div>
                            <label for="metodoFiltro">Metodo</label>
                            <select name="metodoFiltro" id="metodoFiltro">
                                <option value="0">Seleccionar metodo</option>
                                <option value="101011">Foo</option>
                                <option value="101012">Foo</option>
                            </select>
                        </div>

                        <div>
                            <label for="montoMinimoFiltro">Monto mínimo</label>
                            <input type="number" name="montoMinimoFiltro" id="montoMinimoFiltro" placeholder="Monto mín.">
                        </div>
                        <div>
                            <label for="montoMaximoFiltro">Monto máximo</label>
                            <input type="number" name="montoMaximoFiltro" id="montoMaximoFiltro" placeholder="Monto máx.">
                        </div>
                        <div class="form__field form__field--doble">
                            <button type="submit" class="button button--primary">Filtrar</button>
                            <button 
                                type="button" 
                                class="button button--primary button--circle"
                                onclick="resetForm()"
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
                    <th>Paciente</th>
                    <th>Banco</th>
                    <th>Método</th>
                    <th>Monto</th>
                    <th>Comentarios</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="tableBody"> </tbody>
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
    let showingAcreditarPago = false;
    const modalAcreditarPago = document.createElement('div');
    modalAcreditarPago.classList.add('main__modal', 'main__modal--edit');
    modalAcreditarPago.innerHTML = `
        <header class="main__modal--header modal__acreditar-pago">
            <div>
                <button
                    class="button button--primary button--circle"
                    onclick="closeModalEditarCosto()"
                    id="buttonCloseModalEditarCosto"
                >
                    <i class="fa-solid fa-x"></i>
                </button>
            </div>
            <h2>Acreditar pago</h2>
        </header>
        <form id="formAcreditarPago">
            <div>
                <label for="cantidad">Cantidad del pago</label>
                <input id="cantidad" name="cantidad" type="number" placeholder="Cantidad">
            </div>
            <div>
                <label for="idCliente">Cliente</label>
                <select name="idCliente" id="idCliente">
                    <option value="101010">Mario Vargas</option>
                    <option value="101011">otro</option>
                    <option value="101012">otro</option>
                </select>
            </div>
            <div>
                <label for="idPaciente">Paciente</label>
                <select name="idPaciente" id="idPaciente">
                    <option value="101010">Mario Vargas</option>
                    <option value="101011">Otro</option>
                    <option value="101012">Otro</option>
                </select>
            </div>
            <div>
                <label for="idBanco">Banco</label>
                <select name="idBanco" id="idBanco">
                    <option value="101010">BBVA</option>
                    <option value="101011">Otro</option>
                    <option value="101012">Otro</option>
                </select>
            </div>
            <div>
                <label for="idMetodo">Método</label>
                <select name="idMetodo" id="idMetodo">
                    <option value="101010">Tranferencia</option>
                    <option value="101011">Efectivo</option>
                    <option value="101012">Otro</option>
                </select>
            </div>

            <div>
                <label for="comentario">Comentario</label>
                <input id="comentario" name="comentario" type="text" placeholder="Un comenterio">
            </div>

            <div>
                <input class="button button--primary button--submit" type="submit" value="Guardar">
            </div>

        </form>
        `;

        function showModalAcreditarPago(element) {
            if (!showingAcreditarPago) {
                element.parentNode.appendChild(modalAcreditarPago);
                showingAcreditarPago = true;
            }
            const formAcreditarPago = document.getElementById('formAcreditarPago');
            formAcreditarPago.addEventListener('submit',(e) => submitForm(e, formAcreditarPago));
        }

        function closeModalEditarCosto() {
            const buttonCloseModalEditarCosto = document.getElementById('buttonCloseModalEditarCosto');
            const formAcreditarPago = document.getElementById('formAcreditarPago');
            formAcreditarPago.removeEventListener('submit', (e) => submitForm(e, formAcreditarPago));
            showingAcreditarPago = false;
            buttonCloseModalEditarCosto.parentNode.parentNode.parentNode.remove();
        }

        function submitForm(e, form) {
            e.preventDefault();
            const formData = new FormData(form);
            let data = {}
            formData.forEach((value, key) => {
                data[key] = value;
            });
            console.log(data);
            closeModalEditarCosto();
        }
</script>

<script> //Script para llenar los datos de una tabla
    let pagos = <?php echo json_encode($payments); ?>;
    console.log("pagos", pagos);

    function fillTable(data) {
        const tableBody = document.getElementById('tableBody');
        tableBody.innerHTML = '';
        data.forEach((element) => {
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td>${element.date.split(" ")[0]}</td>
                <td>${element.patient.name}</td>
                <td>${element.bank}</td>
                <td>${element.method}</td>
                <td>${element.amount}</td>
                <td>${element.comments}</td>
                <td class="td__editable">
                    <button 
                        class="button--edit"
                        onclick="handleEditarPago(this, ${element.id}, '${element.date}', '${element.bank}', ${element.amount}, '${element.comments}')"
                    >
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                </td>
                <td>
                    <button class="button--edit" onclick="handleEliminarPago(${element.id})">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </td>
            `;
            tableBody.appendChild(tr);
        });
    }

    fillTable(pagos);
</script>

<script> //Script para filtrar los pagos
    const modalFiltrado = document.getElementById('modalFiltrado');
    modalFiltrado.style.display = 'none';
    function showModal() {
        modalFiltrado.style.display = 'block';
    }
    function closeModal() {
        modalFiltrado.style.display = 'none';
    }
    
    const formFiltrado = document.getElementById('formFiltrado');
    formFiltrado.addEventListener('submit', (e) => {
        e.preventDefault();
        let pagosFiltrados = [...pagos];
        let fechaFiltro = document.getElementById('fechaFiltro').value;
        let pacienteFiltro = document.getElementById('pacienteFiltro').value;
        let bancoFiltro = document.getElementById('bancoFiltro').value;
        let metodoFiltro = document.getElementById('metodoFiltro').value;
        let montoMinimoFiltro = document.getElementById('montoMinimoFiltro').value;
        let montoMaximoFiltro = document.getElementById('montoMaximoFiltro').value;
        if (fechaFiltro != '') {
            pagosFiltrados = pagosFiltrados.filter(pago => pago.date.split(" ").includes(fechaFiltro));
        }
        if (pacienteFiltro != '0') {
            pagosFiltrados = pagosFiltrados.filter(pago => pago.patient.id == pacienteFiltro);
        }
        if (bancoFiltro != '0') {
            pagosFiltrados = pagosFiltrados.filter(pago => pago.bank == bancoFiltro);
        }
        if (metodoFiltro != '0') {
            pagosFiltrados = pagosFiltrados.filter(pago => pago.method == metodoFiltro);
        }
        if (montoMinimoFiltro != '') {
            pagosFiltrados = pagosFiltrados.filter(pago => pago.amount >= montoMinimoFiltro);
        }
        if (montoMaximoFiltro != '') {
            pagosFiltrados = pagosFiltrados.filter(pago => pago.amount <= montoMaximoFiltro);
        }
        fillTable(pagosFiltrados);
        closeModal();
    });

    function resetForm() {
        document.getElementById('fechaFiltro').value = '';
        document.getElementById('pacienteFiltro').value = '0';
        document.getElementById('bancoFiltro').value = '0';
        document.getElementById('metodoFiltro').value = '0';
        document.getElementById('montoMinimoFiltro').value = '';
        document.getElementById('montoMaximoFiltro').value = '';
        fillTable(pagos);
        closeModal();
    }
</script>

<script> //Script para editar un pago
    const metodos = <?php echo json_encode($methods); ?>;
    const pacientes = <?php echo json_encode($patients); ?>;
    console.log("metodos", metodos);
    const handleEditarPago = (button, idPago, fecha, banco, monto, comentario) => {
        const modalEditarPago = document.createElement('div');
        modalEditarPago.classList.add('main__modal', 'main__modal--edit', 'modal__pago');
        modalEditarPago.setAttribute('id', 'modalEdit');

        modalEditarPago.innerHTML = `
            <div>
                <div>
                    <button
                        class="button button--primary button--circle"
                        onclick="closeModalEditarPago(this)"
                    >
                        <i class="fa-solid fa-x"></i>
                    </button>
                </div>
            </div>
            <form id="formEditarPago">
                <input type="hidden" name="idPago" id="idPago" value="${idPago}">

                <div>
                    <label for="fechaPago">Fecha</label>
                    <input id="fechaPago" name="fechaPago" type="date" value="${fecha.split(" ")[0]}">
                </div>

                <div>
                    <label for="paciente">Paciente</label>
                    <select name="paciente" id="paciente">
                        ${pacientes.map(paciente => `
                            <option value="${paciente.id}">${paciente.name}</option>
                        `).join('')}
                    </select>
                </div>

                <div>
                    <label for="bancoPago">Banco</label>
                    <input id="bancoPago" name="bancoPago" type="text" value="${banco}" required>
                </div>

                <div>
                    <label for="metodoPago">Método</label>
                    <select name="metodoPago" id="metodoPago">                        
                        ${metodos.map(metodo => `
                            <option value="${metodo.id}">${metodo.name}</option>
                        `).join('')}
                    </select>
                </div>

                <div>
                    <label for="montoPago">Monto</label>
                    <input id="montoPago" name="montoPago" type="number" value="${monto}" required>
                </div>

                <div>
                    <label for="comentarioPago">Comentario</label>
                    <input name="comentarioPago" id="comentarioPago" type="text" value="${comentario}" required>
                </div>
                <button type="submit" class="button button--primary button--submit">
                    Guardar
                </button>
            </form>`;

        button.parentNode.appendChild(modalEditarPago);       

        formEditarPago = document.getElementById('formEditarPago');
        formEditarPago.addEventListener('submit', (e) => {
            e.preventDefault();
            const idPago = document.getElementById('idPago').value;
            const fechaPago = document.getElementById('fechaPago').value;
            const pacientePago = document.getElementById('paciente').value;
            const bancoPago = document.getElementById('bancoPago').value;
            const metodoPago = document.getElementById('metodoPago').value;
            const montoPago = document.getElementById('montoPago').value;
            const comentarioPago = document.getElementById('comentarioPago').value;

            const data = {
                id: idPago,
                date: fechaPago,
                patient_id: pacientePago,
                bank: bancoPago,
                method_id: metodoPago,
                amount: montoPago,
                comment: comentarioPago
            };

            console.log(e.target);

            $.ajax({
                url: '<?php echo __ROOT__; ?>/bridge/routes.php?action=update_client_payment',
                type: 'GET',
                data,
                success: function(resp) {
                    alert('Se guardo correctamente');
                    formEditarPago.parentNode.remove();
                }
            });
        });
    }

    const closeModalEditarPago = (button) => {
        button.parentNode.parentNode.parentNode.remove();
    }

</script>

<script> //Script para eliminar un pago
    const handleEliminarPago = (id) => {        
        if (confirm('¿Está seguro de eliminar este pago?')) {
            $.ajax({
                url: '<?php echo __ROOT__; ?>/bridge/routes.php?action=delete_client_payment',
                type: 'GET',
                data: {
                    id
                },
                success: function(resp) {
                    alert('Paciente eliminado');
                }
            });
        }
    }
</script>

