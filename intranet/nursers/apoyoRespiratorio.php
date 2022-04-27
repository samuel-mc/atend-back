<main class="main__ingresos">
    <section class="ingresos__header">
        <a 
            class="button button--transparent"
            href="<?php echo __ROOT__; ?>/enfermera/servicios"
        >
            <i class="fa-solid fa-angle-left"></i>
        </a>
        <h2>Apoyo Respiratorio</h2>
    </section>

    <section class="ingresos__body">
        <form>
            <div class="form__field">
                <label for="tipoApoyo">Tipo de apoyo</label>
                <select name="tipoApoyo" id="tipoApoyo">
                    <option value="1">O2 por puntas nasales</option>
                    <option value="2">Otro</option>
                </select>
            </div>
            <div class="form__field">
                <label for="litrosPorHora">Litros por hora</label>
                <input type="number" name="litrosPorHora" id="litrosPorHora" value="1">
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