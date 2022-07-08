<main>
    <section class="section--top">
        <div class="main__content cliente__card">
            <header class="cliente__card--header">
                <h2>Saldo Actual</h2>
                <a class="button button--primary active" href="<?php echo __ROOT__; ?>/dashboard/cliente/abono">
                    Hacer un abono
                </a>
            </header>
            <main class="cliente__card--content">
                <h3>Se tienen a favor</h3>
                <p class="cliente__card--monto afavor" id="saldoCliente"></p>
            </main>
            <footer>
                <h3>Este saldo alcanza aprox para: 3 turnos de servicio</h3>
            </footer>
        </div>
        <div class="main__content">
            <header class="cliente__card--header">
                <h2>Facturas</h2>
                <button class="button button--primary active">
                    Ver todas las facturas
                </button>
            </header>
            <main>
                <h3>Periodo</h3>
                <ul class="cliente__facturas-list">
                    <li>
                        <p>19.02.22 – 25.02.22</p>
                        <i class="fa-solid fa-download"></i>
                    </li>
                    <li>
                        <p>19.02.22 – 25.02.22</p>
                        <i class="fa-solid fa-download"></i>
                    </li>
                    <li>
                        <p>19.02.22 – 25.02.22</p>
                        <i class="fa-solid fa-download"></i>
                    </li>
                    <li>
                        <p>19.02.22 – 25.02.22</p>
                        <i class="fa-solid fa-download"></i>
                    </li>
                </ul>
            </main>
        </div>
    </section>
    <div id="balances">

    </div>
    <section class="main__content cliente__table-container">
        <header>
            <h2> Estado de cuenta </h2>
        </header>
                
        <main >
            <table class="main__table">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Paciente</th>
                        <th>Concepto</th>
                        <th>Cobro</th>
                        <th>Abono</th>
                        <th>Saldo</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    <tr>
                        <td>19.02.22</td>
                        <td>María Hernández C</td>
                        <td>Enfermería General 12 horas</td>
                        <td class="text--red">$1,500</td>
                        <td></td>
                        <td class="text--green">$335</td>
                    </tr>
                    <tr>
                        <td>19.02.22</td>
                        <td>Paco Gonzalez</td>
                        <td>Uber enfermera</td>
                        <td class="text--red">$165</td>
                        <td></td>
                        <td class="text--green">$1,835</td>
                    </tr>
                    <tr>
                        <td>19.02.22</td>
                        <td>María Hernández C</td>
                        <td>¡Su pago, gracias!</td>
                        <td></td>
                        <td class="text--green">$2,500</td>
                        <td class="text--green">$2,000</td>
                    </tr>
                    <tr>
                        <td>19.02.22</td>
                        <td>María Hernández C</td>
                        <td>¡Su pago, gracias!</td>
                        <td></td>
                        <td class="text--green">$1,000</td>
                        <td class="text--red">-$500</td>
                    </tr>
                    <tr>
                        <td>19.02.22</td>
                        <td>Paco Gonzalez</td>
                        <td>Enfermería General 12 horas</td>
                        <td class="text--red">$1,500</td>
                        <td></td>
                        <td class="text--red">-$1,500</td>
                    </tr>
                </tbody>
            </table>
        </main>
        <!-- <footer>
            <div>
                <h3>Ver 5 renglones más</h3>
                <i class="fa-solid fa-angle-down"></i>
            </div>
            <div>
                <div class="footer__progress--number">
                    1 de 16
                </div>
                <div class="footer__progress--buttons">
                    <button class="button--transparent">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                            <path d="M224 480c-8.188 0-16.38-3.125-22.62-9.375l-192-192c-12.5-12.5-12.5-32.75 0-45.25l192-192c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25L77.25 256l169.4 169.4c12.5 12.5 12.5 32.75 0 45.25C240.4 476.9 232.2 480 224 480z"/></svg>
                    </button>

                    <button class="button--transparent">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                            <path d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z"/></svg>
                    </button>
                </div>
            </div>
        </footer> -->
    </section>
</main>

<script>
    const cliente = <?php echo json_encode($client); ?>;
    const logBalance = <?php echo json_encode($logBalance); ?>;
    let saldo = logBalance[logBalance.length - 1].balance;
    console.log('balances', logBalance);

    
    function fillTable(data) {
        const tableBody = document.getElementById('tableBody');
        tableBody.innerText = '';

        data.forEach(balance => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${balance?.timestamp.split(' ')[0]}</td>
                <td>${balance?.patient.name}</td>
                <td>${balance.concept ? balance.concept : ''}</td>
                <td class="text--red">${getOutputAmount(balance)}</td>
                <td class="text--green">${getInputAmount(balance)}</td>
                <td class="${balance.balance < 0 ? 'text--red' : 'text--green'}">$${balance.balance}</td>
                `
                tableBody.appendChild(row);
        })

    }

    function getOutputAmount(element) {
        return element?.type === 2 ? `$${element.amount}` : '';
    }

    function getInputAmount(element) {
        return element?.type === 1 ? `$${element.amount}` : '';
    }

    fillTable(logBalance);
    document.getElementById('saldoCliente').innerText = `$ ${saldo}`;
</script>