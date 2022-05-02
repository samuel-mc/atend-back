<main class="main">
    <div class="main__add-prestadora">
        <section class="main__form--left">
            <div class="main__content">
                <header class="main__header--servicios">
                    <h1>Información básica</h1>
                </header>

                <form action="" class="form__info-cliente">
                    <div class="image__profile">
                        <svg width="130" height="130" viewBox="0 0 130 130" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="65" cy="65" r="65" fill="#C4C4C4" />
                        </svg> <!-- Acá debería ir la imagen de perfil-->
                        <i class="fa-solid fa-upload"></i>
                    </div>
                    <div class="form__field">
                        <label for="tipoDeCliente">Es empresa</label>
                        <label for="empresa" class="form--checkbox">Sí, es empresa
                            <input type="checkbox">
                        </label>
                    </div>
                    <div class="form__field form__field--doble">
                        <div>
                            <label for="nombreCliente">Nombre</label>
                            <input type="text" value="Marcela">
                        </div>

                        <div>
                            <label for="apellidosCliente">Apellidos</label>
                            <input type="text" value="Pérez Chico">
                        </div>
                    </div>
                    <div class="form__field">
                        <label for="fechaDeNacimiento">Fecha de naciemiento (opcional)</label>
                        <input type="date" value="1991-05-01">
                    </div>
                    <div class="form__field form__field--doble">
                        <div>
                            <label for="altura">Altura (opcional)</label>
                            <input type="number" value="164">
                        </div>
                        <div>
                            <label for="peso">Peso (opcional)</label>
                            <input type="number" value="71">
                        </div>
                    </div>
                    <div class="form__field form__field--doble">
                        <div>
                            <label for="telFijo">Teléfono fijo (opcional)</label>
                            <input type="tel" value="55501890">
                        </div>
                        <div>
                            <label for="telCelular">Celular</label>
                            <input type="tel" value="5572859306">
                        </div>
                    </div>
                    <div class="form__field form__field--doble">
                        <div>
                            <label for="mail">Mail</label>
                            <input type="mail" value="marcelap@gmail.com">
                        </div>
                        <div>
                            <label for="contraseñaAtend">Contraseña Atend</label>
                            <input type="text" value="marc79@*a">
                        </div>
                    </div>
                    <div class="form__field form__field--doble">
                        <div>
                            <label for="sexo">Sexo</label>
                            <select name="sexo" id="sexo">
                                <option value="femenino">Femenino</option>
                                <option value="masculino">Masculino</option>
                            </select>
                        </div>
                        <div>
                            <label for="disponibilidad">Disponibilidad</label>
                            <select name="disponibilidad" id="disponibilidad">
                                <option value="diario">Diario</option>
                                <option value="otro">Otro</option>
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
                            <input type="text" id="razon" value="Incidencia">
                        </div>
                    </div>
                    <div class="form__field">
                        <label for="perfilProfesional">Perfil profesional</label>
                        <input type="text" value="Enfermera General">
                    </div>
                    <div class="form__field form__field--doble">
                        <div>
                            <label for="perfilAtend">Perfil Atend</label>
                            <select name="perfilAtend" id="perfilAtend">
                                <option value="auxiliar">Auxiliar</option>
                                <option value="otro">Otro</option>
                            </select>
                        </div>
                        <div>
                            <label for="nivel">Nivel</label>
                            <select name="nivel" id="nivel">
                                <option value="auxiliar">Avanzada</option>
                                <option value="otro">Otro</option>
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
                            <label for="numeroInterion">Número Int (opcional)</label>
                            <input type="number" value="12" name="numeroInterion" id="numeroInterion">
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
                            <input type="text" value="firma_marcela.png">
                            <i class="fa-solid fa-download"></i>
                        </div>
                    </div>
                    <div class="form__field">
                        <label for="comentarios">Comentarios *</label>
                        <input type="text" value="Aquí va un comentario">
                    </div>
                </form>
            </div>
        </section>
        <section class="main__form--right">
            <div class="main__content">
                <header class="main__header--servicios">
                    <h1>Información Financiera</h1>
                </header>

                <form action="" class="form__info-cliente form__doble-column">
                    <div>
                        <div class="form__field">
                            <label for="rfc">RFC</label>
                            <input type="text" value="MPCR910304GH">
                        </div>
                        <div class="form__field">
                            <label for="curp">CURP</label>
                            <input type="text" value="MPCR910304GH5835">
                        </div>
                        <div class="form__field">
                            <label for="regimenFiscal">Régimen fiscal</label>
                            <input type="text" value="MPCR910Plataformas digitales304GH5835">
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
                            <input type="number" value="00000000000000000">
                        </div>
                        <div class="form__field">
                            <label for="cuenta">Cuenta</label>
                            <input type="number" value="00000000000000000">
                        </div>
                        <div class="form__field">
                            <label for="altaSantander">Alta Santander </label>
                            <label for="enfermeraGeneral" class="form--checkbox"> Enfermera General
                                <input type="checkbox">
                            </label>
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