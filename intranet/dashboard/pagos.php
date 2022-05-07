<main class="main">
    <section class="main__content" id="main">
        <header class="main__header--servicios">
            <section>
                <h2>Historial de pagos</h2>
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
                    <th>Paciente</th>
                    <th>Banco</th>
                    <th>Método</th>
                    <th>Monto</th>
                    <th>Comentarios</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($payments as $pay) { ?>
                <tr>
                    <td><?php echo $pay['date']; ?></td>
                    <td><?php echo $pay['patient']['name']; ?></td>
                    <td><?php echo $pay['bank']; ?></td>
                    <td><?php echo $pay['method']; ?></td>
                    <td>$<?php echo $pay['amount']; ?></td>
                    <td><?php echo $pay['comments']; ?></td>
                    <td>
                        <i class="fa-solid fa-pen-to-square"></i>
                    </td>
                    <td>
                        <i class="fa-solid fa-trash"></i>
                    </td>
                </tr>
            <?php } ?>
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