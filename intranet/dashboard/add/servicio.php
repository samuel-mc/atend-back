<?php
    $add = isset($add) ? $add : null;
?>

<main class="main">
    <div>
        <section 
            class="main__form--top"
            id="main"
            style="display: <?php echo $add === 'paciente' ? 'none' : 'grid' ?>;"
        >
            <div class="main__content">
                <form class="form__info-cliente" id="formInfoCliente">
                    <header class="main__header--servicios">
                        <h1>Info del cliente</h1>
                        <button class="button  button--primary button--circle" type="reset">
                            <i class="far fa-trash-alt"></i>
                        </button>
                    </header>
                    <div class="form__field">
                        <label for="tipoDeCliente">Tipo de cliente </label>
                        <label for="empresa" class="form--checkbox">
                            Empresa <input type="checkbox" id="clienteEmpresa">
                        </label>
                    </div>
                    <div class="form__field">
                        <label for="nombreCliente">Nombre *</label>
                        <input type="text" value="<?php echo (isset($client) ? $client["name"]:""); ?>" id="nombreCliente" required>
                    </div>
                    <div class="form__field">
                        <label for="apellidosCliente">Apellido(s) *</label>
                        <input type="text" value="<?php echo (isset($client) ? $client["lastname"]:""); ?>" id="apellidosCliente" required>
                    </div>
                    <div class="form__field">
                        <label for="telefonoCliente">Teléfono *</label>
                        <input type="text" value="<?php echo (isset($client) ? $client["phone"]:""); ?>" id="telefonoCliente" required>
                    </div>
                    <div class="form__field">
                        <label for="mailCliente">Mail *</label>
                        <input type="mail" value="<?php echo (isset($client) ? $client["email"]:""); ?>" id="mailCliente" required>
                    </div>
                    <div class="form__field">
                        <label for="requiereFactura">Requiere Factura</label>
                        <select name="requiereFactura" id="requiereFactura" value="<?php echo (isset($client) ? $client["require_billing"]:""); ?>">
                            <option value="1">Sí</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form__field">
                        <label for="factura">Comentarios (opcional)</label>
                        <input type="text" value="<?php echo (isset($client) ? $client["comments"]:""); ?>" id="comentariosCliente">
                    </div>
                    <!-- <input type="submit" class="button button--primary button--submit" value="Guardar"> -->
                </form>
            </div>
            <div class="main__content collapse" id="billing_container">
                <header class="main__header--servicios">
                    <h1>Info Financiera</h1>
                </header>

                <form action="" class="form__info-cliente form__doble-column" id="formInfoFinanciera">
                    <div>
                        <div class="form__field">
                            <label for="razonSocial">Razón social</label>
                            <input type="text" value="" name="razonSocial" id="razonSocial">
                        </div>
                        <div class="form__field">
                            <label for="esquemaDeFacturacion">Esquema de facturación</label>
                            <select name="esquemaDeFacturacion" id="esquemaDeFacturacion">
                                <?php  foreach ($billing_schemes as $bs) { ?>
                                        <option value="<?php echo $bs['id']; ?>"><?php echo $bs['name']; ?></option>
                                <?php  } ?>
                            </select>
                        </div>
                        <div class="form__field">
                            <label for="rfc">RFC</label>
                            <input type="text" value="" name="rfc" id="rfc">
                        </div>
                        <div class="form__field">
                            <label for="emailInfoFinanciera">Correo Electrónico</label>
                            <input type="mail" value="" name="emailInfoFinanciera" id="emailInfoFinanciera">
                        </div>
                        <div class="form__field">
                            <label for="uso">Uso</label>
                            <select name="uso" id="uso">
                                <?php  foreach ($billing_uses as $bu) { ?>
                                        <option value="<?php echo $bu['id']; ?>"><?php echo $bu['name']; ?></option>
                                <?php  } ?>
                            </select>
                        </div>
                        <div class="form__field">
                            <label for="regimenDeFacturacion">Régimen de Facturación</label>
                            <select name="regimenDeFacturacion" id="regimenDeFacturacion">
                                <?php  foreach ($billing_regimes as $br) { ?>
                                        <option value="<?php echo $br['id']; ?>"><?php echo $br['name']; ?></option>
                                <?php  } ?>
                            </select>
                        </div>
                        <div class="form__field">
                            <label for="calleInfoFin">Calle</label>
                            <input type="text" value="" name="calleInfoFin" id="calleInfoFin">
                        </div>
                    </div>

                    <div>
                        <div class="form__field">
                            <label for="numeroExteriorInfoFin">Número Exterior</label>
                            <input type="text" value="" name="numeroExteriorInfoFin" id="numeroExteriorInfoFin">
                        </div>
                        <div class="form__field">
                            <label for="numeroInteriorInfoFin">Número Interior</label>
                            <input type="text" value="" name="numeroInteriorInfoFin" id="numeroInteriorInfoFin">
                        </div>
                        <div class="form__field">
                            <label for="coloniaInfoFin">Colonia</label>
                            <input type="text" value="" name="coloniaInfoFin" id="coloniaInfoFin">
                        </div>
                        <div class="form__field">
                            <label for="delegacionInfoFin">Delegación</label>
                            <input type="text" value="" name="delegacionInfoFin" id="delegacionInfoFin">
                        </div>
                        <div class="form__field">
                            <label for="cpInfoFin">Código Postal</label>
                            <input type="number" value="" name="cpInfoFin" id="cpInfoFin">
                        </div>
                        <div class="form__field">
                            <label for="estadoInfoFin">Ciudad / Estado</label>
                            <input type="text" value="" name="estadoInfoFin" id="estadoInfoFin">
                        </div>
                        <div class="form__field">
                            <label for="paisInfoFin">País</label>
                            <input type="text" value="" name="paisInfoFin" id="paisInfoFin">
                        </div>
                        <!-- <input type="submit" class="button button--primary button--submit" value="Guardar"> -->
                    </div>
                </form>
            </div>
        </section>

        <section class="main__content main__add--cotainer" id="infoPaciente">
            <header class="main__header--servicios">
                <h1>Info del paciente</h1>
            </header>
            <div>
                <form class="form__info-paciente" id="formInfoPaciente">
                    <input type="hidden" id="patient_id" value="<?php //echo $patient['id']; ?>">

                    <div>
                        <div class="form__field">
                            <label for="nombrePaciente">Nombre del paciente </label>
                            <input type="text" value="" name="nombrePaciente" id="nombrePaciente">
                        </div>
                        <div class="form__field form__field--doble">
                            <div>
                                <label for="fechaNacimiento">Fecha de Nacimmiento</label>
                                <input type="date" name="" id="fechaNacimiento">
                            </div>
                            <div>
                                <label for="sexoPaciente">Sexo</label>
                                <select name="sexoPaciente" id="sexoPaciente">
                                    <option value="1">Femenino</option>
                                    <option value="2">Masculino</option>
                                </select>
                            </div>
                        </div>

                        <div class="form__field form__field--doble">
                            <div>
                                <label for="peso">Peso (Kg)</label>
                                <input type="text" value="" name="peso" id="peso">
                            </div>

                            <div>
                                <label for="estatura">Estatura (cm)</label>
                                <input type="text" value="" name="estatura" id="estatura">
                            </div>
                        </div>

                        <div class="form__field">
                            <label for="callePaciente">Calle </label>
                            <input type="text" value="" name="callePaciente" id="callePaciente">
                        </div>

                        <div class="form__field form__field--doble">
                            <div>
                                <label for="numeroExteriorPaciente">Número Ext</label>
                                <input type="text" value="" name="numeroExteriorPaciente" id="numeroExteriorPaciente">
                            </div>

                            <div>
                                <label for="numeroInteriorPaciente">Número Int</label>
                                <input type="text" value="" name="numeroInteriorPaciente" id="numeroInteriorPaciente">
                            </div>
                        </div>

                        <div class="form__field form__field--doble">
                            <div>
                                <label for="coloniaPaciente">Colonia</label>
                                <input type="text" value="" name="coloniaPaciente" id="coloniaPaciente">
                            </div>

                            <div>
                                <label for="delegacionPaciente">Delegación</label>
                                <input type="text" value="" name="delegacionPaciente" id="delegacionPaciente">
                            </div>
                        </div>

                        <div class="form__field form__field--doble">
                            <div>
                                <label for="cpPaciente">CP</label>
                                <input type="number" value="" name="cpPaciente" id="cpPaciente">
                            </div>

                            <div>
                                <label for="estadoPaciente">Estado</label>
                                <input type="text" value="" name="estadoPaciente" id="estadoPaciente">
                            </div>
                        </div>

                        <div class="form__field">
                            <label for="paisPaciente">País </label>
                            <input type="text" value="" name="paisPaciente" id="paisPaciente">
                        </div>

                        <div class="form__field">
                            <label for="medicoTratante">Médico Tratante </label>
                            <input type="text" placeholder="Médico Tratante" name="medicoTratante" id="medicoTratante">
                        </div>

                        <div class="form__field">
                            <label for="contactoDeEmergencia">Contacto de Emergencia </label>
                            <input type="text" value="" name="contactoDeEmergencia" id="contactoDeEmergencia">
                        </div>

                        <div class="form__field form__field--doble">
                            <div>
                                <label for="telEmergencia1">Tel emergencia 1</label>
                                <input type="tel" value="" name="telEmergencia1" id="telEmergencia1">
                            </div>

                            <div>
                                <label for="telEmergencia2">Tel emergencia 2</label>
                                <input type="tel" value="" name="telEmergencia2" id="telEmergencia2">
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="form__field">
                            <label for="diagnostico">Diagnóstico</label>
                            <input type="text" name="diagnostico" id="diagnostico">
                        </div>
                        <div class="form__field">
                            <label for="comentarioPaciente">Comentarios</label>
                            <input type="text" name="comentarioPaciente" id="comentarioPaciente">
                        </div>
                        <div class="form__field">
                            <label for="alergia">Alergías</label>
                            <input type="text" name="alergia" id="alergia">
                        </div>
                        <div class="form__field">
                            <label for="ordenMedica">Orden Médica</label>
                            <input type="file" name="ordenMedica" id="ordenMedica">
                        </div>
                        <div class="form__field">
                            <label for="reanimacion">Reanimación </label>
                            <label for="requiereReanimacion" class="form--checkbox">El paciente quiere reanimación
                                <input type="checkbox" name="requiereReanimacion" id="requiereReanimacion">
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
                                <div id="ailments_selected"></div>
                            </div>
                        </div>
                    </div>                
                    <!-- <input type="submit" class="button button--primary button--submit" value="Guardar"> -->
                </form>
            </div>
        </section>

        <section class="main__content main__info-servicios">
            <header class="info-servicios__header">
                    <h1>Información del servicio</h1>
            </header>
            <div class="info-servicios__body">
                <form class="form__info-paciente" id="formInfoServicio">
                    <div>
                        <div class="form__field">
                            <label for="inicioServicio">Fecha de Inicio</label>
                            <input type="date" value="2020-05-01" name="inicioServicio" id="inicioServicio">
                        </div>

                        <div class="form__field">
                            <label for="finServicio">Fecha de terminación (opcional)</label>
                            <input type="date" value="2020-05-01" name="finServicio" id="finServicio">
                        </div>

                        <div class="form__field form__field--doble">
                            <div>
                                <label for="sexoECA">Sexo ECA</label>
                                <select name="sexoECA" id="sexoECA">
                                    <option value="0">Indiferente</option>
                                    <option value="1">Femenino</option>
                                    <option value="2">Masculino</option>
                                </select>
                            </div>
                            <div>
                                <label for="tipoServicio">Tipo de Servcio</label>
                                <select name="tipoServicio" id="tipoServicio">
                                    <?php foreach ($service_types as $serv): ?>
                                        <option value="<?php echo $serv['id']; ?>"><?php echo $serv['name']; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <div class="form__field">
                            <label for="tipoDeCuidado">Tipo de Cuidado</label>
                            <select name="tipoDeCuidado" id="tipoDeCuidado">
                                <?php foreach ($care_types as $care): ?>
                                    <option value="<?php echo $care['id']; ?>"><?php echo $care['name']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="form__field form__field--doble">
                            <div>
                                <label for="duracionServicio">Duración</label>
                                <select name="duracionServicio" id="duracionServicio">
                                <!-- <input type="text" value="12 horas" name="duracionServicio" id="duracionServicio"> -->
                                    <?php foreach ($durations as $duration) { ?>
                                        <option value="<?php echo $duration['id']; ?>"><?php echo $duration['name']; ?></option>
                                    <?php }; ?>
                                </select>
                            </div>

                            <div>
                                <label>Entrada</label>                                
                                <div style="flex-direction: row;">
                                    <select name="entradaHora" id="entradaHora">                                        
                                        <option value="01">01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                        <option value="06">06</option>
                                        <option value="07">07</option>
                                        <option value="08">08</option>
                                        <option value="09">09</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12" selected>12</option>
                                    </select>
                                    <select name="entradaMinutos" id="entradaMinutos">
                                        <option value="00" selected>00</option>
                                        <option value="25">15</option>
                                        <option value="30">30</option>
                                        <option value="45">45</option>
                                    </select>
                                    <select name="entradaMeridiem" id="entradaMeridiem">
                                        <option value="am" selected>am</option>
                                        <option value="pm">pm</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="form__field">
                            <label for="complexion">Complexión</label>
                            <select name="complexion" id="complexion">
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
                    <!-- <input type="submit" class="button button--primary button--submit" value="Guardar"> -->
                    </form>
                <div>
                    <button 
                        class="button button--primary" 
                        style="width: 100%; display: flex; justify-content: center; align-items: center; margin-top: 20px;"
                        onclick="saveAll()"
                        type="button"
                    >GUARDAR</button>
                </div>
            </div>
        </section>

    </div>
</main>

<script type="text/javascript">
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
    let client_id = 0;
    let patient_id = 0;


    const saveAll = () => {
        if (patient_id!=0){
            save_new_service(null);
        }else{
            save_new_patient(save_new_service(null));
        }
    }
</script>

<script type="text/javascript">

    function save_new_client(on_end) {
        const clienteEmpresa = $("#clienteEmpresa").is(":checked");
        $.ajax({
            url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=save_new_client",
            data:{
                type_id:clienteEmpresa?2:1,
                require_billing:$("#requiereFactura").val(),
                name:$("#nombreCliente").val(),
                lastname:$("#apellidosCliente").val(),
                phone:$("#telefonoCliente").val(),
                email:$("#mailCliente").val(),
                comments:$("#comentariosCliente").val()
            },
            success: function(res){
                console.log(res);
                let cl = JSON.parse(res);
                client_id = cl.id;
                on_end();
            }
        });
    }

    function save_new_billing_information(on_end) {
        const nombreCliente = $("#nombreCliente").val();
        const apellidosCliente = $("#apellidosCliente").val();
        const telefonoCliente = $("#telefonoCliente").val();
        const mailCliente = $("#mailCliente").val();
        const requiereFactura = $("#requiereFactura").val();
        const comentariosCliente = $("#comentariosCliente").val();

        if (
            nombreCliente === '' || 
            apellidosCliente === '' || 
            telefonoCliente === '' || 
            mailCliente === ''
        ) {
            alert("Se deben llenar los campos obligatorios. ");
            return;
        }

        save_new_client(function() {
            save_new_patient();
        })        

        console.log(infoPaciente);

        const razonSocial = $("#razonSocial").val();
        const esquemaDeFacturacion = $("#esquemaDeFacturacion").val();
        const rfc = $("#rfc").val();
        const emailInfoFinanciera = $("#emailInfoFinanciera").val();
        const uso = $("#uso").val();
        const regimenDeFacturacion = $("#regimenDeFacturacion").val();
        const calleInfoFin = $("#calleInfoFin").val();
        const numeroExteriorInfoFin = $("#numeroExteriorInfoFin").val();
        const numeroInteriorInfoFin = $("#numeroInteriorInfoFin").val();
        const coloniaInfoFin = $("#coloniaInfoFin").val();
        const delegacionInfoFin = $("#delegacionInfoFin").val();
        const cpInfoFin = $("#cpInfoFin").val();
        const estadoInfoFin = $("#estadoInfoFin").val();
        const paisInfoFin = $("#paisInfoFin").val();

        if (requiereFactura==1){
            if (
                razonSocial === '' || 
                rfc === '' || 
                emailInfoFinanciera === '' || 
                calleInfoFin === '' || 
                numeroExteriorInfoFin === '' || 
                coloniaInfoFin === '' || 
                delegacionInfoFin === '' || 
                cpInfoFin === '' || 
                estadoInfoFin === '' || 
                paisInfoFin === ''
                ) {
                alert("Se deben llenar los campos obligatorios. ");
                return;
            }

            let datos = {
                client_id,
                bussines_name:razonSocial,
                billing_scheme_id:esquemaDeFacturacion,
                rfc,
                email:emailInfoFinanciera,
                use_id:uso,
                billing_regime_id:regimenDeFacturacion,
                street:calleInfoFin,
                exterior:numeroExteriorInfoFin,
                interior:numeroInteriorInfoFin,
                suburb:coloniaInfoFin,
                zipcode:cpInfoFin,
                state:estadoInfoFin,
                country:paisInfoFin,
                townhall:delegacionInfoFin
            }

            $.ajax({
                url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=save_new_billing_info",
                data: datos,
                success: function(res){
                    console.log(res);
                }
            });
        }
    }


    function save_new_patient(on_end) {
        const nombrePaciente = $("#nombrePaciente").val();
        const fechaNacimiento = $("#fechaNacimiento").val();
        const sexoPaciente = $("#sexoPaciente").val();
        const peso = $("#peso").val();
        const estatura = $("#estatura").val();
        const callePaciente = $("#callePaciente").val();
        const numeroExteriorPaciente = $("#numeroExteriorPaciente").val();
        const numeroInteriorPaciente = $("#numeroInteriorPaciente").val();
        const coloniaPaciente = $("#coloniaPaciente").val();
        const delegacionPaciente = $("#delegacionPaciente").val();
        const cpPaciente = $("#cpPaciente").val();
        const estadoPaciente = $("#estadoPaciente").val();
        const paisPaciente = $("#paisPaciente").val();
        const medicoTratante = $("#medicoTratante").val();
        const contactoDeEmergencia = $("#contactoDeEmergencia").val();
        const telEmergencia1 = $("#telEmergencia1").val();
        const telEmergencia2 = $("#telEmergencia2").val();
        const diagnostico = $("#diagnostico").val();
        const comentarioPaciente = $("#comentarioPaciente").val();
        const alergia = $("#alergia").val();
        const ordenMedica = $("#ordenMedica").val();
        const requiereReanimacion = $("#requiereReanimacion").is(":checked");

        let ails = "(";
        $(ailments).each(function(index,element) {
            ails+=element.id+",";
        });
        ails = ails.slice(0,-1)+")";

        const infoPaciente = {
            client_id,
            name:nombrePaciente,
            birthdate:fechaNacimiento,
            gender:sexoPaciente,
            weight:peso,
            height:estatura,
            street:callePaciente,
            exterior:numeroExteriorPaciente,
            interior:numeroInteriorPaciente,
            suburb:coloniaPaciente,
            townhall:delegacionPaciente,
            zipcode:cpPaciente,
            state:estadoPaciente,
            paisPaciente,
            doctor:medicoTratante,
            emergency_contact:contactoDeEmergencia,
            emergency_phone:telEmergencia1,
            emergency_phone2:telEmergencia2,
            diagnosis:diagnostico,
            comments:comentarioPaciente,
            allergies:alergia,
            medical_order:ordenMedica,
            want_reanimation:requiereReanimacion?1:0,
            ailments: ails
        };

        $.ajax({
            url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=save_new_patient",
            data:infoPaciente,
            success: function(res) {
                console.log(res)
                res = JSON.parse(res)
                patient_id = res.id;
                on_end();
            }
        })
    }

    function save_new_service(on_end) {
        const fechaInicio = $("#fechaInicio").val();
        const fechaFin = $("#fechaFin").val();
        const sexoInfoServicio = $("#sexoInfoServicio").val();
        const tipoDeServicio = $("#tipoDeServicio").val();
        const tipoDeCuidado = $("#tipoDeCuidado").val();
        const duracion = $("#duracion").val();
        const entrada = $("#entradaHora").val() + ":" + $("#entradaMinutos").val() + " " + $("#entradaMeridiem").val();
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
                console.log(JSON.parse(res));
                if (on_end!=null) on_end();
                alert("Servicio guardado correctamente");  
            }
        })
    }
</script>

<script type="text/javascript">
    $("#requiereFactura").on("change",function() {
        $("#billing_container").toggle();
    });
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
    setAilments();
    function selectAilment() {
        ailments.push({id:Number($("#padecimientos").val()),name:$("#padecimientos option:selected").text()});
        $("#padecimientos option[value='"+$("#padecimientos").val()+"']").remove();
        $("#padecimientos").val(0);
        setAilments();
    }
    function deleteAilment(id) {
        let ac = ailments.filter(item => item.id === id);
        $("#padecimientos").append("<option value='"+id+"'>"+ac[0].name+"</option>")
        ailments = ailments.filter(item => item.id !== id);
        setAilments();
    }
    function setAilments() {
        let ms = "";
        for (var i = 0; i < ailments.length; i++) {
            let m = ailments[i];
            ms+='<span id="selected_ailment_'+m.id+'" name="'+m.name+'" class="ailment-tag">'+m.name+' <span><i onclick="deleteAilment('+m.id+')" class="fas fa-times"></i></span></span>';
        }
        $("#ailments_selected").html(ms);
    }
</script>