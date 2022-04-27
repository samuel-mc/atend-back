<main class="main__ingresos">
    <section class="ingresos__header">
        <a 
            class="button button--transparent"
            href="<?php echo __ROOT__; ?>/enfermera/servicios"
        >
            <i class="fa-solid fa-angle-left"></i>
        </a>
        <h2>Signos vitales</h2>
    </section>

    <section class="ingresos__body">
        <form id="formSignosVitales">
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
                    <input type="number" placeholder=" | " id="glicemia" name="glicemia">
                </div>

                <div>
                    <input type="submit" class="button button--primary button--submit" value="Confirmar">
                </div>

            </div>
        </form>
    </section>
</main>