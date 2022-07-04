<div class="main__header--enfermera">
    <h1><?php echo $service['patient']['name']; ?></h1>    
    <h2><?php echo explode(" ",$service['date'])[0]; ?> | <?php echo $service['schedule']; ?> (<?php echo $service['duration']; ?>)</h2>
</div>

<!-- Inicia: Menu Principal -->
<div id="serviceMain">
    <main class="main__content main__enfermera--acciones" >
        <h1>Acciones del Servicio</h1>
        <ul>
            <li>
                <button
                    class="button button--primary" 
                    onclick="changeMenu('io')"
                >
                    Ingresos / Egresos
                </button>
            </li>
            <li>
                <button 
                    class="button button--primary" 
                    onclick="changeMenu('signs')"
                >
                    Signos Vitales
                </button>
            </li>
            <li>
                <button 
                    class="button button--primary" 
                    onclick="changeMenu('mov')"
                >
                    Movilizaciones
                </button>
            </li>
            <li>
                <button 
                    class="button button--primary" 
                    onclick="changeMenu('help')"
                >
                    Apoyo Respiratorio
                </button>
            </li>
            <li>
                <a class="button button--primary" href="<?php echo __ROOT__; ?>/enfermera/medicamentos">
                    Escalas
                </a>
            </li>
            <li>
                <button 
                    class="button button--primary" 
                    onclick="changeMenu('drugs')"
                >
                    Medicamentos
                </button>
            </li>
        </ul>
    </main>
    <footer class="enfermera__footer">
        <div>
            <a href="">
                <i class="fa-solid fa-phone"></i>
            </a>
            <a href="">
                <i class="fa-solid fa-circle-info"></i>
            </a>
        </div>
        <div>
            <a
                class="button button--primary"
                href="<?php echo __ROOT__; ?>/enfermera/terminar"
            >
                Terminar Servicio
            </a>
        </div>
    </footer>
</div>
<!-- Termina: Menu Principal -->

<!-- Inicia: Menu Lateral -->
<main class="side__menu hidden" id="sideMenuEnfermera">
    <div class="side__menu--top">
        <button class="button button--transparent" id="buttonCloseSideMenu">
            <i class="fa-solid fa-x"></i>
        </button>
    </div>
    <div class="side__menu--content">
        <ul>
            <li><a href="">Ver bitácora</a></li>
            <li><a href="">Ver plan de cuidado</a></li>
        </ul>
    </div>
</main>
<!-- Termina: Menu Lateral -->

<!-- Inicia: Menu Relacionado a Ingresos - Egresos -->
<main class="main__ingresos" id="serviceIO">
    <section class="ingresos__header">
        <button
            class="button button--transparent"
            onclick="changeMenu('main')"
        >
            <i class="fa-solid fa-angle-left"></i>
        </button>
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
                        <option value="">Seleccione una opción</option>
                        <!-- 
                        <option value="2">Líquidos orales</option>
                        <option value="3">Dieta</option>
                        <option value="4">Diuresis</option> -->
                        <?php foreach ($ioTypes as $type) { ?>
                            <option value="<?php echo $type['id']; ?>"><?php echo $type['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form__field" id="solucion">
                    <label for="fieldSolucion">Solución</label>
                    <select name="fieldSolucion" id="fieldSolucion">
                        <option value="">Seleccione una opción</option>
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
<!-- Termina: Menu Relacionado a Ingresos - Egresos -->

<!-- Inicia: Menu Relacionado a signos vitales -->
<main class="main__ingresos" id="serviceSigns">
    <section class="ingresos__header">
        <button
            class="button button--transparent"
            onclick="changeMenu('main')"
        >
            <i class="fa-solid fa-angle-left"></i>
        </button>
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
<!-- Termina: Menu Relacionado a signos vitales  -->

<!-- Inicia: Menu Relacionado a movilizacion -->
<main class="main__ingresos" id="serviceMov">
    <section class="ingresos__header">
        <button
            class="button button--transparent"
            onclick="changeMenu('main')"
        >
            <i class="fa-solid fa-angle-left"></i>
        </button>
        <h2>Movilizaciones</h2>
    </section>

    <section class="ingresos__body">
        <form onsubmit="handleMovilizacion(event)">
            <div class="form__field">
                <label for="tipoMovilizacion">Tipo de movilización</label>
                <select name="tipoMovilizacion" id="tipoMovilizacion">
                    <option value="">Seleccione uno</option>
                    <?php foreach ($movTypes as $mov) { ?>
                        <option value="<?php echo $mov['id']; ?>"><?php echo $mov['name']; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div>
                <input type="submit" class="button button--primary button--submit" value="Confirmar">
            </div>
        </form>
    </section>
</main>
<!-- Termina: Menu Relacionado a movilizacion -->

<!-- Inicia: Menu Relacionado a apoyo respiratorio -->
<main class="main__ingresos" id="serviceHelp">
    <section class="ingresos__header">
        <button
            class="button button--transparent"
            onclick="changeMenu('main')"
        >
            <i class="fa-solid fa-angle-left"></i>
        </button>
        <h2>Apoyo Respiratorio</h2>
    </section>

    <section class="ingresos__body">
        <form onsubmit="handleSubmitHelp(event)">
            <div class="form__field">
                <label for="tipoApoyoResp">Tipo de apoyo</label>
                <select name="tipoApoyoResp" id="tipoApoyoResp">
                    <option value="">Seleccione una opción</option>
                    <?php foreach ($breathTypes as $type) { ?>
                        <option value="<?php echo $type['id']; ?>"><?php echo $type['name']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form__field">
                <label for="litrosPorHora">Litros por hora</label>
                <input type="number" name="litrosPorHora" id="litrosPorHora">
            </div>

            <div>
                <input type="submit" class="button button--primary button--submit" value="Confirmar">
            </div>
        </form>
    </section>
</main>
<!-- Termina: Menu Relacionado a apoyo respiratorio -->

<!-- Inicia: Menu Relacionado a medicamentos -->
<main class="main__ingresos" id="serviceDrugs">
    <section class="ingresos__header">
        <button
            class="button button--transparent"
            onclick="changeMenu('main')"
        >
            <i class="fa-solid fa-angle-left"></i>
        </button>
        <h2>Medicamentos</h2>
    </section>

    <section class="ingresos__body">
        <form onsubmit="handleSubmitDrugs(event)">
            <div class="form__field">
                <label for="nombreGenerico">Nombre genérico del medicamento</label>
                <input type="text" name="nombreGenerico" id="nombreGenerico" placeholder="Nombre genérico del medicamento">
            </div>
            <div class="form__field">
                <label for="dosis">Dósis</label>
                <input type="number" name="dosis" id="dosis" placeholder="ml">
            </div>
            <div class="form__field">
                <label for="via">Vía</label>
                <select name="via" id="via">
                    <option value="">Seleccione una opción</option>
                    <?php foreach ($drugWays as $type) { ?>
                        <option value="<?php echo $type['id']; ?>"><?php echo $type['name']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form__field">
                <label for="frecuencia">Frecuencia</label>
                <select name="frecuencia" id="frecuencia">
                    <option value="">Seleccione una opción</option>
                    <option value="2 hrs">2 hrs</option>
                    <option value="8 hrs">8 hrs</option>
                    <option value="12 hrs">12 hrs</option>
                </select>
            </div>
            <div class="form__field">
                <label for="observaciones">Observaciones</label>
                <input type="text" name="observaciones" id="observaciones" placeholder="Observaciones">
            </div>

            <div>
                <input type="submit" class="button button--primary button--submit" value="Confirmar">
            </div>
        </form>
    </section>
</main>
<!-- Termina: Menu Relacionado a medicamentos -->


<script> // Script para manejar el side bar
    const servicio = <?php echo json_encode($service); ?>;
    console.log("servicio", servicio);

    const sideMenuEnfermera = document.getElementById('sideMenuEnfermera');
    const buttonSideMenu = document.getElementById('buttonSideMenu');
    buttonSideMenu.addEventListener('click', () => {
        sideMenuEnfermera.classList.remove('hidden');
        console.log('click');
    });
    const buttonCloseSideMenu = document.getElementById('buttonCloseSideMenu');
    buttonCloseSideMenu.addEventListener('click', () => {
        sideMenuEnfermera.classList.add('hidden');
        console.log('click');
    });
</script>

<script> // Script para manejar el cambio de menu
    const serviceMain = document.getElementById('serviceMain');
    const serviceIO = document.getElementById('serviceIO');
    const serviceSigns = document.getElementById('serviceSigns');
    const serviceMov = document.getElementById('serviceMov');
    const serviceHelp = document.getElementById('serviceHelp');
    const serviceDrugs = document.getElementById('serviceDrugs');

    const options = [ serviceMain, serviceIO, serviceSigns, serviceMov, serviceHelp, serviceDrugs];

    const changeMenu = (optionSelected) => {
        options.forEach(option => {
            option.style.display = 'none';
        })
        switch (optionSelected) {
            case 'main':
                serviceMain.style.display = 'block';
                break;
            case 'io':
                console.log("fuie io");
                serviceIO.style.display = 'block';
                break;
            case 'signs':
                serviceSigns.style.display = 'block';
                break;
            case 'mov':
                serviceMov.style.display = 'block';
                break;
            case 'help':
                serviceHelp.style.display = 'block';
                break;
            case 'drugs':
                serviceDrugs.style.display = 'block';
                break;
        }
    }

    changeMenu('main');
</script>

<script> // Script para cambiar los inputs de ingresos - egresos
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

<script> //Script para guardar la informacion de ingresos - egresos
    const handleSubmitIO = (event) => {
        event.preventDefault();

        const binnacle_id = 1;
        const category_id = $("#ingreso").is(":checked") ? 1 : 2;
        const type_id = $("#tipoIngreso").val();
        let solution = $("#fieldSolucion").val();
        const quantity = $("#cantidad").val();

        if (type_id !== 1) { solution = 'NA'; }

        if (
            category_id === '' ||
            type_id === '' ||
            solution === ''
        ) {
            window.alert("Falta información.");
            return;
        }

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
                changeMenu('main');
            }
        });
    }
</script>

<script> //Script para guardar la información de signos vitales
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
            window.alert("Falta información.");
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
                changeMenu('main');
            }
        });
    }
</script>

<script> // Script para guardar la información de movilidad
    const handleMovilizacion = (event) => {
        event.preventDefault();
        const binnacle_id = 1;
        const type_id = $("#tipoMovilizacion").val();

        if ( type_id === '' ) {
            window.alert("Falta información.");
            return;
        }

        $.ajax({
            url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=save_new_binnacle_mov",
            data: {
                binnacle_id,
                type_id
            },
            success: function(res){
                alert("Información guardada con éxito");
                changeMenu('main');
            }
        });
    }
</script>

<script> // Script para guardar la información de apoyo respiratorio
    const handleSubmitHelp = (event) => {
        event.preventDefault();
        const binnacle_id = 1;
        const type_id = $("#tipoApoyoResp").val();
        const liters_per_hour = $("#litrosPorHora").val();


        if ( type_id === '' || liters_per_hour === '') {
            window.alert("Falta información.");
            return;
        }

        $.ajax({
            url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=save_new_binnacle_help",
            data: {
                binnacle_id,
                type_id,
                liters_per_hour
            },
            success: function(res){
                alert("Información guardada con éxito");
                changeMenu('main');
            }
        });
    }
</script>

<script> // Script para guardar la información de medicamentos
    const handleSubmitDrugs = (event) => {
        event.preventDefault();
        const binnacle_id = 1;
        const name = $("#nombreGenerico").val();
        const dosis = $("#dosis").val();
        const way_id = $("#via").val();
        const frequency = $("#frecuencia").val();
        const observations = $("#observaciones").val();

        if ( 
            name === '' ||
            dosis === '' ||
            way_id === '' ||
            frequency === '' ||
            observations === ''
        ) {
            window.alert("Falta información.");
            return;
        }

        $.ajax({
            url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=save_new_binnacle_drugs",
            data: {
                binnacle_id,
                name,
                dosis,
                way_id,
                frequency,
                observations
            },
            success: function(res){
                alert("Información guardada con éxito");
                changeMenu('main');
            }
        });
    }
</script>