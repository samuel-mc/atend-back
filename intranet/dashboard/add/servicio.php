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
                        <input type="text" value="<?php echo (isset($client) ? $client["name"]:""); ?>" id="nombreCliente">
                    </div>
                    <div class="form__field">
                        <label for="apellidosCliente">Apellido(s) *</label>
                        <input type="text" value="<?php echo (isset($client) ? $client["lastname"]:""); ?>" id="apellidosCliente">
                    </div>
                    <div class="form__field">
                        <label for="telefonoCliente">Teléfono *</label>
                        <input type="number" value="<?php echo (isset($client) ? $client["phone"]:""); ?>" id="telefonoCliente">
                    </div>
                    <div class="form__field">
                        <label for="mailCliente">Mail *</label>
                        <input type="mail" value="<?php echo (isset($client) ? $client["email"]:""); ?>" id="mailCliente">
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
                    <input type="submit" class="button button--primary button--submit" value="Guardar">

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
                            <input type="number" value="" name="numeroExteriorInfoFin" id="numeroExteriorInfoFin">
                        </div>
                        <div class="form__field">
                            <label for="numeroInteriorInfoFin">Número Interior</label>
                            <input type="number" value="" name="numeroInteriorInfoFin" id="numeroInteriorInfoFin">
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
                        <input type="submit" class="button button--primary button--submit" value="Guardar">
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
                                <input type="number" value="" name="numeroExteriorPaciente" id="numeroExteriorPaciente">
                            </div>

                            <div>
                                <label for="numeroInteriorPaciente">Número Int</label>
                                <input type="number" value="" name="numeroInteriorPaciente" id="numeroInteriorPaciente">
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
                            <input type="text" value="Mauricio López" name="medicoTratante" id="medicoTratante">
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
                            <input type="text" name="ordenMedica" id="ordenMedica">
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

                    <input type="submit" class="button button--primary button--submit" value="Guardar">
                </form>
            </div>
        </section>

        <!-- <section class="main__content main__info-servicios" id="infoServicio">
            <header class="info-servicios__header">
                <div>
                    <h1>Información de Servicios</h1>
                    <h3 id="serviciosResume" class="servicios__header--text">Enfermería Gral. | Oncológico | 12 hrs | 8:00am</h3>
                </div>
                <div>
                    <button class="button button--transparent" id="buttonDisplayServicio">
                        <i class="fa-solid fa-angle-down"></i>
                    </button>
                </div>
            </header>
            <div class="info-servicios__body hidden" id="infoServicio">
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
                                    <option value="femenino">Femenino</option>
                                    <option value="masculino">Masculino</option>
                                </select>
                            </div>
                            <div>
                                <label for="tipoServicio">Tipo de Servcio</label>
                                <select name="tipoServicio" id="tipoServicio">
                                    <option value="enfermeriaGral">Enfermería Gral.</option>
                                    <option value="otro">Otro</option>
                                </select>
                            </div>
                        </div>

                        <div class="form__field">
                            <label for="tipoDeCuidado">Tipo de Cuidado</label>
                            <select name="tipoDeCuidado" id="tipoDeCuidado">
                                <option value="oncologico">Oncológico</option>
                                <option value="otro">Otro</option>
                            </select>
                        </div>

                        <div class="form__field form__field--doble">
                            <div>
                                <label for="duracionServicio">Duración</label>
                                <input type="text" value="12 horas" name="duracionServicio" id="duracionServicio">
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
                                <option value="indiferente">Indiferente</option>
                                <option value="otro">Otro</option>
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
                            <input type="number" value="1950" id="precioCliente" name="precioCliente">
                        </div>

                        <div class="form__field">
                            <label for="precioEca">Precio ECA</label>
                            <input type="number" value="750" id="precioEca" name="precioEca">
                        </div>
                    </div>

                    <div>
                        <div class="form__field">
                            <label for="frecDelServicio">Frecuencia del Servicio</label>
                            <select name="frecDelServicio" id="frecDelServicio">
                                <option value="">Otro</option>
                                <option value="1">Diariamente</option>
                            </select>
                            <div class="field__checkbox">
                                <input type="checkbox" id="lunes" name="lunes" value="lunes">
                                <label for="lunes"> Lunes</label><br>
                            </div>
                            <div class="field__checkbox">
                                <input type="checkbox" id="martes" name="martes" value="martes">
                                <label for="martes"> Martes </label><br>
                            </div>
                            <div class="field__checkbox">
                                <input type="checkbox" id="miercoles" name="miercoles" value="miercoles">
                                <label for="miercoles"> Miércoles </label><br>
                            </div>
                            <div class="field__checkbox">
                                <input type="checkbox" id="jueves" name="jueves" value="jueves">
                                <label for="jueves"> Jueves </label><br>
                            </div>
                            <div class="field__checkbox">
                                <input type="checkbox" id="viernes" name="viernes" value="viernes">
                                <label for="viernes"> Viernes </label><br>
                            </div>
                            <div class="field__checkbox">
                                <input type="checkbox" id="sabado" name="sabado" value="sabado">
                                <label for="sabado"> Sábado </label><br>
                            </div>
                            <div class="field__checkbox">
                                <input type="checkbox" id="domingo" name="domingo" value="domingo">
                                <label for="domingo"> Domingo </label><br>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="button button--primary button--submit" value="Guardar">
                </form>
            </div>
        </section> -->

        <section class="main__content main__add--cotainer">
            <header class="main__header--servicios">
                <h1>Información de Servicio</h1>
            </header>
            <div>
                <form class="form__info-paciente" id="formInfoServicio">
                    <div>
                        <div class="form__field">
                            <label for="apellidosCliente">Fecha de Inicio</label>
                            <input type="date" value="2020-05-01" name="fechaInicio" id="fechaInicio">
                        </div>

                        <div class="form__field">
                            <label for="apellidosCliente">Fecha de terminación (opcional)</label>
                            <input type="date" name="fechaFin" id="fechaFin">
                        </div>

                        <div class="form__field form__field--doble">
                            <div>
                                <label for="sexoInfoServicio">Sexo ECA</label>
                                <select name="sexoInfoServicio" id="sexoInfoServicio">
                                    <option value="femenino">Femenino</option>
                                    <option value="masculino">Masculino</option>
                                </select>
                            </div>
                            <div>
                                <label for="sexo">Tipo de Servcio</label>
                                <select name="tipoDeServicio" id="tipoDeServicio">
                                    <option value="enfermeriaGral">Enfermería Gral.</option>
                                    <option value="otro">Otro</option>
                                </select>
                            </div>
                        </div>

                        <div class="form__field">
                            <label for="tipoDeCuidado">Tipo de Cuidado</label>
                            <select name="tipoDeCuidado" id="tipoDeCuidado">
                                <option value="oncologico">Oncológico</option>
                                <option value="otro">Otro</option>
                            </select>
                        </div>

                        <div class="form__field form__field--doble">
                            <div>
                                <label for="duracion">Duración</label>
                                <input type="text" value="12 horas" name="duracion" id="duracion">
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
                                <option value="indiferente">Indiferente</option>
                                <option value="otro">Otro</option>
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
                            <input type="number" value="1950" id="precioCliente" name="precioCliente">
                        </div>

                        <div class="form__field">
                            <label for="precioEca">Precio ECA</label>
                            <input type="number" value="750" id="precioEca" name="precioEca">
                        </div>
                    </div>

                    <div>
                        <div class="form__field">
                            <label for="frecDelServicio">Frecuencia del Servicio</label>
                            <select name="frecDelServicio" id="frecDelServicio">
                                <option value="0">Otro</option>
                                <option value="1">Lunes a Viernes</option>
                                <option value="2">Todos los días</option>
                            </select>
                            <div class="frecDelServicio--otro">
                                <div class="field__checkbox">
                                    <input type="checkbox" id="lunes" name="lunes" value="lunes">
                                    <label for="lunes"> Lunes</label><br>
                                </div>
                                <div class="field__checkbox">
                                    <input type="checkbox" id="martes" name="martes" value="martes">
                                    <label for="martes"> Martes </label><br>
                                </div>
                                <div class="field__checkbox">
                                    <input type="checkbox" id="miercoles" name="miercoles" value="miercoles">
                                    <label for="miercoles"> Miércoles </label><br>
                                </div>
                                <div class="field__checkbox">
                                    <input type="checkbox" id="jueves" name="jueves" value="jueves">
                                    <label for="jueves"> Jueves </label><br>
                                </div>
                                <div class="field__checkbox">
                                    <input type="checkbox" id="viernes" name="viernes" value="viernes">
                                    <label for="viernes"> Viernes </label><br>
                                </div>
                                <div class="field__checkbox">
                                    <input type="checkbox" id="sabado" name="sabado" value="sabado">
                                    <label for="sabado"> Sábado </label><br>
                                </div>
                                <div class="field__checkbox">
                                    <input type="checkbox" id="domingo" name="domingo" value="domingo">
                                    <label for="domingo"> Domingo </label><br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="button button--primary button--submit" value="Guardar">

                </form>
            </div>
        </section>

        <!-- <section class="main__buttons">
            <div>
                <button class="button button--primary button--circle">
                    <i class="fas fa-plus"></i>
                </button>
                <h3>Nuevo servicio</h3>
            </div>
        </section> -->

    </div>
</main>

<script> //Script que desplega los dias de las semana si el user selecciona otro
    const frecDelServicio = document.getElementById('frecDelServicio');
    frecDelServicio.addEventListener('change', (e) => {
        if (e.target.value === '0') {
            document.querySelector('.frecDelServicio--otro').style.display = 'block';
        } else {
            document.querySelector('.frecDelServicio--otro').style.display = 'none';
        }
    });
</script>

<script> //Script para manejar el submit de los formularios
    let client_id = <?php echo (isset($client) ? $client["id"] : 0); ?>;

    // Manejo del formulario "Cliente"
    const formInfoCliente = document.querySelector('#formInfoCliente');
    formInfoCliente.addEventListener('submit', (e) => {
        e.preventDefault();        
        const clienteEmpresa = $("#clienteEmpresa").is(":checked");
        const nombreCliente = $("#nombreCliente").val();
        const apellidosCliente = $("#apellidosCliente").val();
        const telefonoCliente = $("#telefonoCliente").val();
        const mailCliente = $("#mailCliente").val();
        const requiereFactura = $("#requiereFactura").val();
        const comentariosCliente = $("#comentariosCliente").val();

        if (nombreCliente === '' || apellidosCliente === '' || telefonoCliente === '' || mailCliente === '') {
            alert("Se deben llenar los campos obligatorios. ");
            return;
        }

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
                alert("Cliente guardado correctamente");
            }
        });
    });

    // Manejo del formulario "Informacion Financiera"
    const formInfoFinanciera = document.querySelector('#formInfoFinanciera');
    formInfoFinanciera.addEventListener('submit', (e) => {
        e.preventDefault();

        if (client_id === 0) {
            alert('Primero debes crear un cliente.');
            return;
        }

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

        $.ajax({
            url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=save_new_billing_info",
            data:{
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
            },
            success: function(res){
                console.log(res)
                alert("Información financiera guardada correctamente");
            }
        });
    });

    // Manejo del formulario "Informacion del paciente"
    const formInfoPaciente = document.querySelector('#formInfoPaciente');
    formInfoPaciente.addEventListener('submit', (e) => {
        e.preventDefault();

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

        const id = $("#patient_id").val();
        
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
            url:"<?php echo __ROOT__; ?>/bridge/routes.php?action="+(id!=0?"update_patient":"save_new_patient"),
            data:infoPaciente,
            success: function(res) {
                console.log(res)
            }
        })
    });

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
        if (frecDelServicio === 0) {
            if ($("#lunes").is(":checked")) {
                diasFrecuencia.push(1);
            }
            if ($("#martes").is(":checked")) {
                diasFrecuencia.push(2);
            }
            if ($("#miercoles").is(":checked")) {
                diasFrecuencia.push(3);
            }
            if ($("#jueves").is(":checked")) {
                diasFrecuencia.push(4);
            }
            if ($("#viernes").is(":checked")) {
                diasFrecuencia.push(5);
            }
            if ($("#sabado").is(":checked")) {
                diasFrecuencia.push(6);
            }
            if ($("#domingo").is(":checked")) {
                diasFrecuencia.push(7);
            }
        }
        const costo = $("#costo").val();
        const comentarioServicio = $("#comentarioServicio").val();

        const infoServicio = {
            client_id,
            start_date:fechaInicio,
            end_date:fechaFin,
            eca_sex: sexoInfoServicio,
            service_type: tipoDeServicio,
            care_type: tipoDeCuidado,
            duration: duracion,
            entry: entrada,
            complexion_id: complexion,
            insurance: calParaSeguro === 'si' ? 1 : 0,
            cost: precioCliente,
            eca_cost: precioEca,
            frequency: frecDelServicio,
            frequency_days: diasFrecuencia,
        };

        console.log(infoServicio);
        // $.ajax({
        //     // url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=save_new_service",
        //     data:infoServicio,
        //     success: function(res) {
        //         console.log(res)
        //     }
        // })
    });
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