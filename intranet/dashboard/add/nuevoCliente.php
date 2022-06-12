<main class="main">
    <section class="main__content">
        <form class="form__nuevo-cliente" id="formInfoCliente">
            <div>
                <header class="main__header--servicios">
                    <h1>Info del cliente</h1>
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
            </div>

            <div>
                <header class="main__header--servicios">
                    <h1>Info Financiera</h1>
                    <button class="button  button--primary button--circle" type="reset">
                        <i class="far fa-trash-alt"></i>
                    </button>
                </header>

                <div class="nuevo__cliente--doble">
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
                    </div>
                </div>
                <input type="submit" class="button button--primary button--submit" value="Guardar">
            </div>
        </form>
    </section>
</main>