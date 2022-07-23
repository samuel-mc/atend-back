<main class="main">
    <div class="main__add-prestadora">
        <section class="main__form--left">
            <div class="main__content">
                <header class="main__header--servicios">
                    <h1>Información básica</h1>
                </header>

                <form class="form__info-cliente" id="formInfoPrestadora">
                    <div class="image__profile">
                        <svg width="130" height="130" viewBox="0 0 130 130" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="65" cy="65" r="65" fill="#C4C4C4" />
                        </svg> <!-- Acá debería ir la imagen de perfil-->
                        <i class="fa-solid fa-upload"></i>
                    </div>
                    <div class="form__field">
                        <label>Es empresa</label>
                            <label for="esEmpresa" class="form--checkbox">Sí, es empresa
                                <input type="checkbox" id="esEmpresa" name="esEmpresa" value="true">
                            </label>
                    </div>
                    <div class="form__field form__field--doble">
                        <div>
                            <label for="nombrePrestadora">Nombre</label>
                            <input type="text" value="Marcela" id="nombrePrestadora" name="name">
                        </div>

                        <div>
                            <label for="apellidosPrestadora">Apellidos</label>
                            <input type="text" value="Pérez Chico" name="lastname" id="apellidosPrestadora">
                        </div>
                    </div>
                    <div class="form__field">
                        <label for="fechaDeNacimiento">Fecha de naciemiento (opcional)</label>
                        <input type="date" value="1991-05-01" name="birthdate" id="fechaDeNacimiento">
                    </div>
                    <div class="form__field form__field--doble">
                        <div>
                            <label for="altura">Altura (opcional)</label>
                            <input type="number" value="164" id="altura" name="height">
                        </div>
                        <div>
                            <label for="peso">Peso (opcional)</label>
                            <input type="number" value="71" id="peso" name="weight">
                        </div>
                    </div>
                    <div class="form__field form__field--doble">
                        <div>
                            <label for="telFijo">Teléfono fijo (opcional)</label>
                            <input type="tel" value="55501890" name="phone" id="telFijo">
                        </div>
                        <div>
                            <label for="telCelular">Celular</label>
                            <input type="tel" value="5572859306" name="mobile" id="telCelular">
                        </div>
                    </div>
                    <div class="form__field form__field--doble">
                        <div>
                            <label for="mail">Mail</label>
                            <input type="mail" value="marcelap@gmail.com" id="email" name="email">
                        </div>
                        <div>
                            <label for="contraseñaAtend">Contraseña Atend</label>
                            <input type="text" value="marc79@*a" id="contraseñaAtend" name="password">
                        </div>
                    </div>
                    <div class="form__field form__field--doble">
                        <div>
                            <label for="sexo">Sexo</label>
                            <select name="gender" id="sexo">
                                <option value="">Seleccionar</option>
                                <option value="1">Femenino</option>
                                <option value="2">Masculino</option>
                            </select>
                        </div>
                        <div>
                            <label for="disponibilidad">Disponibilidad</label>
                            <select name="availability" id="disponibilidad">
                                <option value="">Seleccionar</option>
                                <option value="1">Diario</option>
                                <option value="2">Otro</option>
                            </select>
                        </div>
                    </div>
                    <div class="form__field form__field--doble">
                        <div>
                            <label for="estatus">Estatus</label>
                            <select name="estatus" id="estatus">
                                <option value="">Seleccionar</option>
                                <option value="baja">Baja</option>
                                <option value="otro">Otro</option>
                            </select>
                        </div>
                        <div>
                            <label for="razon">Razon</label>
                            <input type="text" id="razon" name="razon" value="Incidencia">
                        </div>
                    </div>
                    <div class="form__field">
                        <label for="perfilProfesional">Perfil profesional</label>
                        <input type="text" value="Enfermera General" name="professional_profile" id="perfilProfesional">
                    </div>
                    <div class="form__field form__field--doble">
                        <div>
                            <label for="perfilAtend">Perfil Atend</label>
                            <select name="atend_profile_id" id="perfilAtend">
                                <option value="">Seleccionar</option>
                                <option value="1">Auxiliar</option>
                                <option value="2">Otro</option>
                            </select>
                        </div>
                        <div>
                            <label for="nivel">Nivel</label>
                            <select name="level" id="nivel">
                                <option value="">Seleccionar</option>
                                <option value="1">Avanzada</option>
                                <option value="2">Otro</option>
                            </select>
                        </div>
                    </div>
                    <div class="form__field form__field--doble">
                        <div>
                            <label for="calle">Calle (opcional) </label>
                            <input type="text" value="Río Rhín" name="calle" id="calle">
                        </div>
                        <div>
                            <label for="numeroExterior">Número Ext (opcional)</label>
                            <input type="number" value="1609" name="numeroExterior" id="numeroExterior">
                        </div>
                    </div>
                    <div class="form__field form__field--doble">
                        <div>
                            <label for="numeroInterior">Número Int (opcional)</label>
                            <input type="number" value="12" name="numeroInterior" id="numeroInterior">
                        </div>
                        <div>
                            <label for="pais">País (opcional) </label>
                            <input type="text" value="Río Rhín" name="pais" id="pais">
                        </div>
                    </div>
                    <div class="form__field form__field--doble">
                        <div>
                            <label for="ciudad">Ciudad (opcional) </label>
                            <input type="text" value="Río Rhín" name="ciudad" id="ciudad">
                        </div>
                        <div>
                            <label for="codigoPostal">Código postal (opcional) </label>
                            <input type="number" value="06700" name="codigoPostal" id="codigoPostal">
                        </div>
                    </div>
                    <div class="form__field">
                        <label for="firma">Firma para bitácoras *</label>
                        <div>
                            <input type="text" value="firma_marcela.png" name="firma" id="firma">
                            <i class="fa-solid fa-download"></i>
                        </div>
                    </div>
                    <div class="form__field">
                        <label for="comentarios">Comentarios *</label>
                        <input type="text" value="Aquí va un comentario" name="comentarios" id="comentarios">
                    </div>
                    <div>
                        <input type="submit" value="Guardar" class="button button--primary button--submit">
                    </div>
                </form>
            </div>
        </section>
        <section class="main__form--right">
            <div class="main__content">
                <header class="main__header--servicios">
                    <h1>Información Financiera</h1>
                </header>

                <form id="formInfoFinanciera" class="form__info-cliente form__doble-column">
                    <div>
                        <div class="form__field">
                            <label for="rfc">RFC</label>
                            <input type="text" value="MPCR910304GH" name="rfc" id="rfc">
                        </div>
                        <div class="form__field">
                            <label for="curp">CURP</label>
                            <input type="text" value="MPCR910304GH5835" name="curp" id="curp">
                        </div>
                        <div class="form__field">
                            <label for="regimenFiscal">Régimen fiscal</label>
                            <input type="text" value="MPCR910Plataformas digitales304GH5835" name="regimenFiscal" id="regimenFiscal">
                        </div>
                        <div class="form__field">
                            <label for="altaSAT">Alta SAT</label>
                            <select name="altaSAT" id="altaSAT">
                                <option value="completa">Completa</option>
                                <option value="otra">Otra</option>
                            </select>
                        </div>
                        <div class="form__field">
                            <label for="eFirma">e.firma</label>
                            <select name="eFirma" id="eFirma">
                                <option value="si">Sí</option>
                                <option value="no">No</option>
                            </select>
                        </div>

                    </div>

                    <div>
                        <div class="form__field">
                            <label for="banco">Banco</label>
                            <select name="banco" id="banco">
                                <option value="BACOM">BACOM</option>
                                <option value="otro">otro</option>
                            </select>
                        </div>
                        <div class="form__field">
                            <label for="clabe">CLABE</label>
                            <input type="number" value="00000000000000000" name="clabe" id="clabe">
                        </div>
                        <div class="form__field">
                            <label for="cuenta">Cuenta</label>
                            <input type="number" value="00000000000000000" name="cuenta" id="cuenta">
                        </div>
                        <div class="form__field">
                            <label for="altaSantander">Alta Santander </label>
                            <label for="enfermeraGeneral" class="form--checkbox"> Enfermera General
                                <input type="checkbox" id="enfermeraGeneral" name="enfermeraGeneral" value="true">
                            </label>
                        </div>
                        <div>
                            <input type="submit" value="Guardar" class="button button--primary button--submit">
                        </div>
                    </div>
                </form>
            </div>

            <div class="main__content">
                <header class="main__header--servicios">
                    <h1>Información avanzada</h1>
                </header>
                <form action="" class="form__info-cliente">
                    <div>

                        <?php $i = 1; foreach($provider_skills as $ps){ ?>
                            <div class="form__field--avanzada">
                                <h3><?php echo $ps['name']; ?></h3>
                                <div>
                                    <div class="form__field">
                                        <?php if ($ps['has_practical']){ ?>
                                            <label for="signosVitalesP">Práctico</label>
                                            <select name="signosVitalesP_<?php echo $ps['id']; ?>" id="signosVitalesP_<?php echo $ps['id']; ?>">
                                                <option value="bajo">bajo</option>
                                                <option value="otro">otro</option>
                                            </select>
                                        <?php } ?>
                                    </div>
                                    <div class="form__field">
                                        <?php if ($ps['has_teorical']){ ?>
                                            <label for="signosVitalesT">Teórico</label>
                                            <select name="signosVitalesT_<?php echo $ps['id']; ?>" id="signosVitalesT_<?php echo $ps['id']; ?>">
                                                <option value="bajo">bajo</option>
                                                <option value="otro">otro</option>
                                            </select>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                            <?php if ($i%2==0){ ?>
                                <div style="width: 100%;float: left;"></div>
                            <?php } ?>

                        <?php $i++; } ?>
                    </div>
                </form>
            </div>

        </section>
    </div>
</main>
<!-- <script src="<?php echo __ROOT__; ?>/intranet/assets/js/index.js"></script> -->

<style type="text/css">
    .form__field--avanzada{
        float: left;
        width: 50%;
        padding: 10px 15px;
    }
</style>

<script> // Script que maneja la información de la prestadora. 
    const formInfoPrestadora = document.getElementById('formInfoPrestadora');
    formInfoPrestadora.addEventListener('submit', function(e){

        const nombrePrestadora = document.getElementById('nombrePrestadora').value;
        const apellidosPrestadora = document.getElementById('apellidosPrestadora').value;
        const fechaDeNacimiento = document.getElementById('fechaDeNacimiento').value;
        const altura = document.getElementById('altura').value;
        const peso = document.getElementById('peso').value;
        const telFijo = document.getElementById('telFijo').value;
        const telCelular = document.getElementById('telCelular').value;
        const email = document.getElementById('email').value;
        const contraseñaAtend = document.getElementById('contraseñaAtend').value;
        const sexo = document.getElementById('sexo').value;
        const disponibilidad = document.getElementById('disponibilidad').value;
        const estatus = document.getElementById('estatus').value;
        const razon = document.getElementById('razon').value;
        const perfilProfesional = document.getElementById('perfilProfesional').value;
        const perfilAtend = document.getElementById('perfilAtend').value;
        const nivel = document.getElementById('nivel').value;
        const calle = document.getElementById('calle').value;
        const numeroExterior = document.getElementById('numeroExterior').value;
        const numeroInterior = document.getElementById('numeroInterior').value;
        const pais = document.getElementById('pais').value;
        const ciudad = document.getElementById('ciudad').value;
        const codigoPostal = document.getElementById('codigoPostal').value;

        if (
            nombrePrestadora === '' ||
            apellidosPrestadora === '' ||
            fechaDeNacimiento === '' ||
            altura === '' ||
            peso === '' ||
            telFijo === '' ||
            telCelular === '' ||
            email === '' ||
            contraseñaAtend === '' ||
            sexo === '' ||
            disponibilidad === '' ||
            estatus === '' ||
            razon === '' ||
            perfilProfesional === '' ||
            perfilAtend === '' ||
            nivel === '' ||
            calle === '' ||
            numeroExterior === '' ||
            numeroInterior === '' ||
            pais === '' ||
            ciudad === '' ||
            codigoPostal === ''
        ) {
            alert('Todos los campos son obligatorios');
            e.preventDefault();
            return;
        }

        e.preventDefault();
        const formData = new FormData(formInfoPrestadora);
        const url = formInfoPrestadora.getAttribute('action');
        const data = {};
        formData.forEach(function(value, key){
            data[key] = value;
        });

        if(data?.esEmpresa) {
            data.esEmpresa = true;
        } else {
            data.esEmpresa = false;
        }

        console.log(data);

        $.ajax({
            url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=save_new_provider",
            data: data,
            success: function(res){
                console.log(res)
                alert("Prestadora agregada correctamente");
            }
        });
    });
</script>

<script>
    const formInfoFinanciera = document.getElementById('formInfoFinanciera');
    formInfoFinanciera.addEventListener('submit', function(e){

        const calle = document. getElementById('calle');
        const numeroExterior = document. getElementById('numeroExterior');
        const numeroInterior = document. getElementById('numeroInterior');
        const pais = document. getElementById('pais');
        const ciudad = document. getElementById('ciudad');
        const codigoPostal = document. getElementById('codigoPostal');
        const rfc = document. getElementById('rfc');
        const curp = document. getElementById('curp');
        const regimenFiscal = document. getElementById('regimenFiscal');
        const altaSAT = document. getElementById('altaSAT');
        const eFirma = document. getElementById('eFirma');
        const clabe = document. getElementById('clabe');
        const cuenta = document. getElementById('cuenta');

        if (
            calle === '' ||
            numeroExterior === '' ||
            numeroInterior === '' ||
            pais === '' ||
            ciudad === '' ||
            codigoPostal === '' ||
            rfc === '' ||
            curp === '' ||
            regimenFiscal === '' ||
            altaSAT === '' ||
            eFirma === '' ||
            clabe === '' ||
            cuenta === ''
        ) {
            alert('Todos los campos son obligatorios');
            e.preventDefault();
            return;
        }

        e.preventDefault();
        const formData = new FormData(formInfoFinanciera);
        let data = {};
        formData.forEach(function(value, key){
            data[key] = value;
        });
        if (data?.enfermeraGeneral) {
            data.enfermeraGeneral = true;
        } else {
            data.enfermeraGeneral = false;
        }
        console.log(data);

        $.ajax({
            url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=save_new_billing_info",
            data: data,
            success: function(res){
                console.log(res)
                alert("Información financiera agregada correctamente");
            }
        });
    })
</script>