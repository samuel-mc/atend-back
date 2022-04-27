<main class="main__ingresos">
    <section class="ingresos__header">
        <a 
            class="button button--transparent"
            href="<?php echo __ROOT__; ?>/enfermera/servicios"
        >
            <i class="fa-solid fa-angle-left"></i>
        </a>
        <h2>Ingresos / Egresos</h2>
    </section>

    <section class="ingresos__body">
        <form name="formIngresosEgresos" id="formIngresosEgresos" class="form__info-paciente">
            <div>
                <div class="form__field form__field--doble">
                    <div class="field__radio">
                        <label for="ingreso">Ingreso</label>
                        <input type="radio" name="ingresoEgreso" id="ingreso" value="ingreso" checked>
                    </div>
                    <div class="field__radio">
                        <label for="egreso">Egreso</label>
                        <input type="radio" name="ingresoEgreso" id="egreso" value="egreso">
                    </div>
                </div>

                <div class="form__field" id="fieldTipoIngreso">
                    <label for="tipoIngreso" id="labelTipodeIngreso">Tipo de ingreso</label>
                    <select name="tipoIngreso" id="tipoIngreso">
                        <option value="1">Soluciones</option>
                        <option value="2">Líquidos orales</option>
                        <option value="3">Dieta</option>
                        <option value="4">Diuresis</option>
                    </select>
                </div>

                <div class="form__field" id="fieldSolucion">
                    <label for="solucion">Solución</label>
                    <select name="solucion" id="solucion">
                        <option value="1">CVC</option>
                        <option value="2">Otra</option>
                    </select>
                </div>
                
                <div class="form__field">
                    <label for="cantidad">Cantidad</label>
                    <input type="number" value="100">
                </div>

                <div>
                    <input type="submit" class="button button--primary button--submit" value="Confirmar">
                </div>

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