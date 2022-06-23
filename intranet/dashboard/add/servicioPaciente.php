<?php
    $date = new DateTime();
    $date = $date->format('Y-m-d')
?>

<section class="main__content main__add--cotainer">
    <header class="main__header--servicios">
        <h1>Información de Servicio</h1>
    </header>
    <div>
        <form class="form__info-paciente" id="formInfoServicio">
            <div>
                <div class="form__field">
                    <label for="apellidosCliente">Fecha de Inicio</label>
                    <input type="date" value="<?php echo $date; ?>" min="<?php echo $date; ?>" name="fechaInicio" id="fechaInicio">
                </div>

                <div class="form__field">
                    <label for="apellidosCliente">Fecha de terminación (opcional)</label>
                    <input type="date" min="<?php echo $date; ?>" name="fechaFin" id="fechaFin">
                </div>

                <div class="form__field form__field--doble">
                    <div>
                        <label for="sexoInfoServicio">Sexo ECA</label>
                        <select name="sexoInfoServicio" id="sexoInfoServicio">
                            <option value="1">Femenino</option>
                            <option value="2">Masculino</option>
                        </select>
                    </div>
                    <div>
                        <label for="sexo">Tipo de Servcio</label>
                        <select name="tipoDeServicio" id="tipoDeServicio">
                            <?php foreach ($service_types as $serv): ?>
                            <option value="<?php echo $serv['id']; ?>"><?php echo $serv['name']; ?></option>        
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>

                <div class="form__field">
                    <label for="tipoDeCuidado">Tipo de Cuidado</label>
                    <select name="tipoDeCuidado" id="tipoDeCuidado">
                        <option value="">Selecciona uno</option>
                        <?php foreach ($care_types as $care): ?>    
                        <option value="<?php echo $care['id']; ?>"><?php echo $care['name']; ?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="form__field form__field--doble">
                    <div>
                        <label for="duracion">Duración</label>
                        <select id="duracion">
                            <?php foreach ($durations as $dur): ?>
                                <option value="<?php echo $dur['id']; ?>"><?php echo $dur['name']; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div>
                        <label for="entrada">Entrada</label>
                        <input type="text" value="8:00 am" name="entrada" id="entrada">
                    </div>
                </div>
            </div>

            <div>
                <div class="form__field">
                    <label for="complexion">Complexión</label>
                    <select name="complexion" id="complexion">
                        <option value="">Selecciona uno</option>
                        <?php foreach ($complexions as $comp): ?>
                            <option value="<?php echo $comp['id']; ?>"><?php echo $comp['name']; ?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="form__field">
                    <label for="calParaSeguro">Calificada para seguro</label>
                    <select name="calParaSeguro" id="calParaSeguro">
                        <option value="si">Sí</option>
                        <option value="no">No</option>
                    </select>
                </div>

                <div class="form__field">
                    <label for="precioCliente">Precio Cliente</label>
                    <input type="number" value="" id="precioCliente" name="precioCliente">
                </div>

                <div class="form__field">
                    <label for="precioEca">Precio ECA</label>
                    <input type="number" value="" id="precioEca" name="precioEca">
                </div>
            </div>

            <div>
                <div class="form__field">
                    <label for="frecDelServicio">Frecuencia del Servicio</label>
                    <select name="frecDelServicio" id="frecDelServicio">
                        <option value="3">Servicio único</option>
                        <option value="0">Otro</option>
                        <option value="1">Lunes a Viernes</option>
                        <option value="2">Todos los días</option>
                    </select>
                    <div class="frecDelServicio--otro">
                        <div class="field__checkbox">
                            <input type="checkbox" id="freq_day_1" name="lunes" value="lunes">
                            <label for="lunes"> Lunes</label><br>
                        </div>
                        <div class="field__checkbox">
                            <input type="checkbox" id="freq_day_2" name="martes" value="martes">
                            <label for="martes"> Martes </label><br>
                        </div>
                        <div class="field__checkbox">
                            <input type="checkbox" id="freq_day_3" name="miercoles" value="miercoles">
                            <label for="miercoles"> Miércoles </label><br>
                        </div>
                        <div class="field__checkbox">
                            <input type="checkbox" id="freq_day_4" name="jueves" value="jueves">
                            <label for="jueves"> Jueves </label><br>
                        </div>
                        <div class="field__checkbox">
                            <input type="checkbox" id="freq_day_5" name="viernes" value="viernes">
                            <label for="viernes"> Viernes </label><br>
                        </div>
                        <div class="field__checkbox">
                            <input type="checkbox" id="freq_day_6" name="sabado" value="sabado">
                            <label for="sabado"> Sábado </label><br>
                        </div>
                        <div class="field__checkbox">
                            <input type="checkbox" id="freq_day_7" name="domingo" value="domingo">
                            <label for="domingo"> Domingo </label><br>
                        </div>
                    </div>
                </div>
            </div>
            <input type="submit" class="button button--primary button--submit" value="Guardar">

        </form>
    </div>
</section>

<script> //Script que desplega los dias de las semana si el user selecciona otro
    document.querySelector('.frecDelServicio--otro').style.display = 'none';
    
    const frecDelServicio = document.getElementById('frecDelServicio');
    frecDelServicio.addEventListener('change', (e) => {
        if (e.target.value === '0') {
            document.querySelector('.frecDelServicio--otro').style.display = 'block';
        } else {
            document.querySelector('.frecDelServicio--otro').style.display = 'none';
        }
    });
</script>

<script> 
    const patient = <?php echo json_encode($patient); ?>;
    console.log(patient);
    const client_id = patient?.client_id;
    const patient_id = patient?.id;
    // Manejo del formulario "Informacion del servicio"
    const formInfoServicio = document.querySelector('#formInfoServicio');
    formInfoServicio.addEventListener('submit', (e) => {
        e.preventDefault();
        const fechaInicio = $("#fechaInicio").val();
        const fechaFin = $("#fechaFin").val();
        const sexoInfoServicio = $("#sexoInfoServicio").val();
        const tipoDeServicio = $("#tipoDeServicio").val();
        const tipoDeCuidado = $("#tipoDeCuidado").val();
        const duracion = $("#duracion").val();
        const entrada = $("#entrada").val();
        const complexion = $("#complexion").val();
        const calParaSeguro = $("#calParaSeguro").val();
        const precioCliente = $("#precioCliente").val();
        const precioEca = $("#precioEca").val();
        const frecDelServicio = $("#frecDelServicio").val();
        const diasFrecuencia = [];
        if (frecDelServicio == 0) {
            for (var i = 1; i < 8; i++) {
                if ($("#freq_day_"+i).is(":checked")) {
                    diasFrecuencia.push(i);
                }
            }
        }else{
            if (frecDelServicio == 1){
                for (var i = 1; i < 6; i++) {
                    diasFrecuencia.push(i);
                } 
            }else{
                for (var i = 1; i < 8; i++) {
                    diasFrecuencia.push(i);
                } 
            }
        }
        const costo = $("#costo").val();
        const comentarioServicio = $("#comentarioServicio").val();

        const infoServicio = {
            client_id,
            patient_id,
            start_date:fechaInicio,
            end_date:fechaFin,
            provider_gender: sexoInfoServicio,
            service_type: tipoDeServicio,
            care_type_id: tipoDeCuidado,
            duration: duracion,
            schedule: entrada,
            complexion_id: complexion,
            insurance: calParaSeguro === 'si' ? 1 : 0,
            cost: precioCliente,
            eca_cost: precioEca,
            frequency: frecDelServicio,
            frequency_days: diasFrecuencia,
        };

        console.log(infoServicio);
        $.ajax({
            url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=save_new_service",
            data:infoServicio,
            success: function(res) {
                console.log(JSON.parse(res))
            }
        })
        alert("Servicio guardado correctamente");
        window.location.href = "<?php echo __ROOT__; ?>/servicios-paciente/" + patient_id;
    });
</script>