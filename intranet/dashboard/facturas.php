<main class="main">
    <section class="main__content" id="main">
        <header class="main__header--servicios">
            <section>
                <h2>Facturación</h2>
            </section>

            <section class="td__editable">
                <button 
                    class="button button--primary button--filter" 
                    id="buttonFiltrar"
                    onclick="handleAddFactura(this)"
                > Nueva Factura
                    <i class="fa-solid fa-upload"></i>
                </button>                
            </section>
        </header>

        <table class="main__table" id="tablaServicios">
            <thead>
                <tr>
                    <th>Periodo</th>
                    <th>Emisor</th>
                    <th>Monto</th>
                    <th>Archivos</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="facturasTable">
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
    const recibos = <?php echo json_encode($billingReceives); ?>;
    console.log(recibos);

    facturasTable.innerHTML = '';
    for (let i = 0; i < recibos.length; i++) {
        const recibo = recibos[i];
        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td>${recibo.start_period} - ${recibo.end_period}</td>
            <td>${recibo.emisor}</td>
            <td>${recibo.amount}</td>
            <td>
                <button class="button--edit" onclick="handleDownloadReceipt(this)">
                    <i class="fa-solid fa-download"></i>
                </button>
            </td>
            <td>
                <!--
                <button class="button--edit" onclick="handleDeleteReceipt(this)">
                    <i class="fa-solid fa-pencil"></i>
                </button>
                <button class="button--edit" onclick="handleDeleteReceipt(this)">
                    <i class="fa-solid fa-trash"></i>
                </button>
                -->
            </td>
        `;
        facturasTable.appendChild(tr);
    }


</script>

<script>
    let showingModalFactura = false;
    const handleAddFactura = (element) => {
        if (showingModalFactura) {
            return;
        }

        const modalAddFactura = document.createElement('div');
        modalAddFactura.classList.add('main__modal', 'main__modal--edit');
        modalAddFactura.innerHTML = `
            <div>
                <button
                    class="button button--primary button--circle"
                    onclick="closeAddFacturas(this)"
                >
                    <i class="fa-solid fa-x"></i>
                </button>
            </div>
            <header class="main__modal--header">
                <h2>Nueva Factura</h2>
            </header> </br> </br>
            <form id="formEditandoPrestador" onsubmit="handleFacturasSubmit(event)">
                <div>
                    <label for="start_period">Fecha Inicio</label>
                    <input name="start_period" id="start_period" type="date" required>
                </div>
                <div>
                    <label for="end_period">Fecha final</label>
                    <input name="end_period" id="end_period" type="date" required>
                </div>
                <div>
                    <label for="emisor">Emisor</label>
                    <input name="emisor" id="emisor" type="text" placeholder="Ingresa el nombre" required>
                </div>
                <div>
                    <label for="amount">Monto</label>
                    <input name="amount" id="amount" type="number" placeholder="Ingresa el monto" required>
                </div>
                <div>
                    <label for="file_1">PDF</label>
                    <input name="file_1" id="file_1" type="file" accept="application/pdf">
                </div>
                <div>
                    <label for="file_2">XML</label>
                    <input name="file_2" id="file_2" type="file" accept="text/xml">
                </div>
                <button type="submit" class="button button--primary button--submit">
                    Guardar
                </button>
            </form>
        `;
        element.parentNode.appendChild(modalAddFactura);
        showingModalFactura = true;
    }

    const closeAddFacturas = (element) => {
        element.parentNode.parentNode.remove();
        showingModalFactura = false;
    }

    const handleFacturasSubmit = (event) => {
        event.preventDefault();
        const start_period = event.target.start_period.value;
        const end_period = event.target.end_period.value;
        const emisor = event.target.emisor.value;
        const amount = event.target.amount.value;
        const file_1 = event.target.file_1.files[0];
        const file_2 = event.target.file_2.files[0];

        data = {
            start_period,
            end_period,
            emisor,
            amount,
            file_1: "pdf",
            file_2: "xml"
        }

        $.ajax({
            url: '<?php echo __ROOT__; ?>/bridge/routes.php?action=save_new_billing_receives',
            type: 'GET',
            data,
            success: function(resp) {
                alert('Se guardo correctamente');
                // renderServicios();
            }
        });
    }

</script>
