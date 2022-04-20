<main class="main">
    <div>
        <section class="main__form--top" id="main">
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
                        <input type="text" value="Mario" id="nombreCliente">
                    </div>
                    <div class="form__field">
                        <label for="apellidosCliente">Apellido(s) *</label>
                        <input type="text" value="Hernández Campuzano" id="apellidosCliente">
                    </div>
                    <div class="form__field">
                        <label for="telefonoCliente">Teléfono *</label>
                        <input type="number" value="554905849" id="telefonoCliente">
                    </div>
                    <div class="form__field">
                        <label for="mailCliente">Mail *</label>
                        <input type="mail" value="mariohc@gmail.com" id="mailCliente">
                    </div>
                    <div class="form__field">
                        <label for="requiereFactura">Requiere Factura</label>
                        <select name="requiereFactura" id="requiereFactura">
                            <option value="si">Sí</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                    <div class="form__field">
                        <label for="factura">Comentarios (opcional)</label>
                        <input type="text" value="None" id="comentariosCliente">
                    </div>
                    <input type="submit" class="button button--primary button--submit" value="Guardar">

                </form>
            </div>
            <div class="main__content">
                <header class="main__header--servicios">
                    <h1>Info Financiera</h1>
                </header>

                <form action="" class="form__info-cliente form__doble-column" id="formInfoFinanciera">
                    <div>
                        <div class="form__field">
                            <label for="razonSocial">Razón social</label>
                            <input type="text" value="Mario Hernández Campuzando" name="razonSocial" id="razonSocial">
                        </div>
                        <div class="form__field">
                            <label for="esquemaDeFacturacion">Esquema de facturación</label>
                            <select name="esquemaDeFacturacion" id="esquemaDeFacturacion">
                                <option value="nacional">Nacional</option>
                                <option value="internacional">Internacional</option>
                            </select>
                        </div>
                        <div class="form__field">
                            <label for="rfc">RFC</label>
                            <input type="text" value="MDHR349774F" name="rfc" id="rfc">
                        </div>
                        <div class="form__field">
                            <label for="emailInfoFinanciera">Correo Electrónico</label>
                            <input type="mail" value="mariohc@gmail.com" name="emailInfoFinanciera" id="emailInfoFinanciera">
                        </div>
                        <div class="form__field">
                            <label for="uso">Uso</label>
                            <select name="uso" id="uso">
                                <option value="gastos en general">Gastos en general</option>
                                <option value="otro">Otro</option>
                            </select>
                        </div>
                        <div class="form__field">
                            <label for="regimenDeFacturacion">Régimen de Facturación</label>
                            <select name="regimenDeFacturacion" id="regimenDeFacturacion">
                                <option value="personasMorales">Personas morales</option>
                                <option value="otro">Otro</option>
                            </select>
                        </div>
                        <div class="form__field">
                            <label for="calleInfoFin">Calle</label>
                            <input type="text" value="Río Rhin" name="calleInfoFin" id="calleInfoFin">
                        </div>
                    </div>

                    <div>
                        <div class="form__field">
                            <label for="numeroExteriorInfoFin">Número Exterior</label>
                            <input type="number" value="280" name="numeroExteriorInfoFin" id="numeroExteriorInfoFin">
                        </div>
                        <div class="form__field">
                            <label for="numeroInteriorInfoFin">Número Interior</label>
                            <input type="number" value="5" name="numeroInteriorInfoFin" id="numeroInteriorInfoFin">
                        </div>
                        <div class="form__field">
                            <label for="coloniaInfoFin">Colonia</label>
                            <input type="text" value="Cuauhtémoc" name="coloniaInfoFin" id="coloniaInfoFin">
                        </div>
                        <div class="form__field">
                            <label for="delegacionInfoFin">Delegación</label>
                            <input type="text" value="Cuauhtémoc" name="delegacionInfoFin" id="delegacionInfoFin">
                        </div>
                        <div class="form__field">
                            <label for="cpInfoFin">Código Postal</label>
                            <input type="number" value="06500" name="cpInfoFin" id="cpInfoFin">
                        </div>
                        <div class="form__field">
                            <label for="estadoInfoFin">Ciudad / Estado</label>
                            <input type="text" value="CDMX" name="estadoInfoFin" id="estadoInfoFin">
                        </div>
                        <div class="form__field">
                            <label for="paisInfoFin">País</label>
                            <input type="text" value="México" name="paisInfoFin" id="paisInfoFin">
                        </div>
                        <input type="submit" class="button button--primary button--submit" value="Guardar">
                    </div>
                </form>
            </div>
        </section>

        <section class="main__content main__add--cotainer">
            <header class="main__header--servicios">
                <h1>Info del paciente</h1>
            </header>
            <div>
                <form class="form__info-paciente" id="formInfoPaciente">
                    <div>
                        <div class="form__field">
                            <label for="nombrePaciente">Nombre del paciente </label>
                            <input type="text" value="María Pérez Prieto" name="nombrePaciente" id="nombrePaciente">
                        </div>
                        <div class="form__field form__field--doble">
                            <div>
                                <label for="fechaNacimiento">Fecha de Nacimmiento</label>
                                <input type="date" name="fechaNacimiento" id="fechaNacimiento">
                            </div>
                            <div>
                                <label for="sexoPaciente">Sexo</label>
                                <select name="sexoPaciente" id="sexoPaciente">
                                    <option value="femenino">Femenino</option>
                                    <option value="masculino">Masculino</option>
                                </select>
                            </div>
                        </div>

                        <div class="form__field form__field--doble">
                            <div>
                                <label for="peso">Peso</label>
                                <input type="text" value="92 kg" name="peso" id="peso">
                            </div>

                            <div>
                                <label for="estatura">Estatura</label>
                                <input type="text" value="170 cm" name="estatura" id="estatura">
                            </div>
                        </div>

                        <div class="form__field">
                            <label for="callePaciente">Calle </label>
                            <input type="text" value="Río Rhín" name="callePaciente" id="callePaciente">
                        </div>

                        <div class="form__field form__field--doble">
                            <div>
                                <label for="numeroExteriorPaciente">Número Ext</label>
                                <input type="number" value="1609" name="numeroExteriorPaciente" id="numeroExteriorPaciente">
                            </div>

                            <div>
                                <label for="numeroInteriorPaciente">Número Int</label>
                                <input type="number" value="12" name="numeroInteriorPaciente" id="numeroInterion">
                            </div>
                        </div>

                        <div class="form__field form__field--doble">
                            <div>
                                <label for="coloniaPaciente">Colonia</label>
                                <input type="text" value="Cuauhtémoc" name="coloniaPaciente" id="coloniaPaciente">
                            </div>

                            <div>
                                <label for="delegacionPaciente">Delegación</label>
                                <input type="number" value="Cuauhtémoc" name="delegacionPaciente" id="delegacionPaciente">
                            </div>
                        </div>

                        <div class="form__field form__field--doble">
                            <div>
                                <label for="cpPaciente">CP</label>
                                <input type="number" value="06500" name="cpPaciente" id="cpPaciente">
                            </div>

                            <div>
                                <label for="estadoPaciente">Estado</label>
                                <input type="text" value="CDMX" name="estadoPaciente" id="estadoPaciente">
                            </div>
                        </div>

                        <div class="form__field">
                            <label for="paisPaciente">País </label>
                            <input type="text" value="México" name="paisPaciente" id="paisPaciente">
                        </div>

                        <div class="form__field">
                            <label for="medicoTratante">Médico Tratante </label>
                            <input type="text" value="Mauricio López" name="medicoTratante" id="medicoTratante">
                        </div>

                        <div class="form__field">
                            <label for="contactoDeEmergencia">Contacto de Emergencia </label>
                            <input type="text" value="Laura Hernández" name="contactoDeEmergencia" id="contactoDeEmergencia">
                        </div>

                        <div class="form__field form__field--doble">
                            <div>
                                <label for="telEmergencia1">Tel emergencia 1</label>
                                <input type="tel" value="5530473340" name="telEmergencia1" id="telEmergencia1">
                            </div>

                            <div>
                                <label for="telEmergencia2">Tel emergencia 2</label>
                                <input type="tel" value="5539609402" name="telEmergencia2" id="telEmergencia2">
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
                            <select name="padecimientos" id="padecimientos">
                                <option value="">Seleccionar Padecimientos</option>
                                <option value="1">Padecimiento 1</option>
                                <option value="2">Padecimiento 2</option>
                                <option value="3">Padecimiento 3</option>
                            </select>
                        </div>
                    </div>

                    <input type="submit" class="button button--primary button--submit" value="Guardar">
                </form>
            </div>
        </section>

        <section class="main__content main__info-servicios">
            <header class="info-servicios__header">
                <div>
                    <h1>Información de Servicio</h1>
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
        </section>

        <section class="main__content main__add--cotainer">
            <header class="main__header--servicios">
                <h1>Información de Servicio</h1>
            </header>
            <div>
                <form action="" class="form__info-paciente">
                    <div>
                        <div class="form__field">
                            <label for="apellidosCliente">Fecha de Inicio</label>
                            <input type="date" value="2020-05-01">
                        </div>

                        <div class="form__field">
                            <label for="apellidosCliente">Fecha de terminación (opcional)</label>
                            <input type="date">
                        </div>

                        <div class="form__field form__field--doble">
                            <div>
                                <label for="sexo">Sexo ECA</label>
                                <select name="sexo" id="sexo">
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
                                <option value="">Otro</option>
                                <option value="1">Padecimiento 1</option>
                                <option value="2">Padecimiento 2</option>
                                <option value="3">Padecimiento 3</option>
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
                </form>
            </div>
        </section>

        <section class="main__buttons">
            <div>
                <button class="button button--primary button--circle">
                    <i class="fas fa-plus"></i>
                </button>
                <h3>Nuevo servicio</h3>
            </div>
        </section>

    </div>
</main>

<script>
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
            url:"add_info_cliente",
            data:{
                clienteEmpresa,
                nombreCliente,
                apellidosCliente,
                telefonoCliente,
                mailCliente,
                requiereFactura,
                comentariosCliente
            },
            success: function(res){
                alert("Cliente guardado correctamente");
            }
        });
    });

    const formInfoFinanciera = document.querySelector('#formInfoFinanciera');
    formInfoFinanciera.addEventListener('submit', (e) => {
        e.preventDefault();

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
            url:"add_info_financiera",
            data:{
                razonSocial,
                esquemaDeFacturacion,
                rfc,
                emailInfoFinanciera,
                uso,
                regimenDeFacturacion,
                calleInfoFin,
                numeroExteriorInfoFin,
                numeroInteriorInfoFin,
                coloniaInfoFin,
                delegacionInfoFin,
                cpInfoFin,
                estadoInfoFin,
                paisInfoFin
            },
            success: function(res){
                alert("Información financiera guardada correctamente");
            }
        });
    });

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
        const requiereReanimacion = $("#requiereReanimacion").is(":checked");;
        
        const infoPaciente = {
            nombrePaciente,
            fechaNacimiento,
            sexoPaciente,
            peso,
            estatura,
            callePaciente,
            numeroExteriorPaciente,
            numeroInteriorPaciente,
            coloniaPaciente,
            delegacionPaciente,
            cpPaciente,
            estadoPaciente,
            paisPaciente,
            medicoTratante,
            contactoDeEmergencia,
            telEmergencia1,
            telEmergencia2,
            diagnostico,
            comentarioPaciente,
            alergia,
            ordenMedica,
            requiereReanimacion
        };
        
        console.log(infoPaciente);
    });
</script>