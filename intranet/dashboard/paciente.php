<main class="main">
    <div>
        <section class="main__content main__add--cotainer">
            <header class="main__header--servicios">
                <h1>Información del paciente</h1>
                <!--<button class="button button--primary button--filter" id="buttonFiltrar">
                    <i class="fa-solid fa-filter"></i>
                        Filtrar
                    <i class="fa-solid fa-chevron-down"></i>
                </button>-->
            </header>
            <div>
                <form action="" class="form__info-paciente">
                    <div>
                        <div class="form__field">
                            <label for="nombrePaciente">Nombre del paciente </label>
                            <input type="text" value="<?php echo $patient['name']; ?>" name="nombrePaciente" id="nombrePaciente">
                        </div>

                        <div class="form__field form__field--doble">
                            <div>
                                <label for="apellidosCliente">Fecha de Nacimmiento</label>
                                <input type="date" value="<?php echo $patient['birthdate']; ?>">
                            </div>

                            <div>
                                <label for="sexo">Sexo</label>
                                <select name="sexo" id="sexo">
                                    <option value="1" <?php echo ($patient['gender']=='1'?"selected":"") ?>>Femenino</option>
                                    <option value="2" <?php echo ($patient['gender']=='2'?"selected":"") ?>>Masculino</option>
                                </select>
                            </div>
                        </div>

                        <div class="form__field form__field--doble">
                            <div>
                                <label for="peso">Peso</label>
                                <input type="text" value="<?php echo $patient['weight']; ?> kg" name="peso" id="peso">
                            </div>

                            <div>
                                <label for="estatura">Estatura</label>
                                <input type="text" value="<?php echo $patient['height']; ?> cm" name="estatura" id="estatura">
                            </div>
                        </div>

                        <div class="form__field">
                            <label for="calle">Calle </label>
                            <input type="text" value="<?php echo $patient['address']['street']; ?>" name="calle" id="calle">
                        </div>

                        <div class="form__field form__field--doble">
                            <div>
                                <label for="numeroExterior">Número Ext</label>
                                <input type="number" value="<?php echo $patient['address']['exterior']; ?>" name="numeroExterior" id="numeroExterior">
                            </div>

                            <div>
                                <label for="numeroInterion">Número Int</label>
                                <input type="number" value="<?php echo $patient['address']['interior']; ?>" name="numeroInterion" id="numeroInterion">
                            </div>
                        </div>

                        <div class="form__field form__field--doble">
                            <div>
                                <label for="colonia">Colonia</label>
                                <input type="text" value="<?php echo $patient['address']['suburb']; ?>" name="colonia" id="colonia">
                            </div>
                            <div>
                                <label for="delegacion">Delegación</label>
                                <input type="text" value="<?php echo $patient['address']['municipality']['name']; ?>" name="delegacion" id="delegacion">
                            </div>
                        </div>

                        <div class="form__field form__field--doble">
                            <div>
                                <label for="codigoPostal">CP</label>
                                <input type="text" value="<?php echo $patient['address']['zipcode']['zipcode']; ?>" name="codigoPostal" id="codigoPostal">
                            </div>

                            <div>
                                <label for="estado">Estado</label>
                                <input type="text" value="<?php echo $patient['address']['state']['name']; ?>" name="estado" id="estado">
                            </div>
                        </div>

                        <div class="form__field">
                            <label for="pais">País </label>
                            <input type="text" value="México" name="pais" id="pais">
                        </div>

                        <div class="form__field">
                            <label for="medicoTratante">Médico Tratante </label>
                            <input type="text" value="<?php echo $patient['doctor']['name']; ?>" name="medicoTratante" id="medicoTratante">
                        </div>

                        <div class="form__field">
                            <label for="contactoDeEmergencia">Contacto de Emergencia </label>
                            <input type="text" value="<?php echo $patient['emergency_contact']; ?>" name="contactoDeEmergencia" id="contactoDeEmergencia">
                        </div>

                        <div class="form__field form__field--doble">
                            <div>
                                <label for="telEmergencia1">Tel emergencia 1</label>
                                <input type="tel" value="<?php echo $patient['emergency_phone']; ?>" name="telEmergencia1" id="telEmergencia1">
                            </div>

                            <div>
                                <label for="telEmergencia2">Tel emergencia 2</label>
                                <input type="tel" value="<?php echo $patient['emergency_phone2']; ?>" name="telEmergencia2" id="telEmergencia2">
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="form__field">
                            <label for="diagnostico">Diagnóstico</label>
                            <input type="text" value="<?php echo $patient['diagnosis']; ?>" id="diagnostico">
                        </div>
                        <div class="form__field">
                            <label for="comentario">Comentarios</label>
                            <input type="text" value="<?php echo $patient['comments']; ?>" id="comentario">
                        </div>
                        <div class="form__field">
                            <label for="alergia">Alergías</label>
                            <input type="text" value="<?php echo $patient['allergies']; ?>" id="alergia">
                        </div>
                        <div class="form__field">
                            <label for="ordenMedica">Orden Médica</label>
                            <input type="text" value="ordenMedica" id="ordenMedica">
                        </div>
                        <div class="form__field">
                            <label for="reanimacion">Reanimación </label>
                            <label for="requiere" class="form--checkbox">El paciente quiere reanimación
                                <input type="checkbox" <?php echo $patient['want_reanimation']==1?"checked":""; ?>>
                            </label>
                        </div>
                    </div>

                    <div>
                        <div class="form__field">
                            <label for="padecimientos">Padecimientos</label>
                            <select name="padecimientos" id="padecimientos" onchange="selectAilment()">
                                <option value="0">Seleccionar Padecimientos</option>
                                <?php foreach ($ailments as $ail) { ?>
                                    <option value="<?php echo $ail['id']; ?>"><?php echo $ail['name']; ?></option>
                                <?php } ?>
                            </select>
                            <div class="row" style="margin-top:10px;">
                                <div id="ailments_selected">
                                    <?php foreach ($patient['ailments'] as $ailment) { ?>
                                        <span id="selected_ailment_<?php echo $ailment['id']; ?>" name="<?php echo $ailment['name']; ?>" class="ailment-tag"><?php echo $ailment['name']; ?><span><i onclick="deleteAilment(<?php echo $ailment['id']; ?>)" class="fas fa-times"></i></span></span>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </section>

        <section class="main__content">
            <header class="main__header--servicios">
                <h2>Servicios Activos</h2>
            </header>

            <table class="main__table">
                <thead>
                    <tr>
                        <th>Servicio</th>
                        <th>Duración</th>
                        <th>Horario</th>
                        <th>Días de Servicio</th>
                        <th>Inicio</th>
                        <th>Fin</th>
                        <th>Extras</th>
                    </tr>
                </thead>
                <tbody id="table_data"></tbody>
            </table>

            <footer class="main__footer">
                <div class="footer__progress--number">
                    1 de 16
                </div>
                <div class="footer__progress--buttons">
                    <button class="button--transparent">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M224 480c-8.188 0-16.38-3.125-22.62-9.375l-192-192c-12.5-12.5-12.5-32.75 0-45.25l192-192c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25L77.25 256l169.4 169.4c12.5 12.5 12.5 32.75 0 45.25C240.4 476.9 232.2 480 224 480z"/></svg>
                    </button>

                    <button class="button--transparent">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z"/></svg>
                    </button>
                </div>
            </footer>
        </section>

    </div>
</main>

<script>
    $.ajax({
        url: '<?php echo __ROOT__; ?>/bridge/routes.php?action=get_services_by_patient',
        type: 'GET',
        data:{
            patient_id:<?php echo $patient['id']; ?>
        },
        success: function(data) {
            console.log(JSON.parse(data));
            fillindexTable(JSON.parse(data));
        }
    });

    const fillindexTable = (data) => {
        let table = '';
        data.forEach(element => {

            table+=`
                <tr>
                    <td>${element.service.name}</td>
                    <td>${element.duration}</td>
                    <td>${element.schedule}</td>
                    <td>${element.frequency.days}</td>
                    <td>${element.frequency.start_date}</td>
                    <td>${element.frequency.end_date}</td>
                    <td>$${element.cost.extra_cost}</td>
                </tr>
            `;

            /*
                <td>
                    <a>
                        <i class="fa-solid fa-pencil"></i>
                    </a>
                </td>
                <td>
                    <a>
                        <i class="fa-solid fa-pencil"></i>
                    </a>
                </td>
                <td>
                    <a>
                        <i class="fa-solid fa-pencil"></i>
                    </a>
                </td>
            */
        });
        $("#table_data").html(table);
    }
</script>

<script type="text/javascript">
    let ailments = Array();
    for (var i = 1; i < 11; i++) {
        if ($("#selected_ailment_"+i).length){
            ailments.push({id:i,name:$("#selected_ailment_"+i).attr("name")});
            $("#padecimientos option[value='"+i+"']").remove();
        }
    }
    console.log(ailments);
    setDrugs();
    function selectAilment() {
        ailments.push({id:Number($("#padecimientos").val()),name:$("#padecimientos option:selected").text()});
        $("#padecimientos option[value='"+$("#padecimientos").val()+"']").remove();
        $("#padecimientos").val(0);
        setDrugs();
    }
    function deleteAilment(id) {
        let ac = ailments.filter(item => item.id === id);
        $("#padecimientos").append("<option value='"+id+"'>"+ac[0].name+"</option>")
        ailments = ailments.filter(item => item.id !== id);
        setDrugs();
    }
    function setDrugs() {
        let ms = "";
        for (var i = 0; i < ailments.length; i++) {
            let m = ailments[i];
            ms+='<span id="selected_ailment_'+m.id+'" name="'+m.name+'" class="ailment-tag">'+m.name+' <span><i onclick="deleteAilment('+m.id+')" class="fas fa-times"></i></span></span>';
        }
        $("#ailments_selected").html(ms);
    }
</script>