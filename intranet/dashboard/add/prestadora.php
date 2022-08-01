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
                        <!--<i class="fa-solid fa-upload"></i>-->
                        <input type="file" id="profile_photo">
                    </div>
                    <div class="form__field">
                        <label>Es empresa</label>
                            <label for="esEmpresa" class="form--checkbox">Sí, es empresa
                                <input type="checkbox" id="esEmpresa" name="esEmpresa">
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
                            <input type="mail" value="marcelap@gmail.com" id="main" name="email">
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
                                <option value="1">Femenino</option>
                                <option value="2">Masculino</option>
                            </select>
                        </div>
                        <div>
                            <label for="availability">Disponibilidad</label>
                            <select name="availability" id="availability">
                                <option value="1">Diario</option>
                                <option value="2">Otro</option>
                            </select>
                        </div>
                    </div>
                    <div class="form__field form__field--doble">
                        <div>
                            <label for="estatus">Estatus</label>
                            <select name="estatus" id="estatus">
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
                        <label for="professional_profile">Perfil profesional</label>
                        <input type="text" value="" placeholder="Enfermera General" name="professional_profile" id="professional_profile">
                    </div>
                    <div class="form__field form__field--doble">
                        <div>
                            <label for="profile_id">Perfil Atend</label>
                            <select name="profile_id" id="profile_id">
                                <option value="1">Auxiliar</option>
                                <option value="2">Otro</option>
                            </select>
                        </div>
                        <div>
                            <label for="level">Nivel</label>
                            <select name="level" id="level">
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
                            <label for="zipcode">Código postal (opcional) </label>
                            <input type="number" value="06700" name="zipcode" id="zipcode">
                        </div>
                    </div>
                    <div class="form__field">
                        <label for="signature_url">Firma para bitácoras *</label>
                        <div>
                            <input type="file" name="signature_url" id="signature_url">
                            <!--<i class="fa-solid fa-download"></i>-->
                        </div>
                    </div>
                    <div class="form__field">
                        <label for="comment">Comentarios *</label>
                        <input type="text" value="Aquí va un comentario" name="comment" id="comment">
                    </div>
                    <div>
                        <a class="button button--primary button--submit" onclick="save_new_provider()">Guardar</a>
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
                        <div class="container">
                            <div class="row">
                                <div class="col-6">
                                    <input type="checkbox" id="enfermeraGeneral" name="enfermeraGeneral" class="mt-4"> 
                                </div>
                                <div class="col-6">
                                    Alta Santander
                                </div>
                            </div>
                        </div>
                        <div>
                            <a class="button button--primary button--submit">Guardar</a>
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

<script type="text/javascript">
    $(function() {
        //$('#formInfoPrestadora')[0].reset();
        //$(':input').val('');
    })
</script>

<style type="text/css">
    .form__field--avanzada{
        float: left;
        width: 50%;
        padding: 10px 15px;
    }
</style>

<script type="text/javascript">
    function uploadProfilePhoto(on_end) {
        let image = new FormData();
        image.append('image', $("#profile_photo")[0].files[0]);
        image.append('name', $("#profile_photo")[0].files[0].name);

        $.ajax({
            url:"<?php echo __ROOT__; ?>/bridge/uploadImage.php",
            type:"POST",
            data: image,
            enctype: 'multipart/form-data',
            processData: false,  // tell jQuery not to process the data
            contentType: false,   // tell jQuery not to set contentType,
            success: function(res) {
                console.log(res);
                res = JSON.parse(res)
                if (res.success==true){
                    on_end(res.name)
                }else{
                    alert(res.message);
                }
            }
        });
    }

    function uploadSignature(on_end) {
        let image = new FormData();
        image.append('image', $("#signature_url")[0].files[0]);
        image.append('name', $("#signature_url")[0].files[0].name);

        $.ajax({
            url:"<?php echo __ROOT__; ?>/bridge/uploadImage.php",
            type:"POST",
            data: image,
            enctype: 'multipart/form-data',
            processData: false,  // tell jQuery not to process the data
            contentType: false,   // tell jQuery not to set contentType,
            success: function(res) {
                console.log(res);
                res = JSON.parse(res)
                if (res.success==true){
                    on_end(res.name)
                }else{
                    alert(res.message);
                }
            }
        });
    }
</script>

<script> // Script que maneja la información de la prestadora.

    function save_new_provider() {
        const formInfoPrestadora = document.getElementById('formInfoPrestadora');
        const formData = new FormData(formInfoPrestadora);
        const url = formInfoPrestadora.getAttribute('action');
        const data = {};
        formData.forEach(function(value, key){
            data[key] = value;
        });

        if(data?.esEmpresa) {
            data.is_business = 2;
        } else {
            data.is_business = 1;
        }

        uploadProfilePhoto(function(name) {
            console.log(name)
            data.profile_photo = "<?php echo __ROOT__; ?>"+name;
            console.log(data)
            uploadSignature(function(firma) {
                data.signature = firma;
                $.ajax({
                    url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=save_new_provider",
                    data: data,
                    success: function(res){
                        console.log(res)
                        alert("Prestadora agregada correctamente");
                        //location.href = "<?php echo __ROOT__; ?>/prestadoras";
                    }
                });
            })
        })
     } 
</script>

<script>
    const formInfoFinanciera = document.getElementById('formInfoFinanciera');
    formInfoFinanciera.addEventListener('submit', function(e){
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