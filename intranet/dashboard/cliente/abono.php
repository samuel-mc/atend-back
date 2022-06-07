<main class="main__content main__abono" id="step1">
    <div class="abono__header">
        <h2>Desglose del abono</h2>
    </div>
    <div>
        <form>
            <div class="form__field form__field--doble" >
                <div>
                    <label for="paciente">Paciente</label>
                    <select name="paciente" id="paciente">
                        <option value="idPaciente1">María Hernández C</option>
                        <option value="idPaciente2">Otro</option>
                    </select>
                </div>

                <div>
                    <label for="monto">Monto</label>
                    <input type="number" value="25000.00" placeholder="$" id="monto" name="monto">
                    <span class="form__span" >abono sugerido: $13,665.00</span>
                </div>
            </div>
            
            <div class="form__field form__field--doble" >
                <div>
                    <label for="paciente">Paciente</label>
                    <select name="paciente" id="paciente">
                        <option value="idPaciente1">Juan Lozano J </option>
                        <option value="idPaciente2">Otro</option>
                    </select>
                </div>

                <div>
                    <label for="monto">Monto</label>
                    <input type="number" value="4665.00" placeholder="$" id="monto" name="monto">
                    <span class="form__span" >abono sugerido: $4,665.00</span>
                </div>
            </div>
            <div class="form__field form__field--doble abono__total" >
                <div>
                    <h2 > + Añadir abono a otro paciente </h2>
                </div>
                <div>
                    <h2>Total a pagar</h2>
                    <h1>$29,665.00</h1>
                    <button
                        type="button"
                        class="button button--primary button--submit active"
                        onclick="handleStep()"
                        >Continuar
                    </button>
                </div>
        </form>
    </div>
</main>


<main class="main__content main__abono" id="step2">
    <div class="abono__header">
        <h2>Método de pago</h2>
    </div>
    <div>
        <form>
            <div class="form__field form__field--doble" >
                <div>
                    <label for="metodoDePado">Método de pago</label>
                    <select name="metodoDePado" id="metodoDePado">
                        <option value="tarjeta">Tarjeta de crédito ó débito</option>
                        <option value="efectivo">Efectivo</option>
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
                    <input 
                        type="number" 
                        id="mesExpiracion" 
                        name="mesExpiracion" 
                        placeholder="MM"
                    >
                </div>
                <div>
                    <label for="anioExpiracion">Año de Expiración</label>
                    <input
                        type="number"
                        id="anioExpiracion"
                        name="anioExpiracion"
                        placeholder="AA"
                    >
                </div>
                <div>
                    <label for="cvv">CVV</label>
                    <input type="number" id="cvv" name="cvv" placeholder="CVV">
                </div>
            </div>
            <div class="form__field form__field--doble abono__total" >
                <div></div>
                <div>
                    <h2>Pagar ahora</h2>
                    <h1>$29,665.00</h1>
                    <button
                        type="button"
                        onclick="handleStep()"
                        class="button button--primary button--submit active"
                    >Pagar ahora</button>
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
        <button
            type="button"
            onclick="handleStep()"
            class="button button--primary button--submit active"
        >
            Continuar
        </button>
    </div>
</main>

<script>
    let currentStep = 1;
    const step1 = document.getElementById('step1');
    const step2 = document.getElementById('step2');
    const step3 = document.getElementById('step3');

    step2.style.display = 'none';
    step3.style.display = 'none';

    const handleStep = () => {
        if (currentStep === 1) {
            step2.style.display = 'block';
            step1.style.display = 'none';
            currentStep = 2;
        } else if (currentStep === 2) {
            step3.style.display = 'block';
            step2.style.display = 'none';
            currentStep = 3;
        } else if (currentStep === 3) {
            window.location.href = '<?php echo __ROOT__; ?>/dashboard/cliente';
        }
    };

</script>