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
                <div id="buttonSave">
                    <a onclick="save_new_client()" class="button button--primary button--submit">Guardar</a>
                </div>
            </div>

            <div id="billing_container">
                <header class="main__header--servicios">
                    <h1>Info Financiera</h1>
                    <button class="button  button--primary button--circle" type="reset">
                        <i class="far fa-trash-alt"></i>
                    </button>
                </header>

                <div class="nuevo__cliente--doble">
                    <div>
                        <div class="form__field">
                            <label for="razonSocial">Razón social * </label>
                            <input type="text" value="" name="razonSocial" id="razonSocial">
                        </div>
                        <div class="form__field">
                            <label for="esquemaDeFacturacion">Esquema de facturación *</label>
                            <select name="esquemaDeFacturacion" id="esquemaDeFacturacion">
                                <?php  foreach ($billing_schemes as $bs) { ?>
                                        <option value="<?php echo $bs['id']; ?>"><?php echo $bs['name']; ?></option>
                                <?php  } ?>
                            </select>
                        </div>
                        <div class="form__field">
                            <label for="rfc">RFC *</label>
                            <input type="text" value="" name="rfc" id="rfc">
                        </div>
                        <div class="form__field">
                            <label for="emailInfoFinanciera">Correo Electrónico *</label>
                            <input type="mail" value="" name="emailInfoFinanciera" id="emailInfoFinanciera">
                        </div>
                        <div class="form__field">
                            <label for="uso">Uso *</label>
                            <select name="uso" id="uso">
                                <?php  foreach ($billing_uses as $bu) { ?>
                                        <option value="<?php echo $bu['id']; ?>"><?php echo $bu['name']; ?></option>
                                <?php  } ?>
                            </select>
                        </div>
                        <div class="form__field">
                            <label for="regimenDeFacturacion">Régimen de Facturación *</label>
                            <select name="regimenDeFacturacion" id="regimenDeFacturacion">
                                <?php  foreach ($billing_regimes as $br) { ?>
                                        <option value="<?php echo $br['id']; ?>"><?php echo $br['name']; ?></option>
                                <?php  } ?>
                            </select>
                        </div>
                        <div class="form__field">
                            <label for="calleInfoFin">Calle *</label>
                            <input type="text" value="" name="calleInfoFin" id="calleInfoFin">
                        </div>
                    </div>

                    <div>
                        <div class="form__field">
                            <label for="numeroExteriorInfoFin">Número Exterior *</label>
                            <input type="text" value="" name="numeroExteriorInfoFin" id="numeroExteriorInfoFin">
                        </div>
                        <div class="form__field">
                            <label for="numeroInteriorInfoFin">Número Interior</label>
                            <input type="text" value="" name="numeroInteriorInfoFin" id="numeroInteriorInfoFin">
                        </div>
                        <div class="form__field">
                            <label for="coloniaInfoFin">Colonia *</label>
                            <input type="text" value="" name="coloniaInfoFin" id="coloniaInfoFin">
                        </div>
                        <div class="form__field">
                            <label for="delegacionInfoFin">Delegación *</label>
                            <input type="text" value="" name="delegacionInfoFin" id="delegacionInfoFin">
                        </div>
                        <div class="form__field">
                            <label for="cpInfoFin">Código Postal *</label>
                            <input type="text" value="" name="cpInfoFin" id="cpInfoFin">
                        </div>
                        <div class="form__field">
                            <label for="estadoInfoFin">Ciudad / Estado *</label>
                            <input type="text" value="" name="estadoInfoFin" id="estadoInfoFin">
                        </div>
                        <div class="form__field">
                            <label for="paisInfoFin">País *</label>
                            <input type="text" value="" name="paisInfoFin" id="paisInfoFin">
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </section>
</main>

<script type="text/javascript">
    $("#requiereFactura").on("change",function() {
        $("#billing_container").toggle();
    });
</script>

<script type="text/javascript">

    const validateBillingInfo = () => {
        if (
            $("#razonSocial").val() === '' ||
            $("#esquemaDeFacturacion").val() === '' ||
            $("#rfc").val() === '' ||
            $("#emailInfoFinanciera").val() === '' ||
            $("#uso").val() === '' ||
            $("#regimenDeFacturacion").val() === '' ||
            $("#calleInfoFin").val() === '' ||
            $("#numeroExteriorInfoFin").val() === '' ||
            $("#coloniaInfoFin").val() === '' ||
            $("#delegacionInfoFin").val() === '' ||
            $("#cpInfoFin").val() === '' ||
            $("#estadoInfoFin").val() === '' ||
            $("#paisInfoFin").val() === ''
        ) {
            return false;
        }
        return true;
    }

    
    function save_new_client() {

        const clienteEmpresa = $("#clienteEmpresa").is(":checked");
        const type_id = clienteEmpresa?2:1;
        const require_billing = $("#requiereFactura").val();
        const name = $("#nombreCliente").val();
        const lastname = $("#apellidosCliente").val();
        const phone = $("#telefonoCliente").val();
        const email = $("#mailCliente").val();
        const comments = $("#comentariosCliente").val() !== '' ? $("#comentariosCliente").val() : ' ';
    
        if (
            name === '' ||
            lastname == '' ||
            phone == '' ||
            email == ''
        ) {
            alert('Ingresar los campos obligatorios');
            return;
        }

        if (require_billing === '1' && !validateBillingInfo()) {
            alert('Ingresar los campos obligatorios');
            return;
        }

        document.getElementById("buttonSave").innerHTML = '<i class="fas fa-spinner fa-spin"></i>';

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
                if ($("#requiereFactura").val()=="1")
                    save_new_billing_information();
                alert("Información del cliente guardada con éxito");
                // window.location.href = "<?php echo __ROOT__; ?>/";
            }
        });
    }
</script>

<script type="text/javascript">
    function save_new_billing_information() {
        console.log('save_new_billing_information');

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
                alert("Información financiera con éxito");
            }
        });
    }
</script>