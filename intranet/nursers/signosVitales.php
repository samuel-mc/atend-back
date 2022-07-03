<main class="main__ingresos">
    <section class="ingresos__header">
        <a 
            class="button button--transparent"
            href="<?php echo __ROOT__; ?>/enfermera/servicios/<?php echo $service['id'] ?>"
        >
            <i class="fa-solid fa-angle-left"></i>
        </a>
        <h2>Signos vitales</h2>
    </section>

    <section class="ingresos__body">
        <form id="formSignosVitales" onsubmit="handleSignosVitales(event)">
            <div>
                <div class="form__field form__field--doble">
                    <div>
                        <label for="presionArterialMM">Presión arterial</label>
                        <input type="number" placeholder="mm" id="presionArterialMM" name="presionArterialMM">
                    </div>
                    <div>
                        <label for="presionArterialHG">.</label>
                        <input type="number" placeholder="hg" id="presionArterialHG" name="presionArterialHG">
                    </div>
                </div>
                <div class="form__field">
                    <label for="frecuenciaCardiaca">Frecuencia cardiaca</label>
                    <input type="number" placeholder="ppm" id="frecuenciaCardiaca" name="frecuenciaCardiaca">
                </div>
                <div class="form__field">
                    <label for="frecuenciaRespiratoria">Frecuencia respiratoria</label>
                    <input type="number" placeholder="rpm" id="frecuenciaRespiratoria" name="frecuenciaRespiratoria">
                </div>
                <div class="form__field">
                    <label for="temperatura">Temperatura</label>
                    <input type="number" placeholder="°C" id="temperatura" name="temperatura">
                </div>
                <div class="form__field">
                    <label for="saturacion">Saturación O2</label>
                    <input type="number" placeholder="%" id="saturacion" name="saturacion">
                </div>
                <div class="form__field">
                    <label for="glicemia">Glicemia capilar (sólo diabéticos)</label>
                    <input type="text" placeholder=" | " id="glicemia" name="glicemia">
                </div>

                <div>
                    <input type="submit" class="button button--primary button--submit" value="Confirmar">
                </div>

            </div>
        </form>
    </section>
</main>

<script> //Script para guardar la información
    
    const handleSignosVitales = (event) => {
        event.preventDefault();

        const binnacle_id = 1;
        const pressure_mm = $("#presionArterialMM").val();
        const pressure_hg = $("#presionArterialHG").val();
        const heart_rate = $("#frecuenciaCardiaca").val();
        const breath_frequency = $("#frecuenciaRespiratoria").val();
        const temperature = $("#temperatura").val();
        const o2_saturation = $("#saturacion").val();
        const capillary = $("#glicemia").val();

        if (
            binnacle_id === '' ||
            pressure_mm === '' ||
            pressure_hg === '' ||
            heart_rate === '' ||
            breath_frequency === '' ||
            temperature === '' ||
            o2_saturation === '' ||
            capillary === ''
        ) {
            window.alert("Ingresar Todos Los Campos");
            return;
        }

        $.ajax({
            url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=save_new_binnacle_vital_signs",
            data: {
                binnacle_id,
                pressure_mm,
                pressure_hg,
                heart_rate,
                breath_frequency,
                temperature,
                o2_saturation,
                capillary,
            },
            success: function(res){
                alert("Información guardada con éxito");
                window.location.href = "<?php echo __ROOT__; ?>/enfermera/servicios/<?php echo $service['id'] ?>";
            }
        });


    }
</script>