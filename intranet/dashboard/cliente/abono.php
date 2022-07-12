<main class="main__content main__abono" id="step1">
    <div class="abono__header">
        <h2>Desglose del abono</h2>
    </div>
    <div>
        <form>
            <div id="formPayments">
                <div class="form__field form__field--doble">
                    <div>
                        <label for="paciente">Paciente</label>
                        <select name="paciente" id="paciente" class="paciente">
                            <option value="0">Seleccione un paciente</option>
                            <?php foreach ($patients as $patien) { ?>
                                <option value="<?php echo $patien['id']; ?>"><?php echo $patien['name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div>
                        <label for="monto">Monto</label>
                        <input type="number" placeholder="$" id="monto" name="monto" onchange="updateTotal()" class="montoAbono">
                        <span class="form__span">abono sugerido: $13,665.00</span>
                    </div>
                </div>
            </div>

            <div class="form__field form__field--doble abono__total">
                <div>
                    <button type="button" onclick="addClient()" class="button button--transparent"> 
                        + Añadir abono a otro paciente 
                    </button>
                </div>
                <div>
                    <h2>Total a pagar</h2>
                    <h1 id="totalAPagar"></h1>
                    <button type="button" class="button button--primary button--submit active" onclick="handleStep()">Continuar
                    </button>
                </div>
            </div>
        </form>
    </div>
</main>


<main class="main__content main__abono" id="step2">

    <div class="abono__header">
        <button class="button button--transparent" onclick="returnAbono()">
            <i class="fa-solid fa-angle-left"></i>
        </button>
        <h2>Método de pago</h2>
    </div>
    <div class="payment">
        <form class="payment__form">
            <div class="form__field form__field--doble">
                <div>
                    <label for="metodoDePado">Método de pago</label>
                    <select name="metodoDePado" id="metodoDePado">
                        <option value="tarjeta">Tarjeta de crédito ó débito</option>
                    </select>
                </div>
                <div></div>
            </div>
            <h2>Información de la tarjeta</h2>
            <div class="form__field form__field--doble">
                <div>
                    <label for="numeroDeTarjeta">Número de la tarjeta</label>
                    <input type="number" id="numeroDeTarjeta" name="numeroDeTarjeta" placeholder="Ingresa el número de la tarjeta">
                </div>
                <div>
                    <label for="nombreTarjetahabiente">Nombre del tarjetahabiente</label>
                    <input type="text" id="nombreTarjetahabiente" name="nombreTarjetahabiente" placeholder="Ingresa el nombre del titular de la tarjeta">
                </div>
            </div>
            <div class="form__field form__field--triple">
                <div>
                    <label for="mesExpiracion">Mes de Expiración</label>
                    <input type="number" id="mesExpiracion" name="mesExpiracion" placeholder="MM">
                </div>
                <div>
                    <label for="anioExpiracion">Año de Expiración</label>
                    <input type="number" id="anioExpiracion" name="anioExpiracion" placeholder="AA">
                </div>
                <div>
                    <label for="cvv">CVV</label>
                    <input type="number" id="cvv" name="cvv" placeholder="CVV">
                </div>
            </div>
            <div class="form__field form__field--doble abono__total">
                <div></div>
                <div>
                    <h2>Pagar ahora</h2>
                    <h1 id="totalAPagarStep2"></h1>
                    <button type="button" onclick="handleStep()" class="button button--primary button--submit active">Pagar ahora</button>
                </div>
            </div>
        </form>
    </div>
</main>

<main class="main__content main__abono" id="step3">
    <div class="abono__confirmacion">
        <h1>¡Felicidades!</h1>
        <p>
            Tu pago ha sido procesado con éxito. <br />
            En breve te llegará la confirmación del pago a tu correo electrónico
        </p>
        <button type="button" onclick="handleStep()" class="button button--primary button--submit active">
            Continuar
        </button>
    </div>
</main>

<script>
    let currentStep = 1;
    let montosDePacientes;
    const step1 = document.getElementById('step1');
    const step2 = document.getElementById('step2');
    const step3 = document.getElementById('step3');

    step2.style.display = 'none';
    step3.style.display = 'none';

    const handleStep = () => {
        if (currentStep === 1) {
            montosDePacientes = obtenerPacientes();
            if (!montosDePacientes) {
                window.alert('Falta Informacion');
                return;
            } else {
                step2.style.display = 'block';
                step1.style.display = 'none';
            }
            currentStep = 2;
            console.log(montosDePacientes);
        } else if (currentStep === 2) {
            console.log(montosDePacientes);

            const datosPago = obtenerDatosPago();
            if (!datosPago) {
                window.alert('Falta Informacion');
                return;
            } else {
                const pagoRealizado = realizarElPago();
            }
            step3.style.display = 'block';
            step2.style.display = 'none';
            currentStep = 3;
        } else if (currentStep === 3) {
            window.location.href = '<?php echo __ROOT__; ?>/dashboard/cliente';
        }
    };

    const returnAbono = () => {
        currentStep = 1;
        step1.style.display = 'block';
        step2.style.display = 'none';
        step3.style.display = 'none';
    }
    const obtenerPacientes = () => {
        // Se recopila la informacion del paciente y su monto a pagar.
        let faltaInformacion = false;

        // Se obtiene la informacion de los montos
        let abonos = document.getElementsByClassName('montoAbono');
        abonos = Array.from(abonos);
        abonos = abonos.map(abono => {
            if (abono.value == '') {
                faltaInformacion = true;
            }
            return abono.value
        })

        if(faltaInformacion) {
            return null;
        }

        let pacientesAbono = document.getElementsByClassName('paciente');
        pacientesAbono = Array.from(pacientesAbono);
        pacientesAbono = pacientesAbono.map((paciente, i) => {
            if (paciente.value == '0') {
                faltaInformacion = true;
            }
            return {
                paciente: paciente.value,
                monto: abonos[i]
            }
        });

        return faltaInformacion ? null : pacientesAbono;
    }

    const obtenerDatosPago = () => {
        let faltaInformacion = false;
        const numeroDeTarjeta = document.getElementById('numeroDeTarjeta').value;
        const nombreTarjetahabiente = document.getElementById('nombreTarjetahabiente').value;
        const mesExpiracion = document.getElementById('mesExpiracion').value;
        const anioExpiracion = document.getElementById('anioExpiracion').value;
        const cvv = document.getElementById('cvv').value;

        if (
            numeroDeTarjeta === '' || nombreTarjetahabiente === '' ||
            mesExpiracion === '' || anioExpiracion === '' ||
            cvv == ''
        ) {
            return null;
        }

        return {
            numeroDeTarjeta,
            nombreTarjetahabiente,
            mesExpiracion,
            anioExpiracion,
            cvv
        }
    }
</script>
<script>
    let total = 0;
    document.getElementById('totalAPagar').innerText = `$ ${total}`;

    const addClient = () => {
        const patientPayment = document.createElement('div');
        patientPayment.classList.add('form__field', 'form__field--doble');
        patientPayment.innerHTML = `
            <div>
                <label for="paciente">Paciente</label>
                <select name="paciente" id="paciente" class="paciente">
                    <option value="0">Seleccione un paciente</option>
                    <?php foreach ($patients as $patient) {
                        echo '<option value="' . $patient['id'] . '">' . $patient['name'] . '</option>';
                    }
                    ?>
                </select>
            </div>
    
            <div>
                <label for="monto">Monto</label>
                <input type="number" value="" placeholder="$" id="monto" name="monto" onchange="updateTotal()" class="montoAbono">
                <span class="form__span" >abono sugerido: $13,665.00</span>
            </div>`;

        document.getElementById('formPayments').appendChild(patientPayment);
    }

    const updateTotal = () => {
        let sumaAbonos = 0;
        let abonos = document.getElementsByClassName('montoAbono');
        abonos = Array.from(abonos);
        abonos.forEach(abono => {
            sumaAbonos = Number(sumaAbonos) + Number(abono.value)
        })
        obtenerPacientes();
        document.getElementById('totalAPagar').innerText = `$ ${sumaAbonos}`;
        document.getElementById('totalAPagarStep2').innerText = `$ ${sumaAbonos}`;
    }
</script>

<script> // Script para realizar el pago.
    const realizarElPago = async () => {
        // Método para realizar el pago
        const date = new Date();
        const client_id = <?php echo json_encode($idCliente); ?>;

        montosDePacientes.forEach((payment) => {
            const data = {
                amount: payment.monto,
                client_id: client_id,
                patient_id: payment.paciente,
                bank: 'Insertado desde pagos por cliente',
                method_id: 1,
                comments: 'Insertado desde pagos por cliente',
                date: date.getFullYear() + '-' + (date.getMonth() + 1) + '-' + date.getDate()
            };
            guardarPago(data);
        });
        // Se guarda la informacion en la db


        return true;
    }

    const guardarPago = async (data) => {
        await $.ajax({
            url: '<?php echo __ROOT__; ?>/bridge/routes.php?action=save_new_client_payment',
            type: 'GET',
            data,
            success: function(resp) {
                location.reload(true);
            }
        });
    }
</script>