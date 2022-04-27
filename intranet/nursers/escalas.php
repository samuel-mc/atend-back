<main class="main__ingresos">
    <section class="ingresos__header">
        <a 
            class="button button--transparent"
            href="<?php echo __ROOT__; ?>/enfermera/servicios"
        >
            <i class="fa-solid fa-angle-left"></i>
        </a>
        <h2>Medicamentos</h2>
    </section>

    <section class="ingresos__body">
        <form>
            <div class="form__field">
                <label for="nombreGenerico">Nombre genérico del medicamento</label>
                <input type="text" name="nombreGenerico" id="nombreGenerico" value="Lorem impsum">
            </div>
            <div class="form__field">
                <label for="dosis">Dósis</label>
                <input type="number" name="dosis" id="dosis" value="5" placeholder="ml">
            </div>
            <div class="form__field">
                <label for="via">Vía</label>
                <select name="via" id="via">
                    <option value="1">V.O</option>
                    <option value="2">Otro</option>
                </select>
            </div>
            <div class="form__field">
                <label for="frecuencia">Frecuencia</label>
                <select name="frecuencia" id="frecuencia">
                    <option value="1">8 hrs</option>
                    <option value="2">Otro</option>
                </select>
            </div>
            <div class="form__field">
                <label for="observaciones">Observaciones</label>
                <input type="text" name="observaciones" id="observaciones" value="Lorem impsum">
            </div>

            <div>
                <input type="submit" class="button button--primary button--submit" value="Confirmar">
            </div>
        </form>
    </section>
</main>

<script>
    const fieldSolucion = document.getElementById('fieldSolucion');
    const tipoIngreso = document.getElementById('tipoIngreso');
    tipoIngreso.addEventListener('change', (e) => {
        if (e.target.value == 1) {
            fieldSolucion.style.display = 'block';
        } else {
            fieldSolucion.style.display = 'none';
        }
    });

    const labelTipodeIngreso = document.getElementById('labelTipodeIngreso');
    const radioItems = document.formIngresosEgresos.ingresoEgreso;
    radioItems.forEach(radioItem => {
        radioItem.addEventListener('change', (e) => {
            if (e.target.value === 'ingreso') {
                labelTipodeIngreso.innerHTML = 'Tipo de ingreso';
            } else {
                labelTipodeIngreso.innerHTML = 'Tipo de egreso';
            }
        });
    });

</script>