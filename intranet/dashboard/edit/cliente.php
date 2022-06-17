<section >
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
            <input type="submit" class="button button--primary button--submit" value="Guardar">
        </form>
    </div>
    <!-- <div class="main__content collapse" id="billing_container">
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
                <input type="submit" class="button button--primary button--submit" value="Guardar"> 
            </div>
        </form>
    </div> -->
</section>

<script> // Handle Editar Cliente
    const formInfoCliente = document.getElementById('formInfoCliente');
    formInfoCliente.addEventListener('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(formInfoCliente);
        const id = <?php echo (isset($client) ? $client["id"]:""); ?>;
        const name = document.getElementById('nombreCliente').value;
        const lastname = document.getElementById('apellidosCliente').value;
        const phone = document.getElementById('telefonoCliente').value;
        const email = document.getElementById('mailCliente').value;
        const require_billing = document.getElementById('requiereFactura').value;
        const comments = document.getElementById('comentariosCliente').value;

        data = {
            id,
            name,
            lastname,
            phone,
            email,
            require_billing,
            comments
        };

        console.log(data);

        $.ajax({
            url: '<?php echo __ROOT__; ?>/bridge/routes.php?action=update_client',
            type: 'GET',
            data,
            success: function(resp) {
                alert('Información actualizada');
                window.location.href = '<?php echo __ROOT__; ?>/cliente/<?php echo $client["id"]; ?>';
            }
        });
    });


</script>