<main class="main__ingresos">
    <section class="ingresos__header">
        <a 
            class="button button--transparent"
            href="<?php echo __ROOT__; ?>/enfermera/servicios/<?php echo $service['id'] ?>"
        >
            <i class="fa-solid fa-angle-left"></i>
        </a>
        <h2>Ingresos / Egresos</h2>
    </section>

    <section class="ingresos__body">
        <form name="formIngresosEgresos" id="formIngresosEgresos" class="form__info-paciente" onsubmit="handleSubmitIO(event)">
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
                        <?php foreach ($ioTypes as $type) { ?>
                            <option value="<?php echo $type['id']; ?>"><?php echo $type['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form__field" id="solucion">
                    <label for="fieldSolucion">Solución</label>
                    <select name="fieldSolucion" id="fieldSolucion">
                        <option value="CVC">CVC</option>
                        <option value="Otra">Otra</option>
                    </select>
                </div>
                
                <div class="form__field">
                    <label for="cantidad">Cantidad</label>
                    <input type="number" id="cantidad" name="cantidad">
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

<script> //Script para guardar la informacion    
    const handleSubmitIO = (event) => {
        event.preventDefault();

        const binnacle_id = 1;
        const category_id = $("#ingreso").is(":checked") ? 1 : 2;
        const type_id = $("#tipoIngreso").val();
        let solution = $("#fieldSolucion").val();
        const quantity = $("#cantidad").val();
        
        if (type_id !== 1) { solution = 'NA'; }
        
        $.ajax({
            url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=save_new_binnacle_io",
            data: {
                binnacle_id,
                category_id,
                type_id,
                solution,
                quantity,
            },
            success: function(res){
                alert("Información guardada con éxito");
                window.location.href = "<?php echo __ROOT__; ?>/enfermera/servicios/<?php echo $service['id'] ?>";
            }
        });
    }

</script>