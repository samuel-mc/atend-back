<style type="text/css">
    .form-group > label {
      top: 18px;
      left: 6px;
      position: relative;
      background-color: white;
      padding: 0px 5px 0px 5px;
      font-size: 0.9em;
    }
    .form-group{
        margin-bottom: 0px;
    }
    .form-control.success{
        border-color: #5cb85c !important;
    }
    .form-control.error{
        border-color: #b85c5c !important;
    }
</style>

<div class="modal fade" id="newDeliveryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width: 80%">
        <div class="modal-content">

            <input type="hidden" id="delivery_id" value="0">
            <input type="hidden" id="patient_id" value="0">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo pedido</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body px-0 py-5">
                <div class="container" style="overflow-y:scroll;max-height: 60vh;" id="delivery_container">
                    <div class="row">
                        <div class="col-12">
                            <h6 class="m-0">Datos del pedido</h6>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                               <label>FOLIO DE PACIENTE</label>
                               <input type="text" autocomplete="nope" class="form-control" id="u_id">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                               <label># DE RESERVA</label>
                               <input type="text" autocomplete="nope" class="form-control" id="folio">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                               <label>FECHA</label>
                               <input type="date" class="form-control" id="date" onkeydown="return false">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                               <label>HORARIO</label>
                               <input type="text" autocomplete="nope" class="form-control" id="schedule">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12">
                            <h6 class="m-0">Datos del paciente</h6>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                               <label>NOMBRE</label>
                               <input type="text" autocomplete="nope" class="form-control" id="name">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                               <label>CORREO ELECTRÓNICO</label>
                               <input type="text" autocomplete="nope" class="form-control" id="email">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                               <label>TELÉFONO</label>
                               <input type="text" autocomplete="nope" class="form-control" id="phone">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-12">
                            <h6 class="m-0">Dirección</h6>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                               <label>CALLE Y NÚMERO</label>
                               <input type="text" autocomplete="nope" class="form-control" id="address">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                               <label>ALCALDÍA</label>
                               <input type="text" autocomplete="nope" class="form-control" id="address_townhall">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                               <label>MUNICIPIO</label>
                               <input type="text" autocomplete="nope" class="form-control" id="address_municipality">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                               <label>COLONIA</label>
                               <input type="text" autocomplete="nope" class="form-control" id="address_suburb">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                               <label>PAÍS</label>
                               <select class="form-control" id="country_code">
                                    <option value="" disabled="">Selecciona</option>
                                    <option value="MX">México</option>
                               </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                               <label>ESTADO</label>
                               <select class="form-control" id="state_code">
                                   <option value="" disabled="">Selecciona</option><option value="Aguascalientes">Aguascalientes</option><option value="Baja California">Baja California</option><option value="Baja California Sur">Baja California Sur</option><option value="Campeche">Campeche</option><option value="Chiapas">Chiapas</option><option value="Chihuahua">Chihuahua</option><option value="CDMX">Ciudad de México</option><option value="Coahuila">Coahuila</option><option value="Colima">Colima</option><option value="Durango">Durango</option><option value="Estado de México">Estado de México</option><option value="Guanajuato">Guanajuato</option><option value="Guerrero">Guerrero</option><option value="Hidalgo">Hidalgo</option><option value="Jalisco">Jalisco</option><option value="Michoacán">Michoacán</option><option value="Morelos">Morelos</option><option value="Nayarit">Nayarit</option><option value="Nuevo León">Nuevo León</option><option value="Oaxaca">Oaxaca</option><option value="Puebla">Puebla</option><option value="Querétaro">Querétaro</option><option value="Quintana Roo">Quintana Roo</option><option value="San Luis Potosí">San Luis Potosí</option><option value="Sinaloa">Sinaloa</option><option value="Sonora">Sonora</option><option value="Tabasco">Tabasco</option><option value="Tamaulipas">Tamaulipas</option><option value="Tlaxcala">Tlaxcala</option><option value="Veracruz">Veracruz</option><option value="Yucatán">Yucatán</option><option value="Zacatecas">Zacatecas</option>
                               </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                               <label>CIUDAD</label>
                               <input type="text" autocomplete="nope" class="form-control" id="city">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                               <label>LUGAR DE ENTREGA</label>
                               <input type="text" autocomplete="nope" class="form-control" id="address_place">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                               <label>CÓDIGO POSTAL</label>
                               <input type="text" autocomplete="nope" class="form-control" id="postal_code">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                               <label>REFERENCIA (USO INTERNO)</label>
                               <input type="text" autocomplete="nope" class="form-control" id="address_reference_int">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                               <label>REFERENCIA (DHL)</label>
                               <input type="text" autocomplete="nope" class="form-control" id="address_reference">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-12">
                            <h6 class="m-0">Persona(s) autorizada(s)</h6>
                        </div>
                    </div>
                    <div class="row mt-4" id="auth_users_container"></div>


                    <div class="row mt-4">
                        <div class="col-12">
                            <h6 class="m-0">Medicamento(s)</h6>
                        </div>
                    </div>
                    <div class="row mt-4" id="medication_container"></div>

                    <div class="row mt-4">
                        <div class="col-12">
                            <h6 class="m-0">Anexo(s)</h6>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-4">
                            <div class="form-group">
                                <label>Formato de salida*</label>
                                <input type="file" id="annexes_0" class="form-control" accept="application/pdf">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label>Acuse*</label>
                                <input type="file" id="annexes_1" class="form-control" accept="application/pdf">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label>Reservación SAP*</label>
                                <input type="file" id="annexes_2" class="form-control" accept="image/*">
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                <label>Acuse médico</label>
                                <input type="file" id="annexes_3" class="form-control" accept="application/pdf">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label>Proyección de envíos</label>
                                <input type="file" id="annexes_4" class="form-control" accept=".xlsx">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label>Adicional 1</label>
                                <input type="file" id="annexes_5" class="form-control" accept="application/pdf">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label>Adicional 2</label>
                                <input type="file" id="annexes_6" class="form-control" accept="application/pdf">
                            </div>
                        </div>

                    </div>
                </div>

                <div class="d-none" id="success_container" style="min-height: 60vh;">
                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-5">
                            <img src="<?php echo __ROOT__; ?>/assets/img/success.png" width="100%">
                        </div>
                        <div class="col-5">
                            <h3 style="color:#1038a0;margin-top: 50px;">¡Felicidades!</h3>
                            <h5>Tu pedido fue creado de manera exitosa</h5>
                        </div>
                    </div>
                    <div class="row text-center mt-5">
                        <div class="col-4"></div>
                        <div class="col-4">
                            <center>
                                <button class="btn btn-primary" data-dismiss="modal" type="button" onclick="reload()">Continuar</button>
                            </center>
                        </div>
                    </div>
                </div>

                <div class="d-none" id="error_container">
                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-5">
                            <img src="<?php echo __ROOT__; ?>/assets/img/error.png" width="100%">
                        </div>
                        <div class="col-5">
                            <h3 style="color:#1038a0;margin-top: 50px;">¡Oops!</h3>
                            <h5>Lo sentimos, tu pedido no pude crearse de manera existosa. Inténtalo más tarde.</h5>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-8">
                            <div class="container">
                                <div class="row">
                                    <div class="col-2 text-center">
                                        <div class="circle-loader" id="step_0">
                                            <div class="checkmark draw inactive"></div>
                                            <div class="checkmark-error draw inactive"></div>
                                        </div>
                                        <br>
                                        <p class="loader-step" onclick="setLoading('step_0')">Crear pedido</p>
                                    </div>
                                    <div class="col-2 text-center">
                                        <div class="circle-loader" id="step_1">
                                            <div class="checkmark draw inactive"></div>
                                            <div class="checkmark-error draw inactive"></div>
                                        </div>
                                        <br>
                                        <p class="loader-step" onclick="setLoading('step_1')">Subir documentos</p>
                                    </div>
                                    <div class="col-2 text-center">
                                        <div class="circle-loader" id="step_2">
                                            <div class="checkmark draw inactive"></div>
                                            <div class="checkmark-error draw inactive"></div>
                                        </div>
                                        <br>
                                        <p class="loader-step" onclick="setLoading('step_2')">Crear guía DHL</p>
                                    </div>
                                    <div class="col-2 text-center">
                                        <div class="circle-loader" id="step_3">
                                            <div class="checkmark draw inactive"></div>
                                            <div class="checkmark-error draw inactive"></div>
                                        </div>
                                        <br>
                                        <p class="loader-step" onclick="setLoading('step_3')">Enviar correo almacén</p>
                                    </div>
                                    <div class="col-2 text-center">
                                        <div class="circle-loader" id="step_4">
                                            <div class="checkmark draw inactive"></div>
                                            <div class="checkmark-error draw inactive"></div>
                                        </div>
                                        <br>
                                        <p class="loader-step" onclick="setLoading('step_4')">Email/SMS paciente</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <button class="btn btn-secondary btn-block btn-to-hide" data-dismiss="modal" type="button">Cancelar</button>
                        </div>
                        <div class="col-2">
                            <a class="btn btn-primary btn-block btn-to-hide" onclick="saveDelivery()">Crear</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    let something_failed = false;


    function setLoading(id) {
        $('#'+id+' .checkmark').hide();
        $('#'+id+' .checkmark-error').hide();
        $('#'+id).removeClass('loading');
        $('#'+id).removeClass('error');
        $('#'+id).removeClass('completed');
        $('#'+id).removeClass('inactive');
        $('#'+id).addClass('loading');
    }

    function setCompleted(id) {
        something_failed = false;
        $('#'+id).removeClass('loading');
        $('#'+id).removeClass('error');
        $('#'+id).removeClass('completed');
        $('#'+id).removeClass('inactive');
        $('#'+id).addClass('completed');
        $('#'+id+' .checkmark-error').hide();
        $('#'+id+' .checkmark').show();
    }

    function setFailed(id) {
        something_failed = true;
        $(".btn-to-hide").fadeIn();
        $('#'+id).removeClass("loading");
        $('#'+id).removeClass("inactive");
        $('#'+id).removeClass('completed');
        $('#'+id).addClass('error');
        $('#'+id+' .checkmark').hide();
        $('#'+id+' .checkmark-error').show();
    }

    $('#newDeliveryModal').on('hidden.bs.modal', function () {
        if ($("#delivery_id").val()!=0 && something_failed==true){
            if (!deleteDelivery($("#delivery_id").val())){
                $("#newDeliveryModal").modal("show");
            }
        }
    });

    let drugs = "<option value='0'>Selecciona</option>";
</script>

<script type="text/javascript">

    let auth_users_quantity = 1;

    function addAuth(id) {
        if ($("#auth_name_"+(id-1)).val()||id==0){
            let auth = `<div class="container" id="auth_container_${id}">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                       <label>Nombre</label>
                                       <input type="text" autocomplete="nope" class="form-control" id="auth_name_${id}">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                       <label>Teléfono</label>
                                       <input type="text" autocomplete="nope" class="form-control" id="auth_phone_${id}">
                                    </div>
                                </div>
                                <div class="col-4" style="padding-top:32px;" id="add_auth_container_${id}">
                                    <p class="btn ml-3 text-muted" onclick="addAuth(${id+1});" id="add_auth_btn_${id}">+ Agregar</p>
                                </div>
                            </div>
                            <hr>
                        </div>`;
            $("#auth_users_container").append(auth);
            $("#add_auth_container_"+(id-1)).html(`<p class="btn ml-3 text-muted" onclick="removeAuth(${id-1});">- Remover</p>`);

            auth_users_quantity = id+1;
        }else{
            alert({
                title:"Error",
                text:"Agrega un nombre"
            })
        }
    }

    function removeAuth(id) {
        $(`#auth_container_${id}`).html("");
        $(`#auth_container_${id}`).hide();
    }
</script>

<script type="text/javascript">
    let drugs_delivery_quantity = 1;

    function addDeliveryDrug(id) {
        if ($("#delivery_drug_quantity_"+(id-1)).val()!=0||id==0){
            let drug = `<div class="container" id="drug_container_${id}">
                            <div class="row">
                                <div class="col-2">
                                    <div class="form-group">
                                       <label>Terapia</label>
                                       <select class="form-control" id="delivery_drug_id_${id}">
                                           ${drugs}
                                       </select>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                       <label>Dosis</label>
                                       <select class="form-control" id="delivery_drug_concentration_${id}">
                                           <option value="" disabled="">Selecciona</option>
                                       </select>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                       <label>Lote</label>
                                       <select class="form-control" id="delivery_drug_lote_${id}">
                                           <option value="" disabled="">Selecciona</option>
                                       </select>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                       <label>Cantidad</label>
                                       <input type="number" min="${id}" class="form-control" id="delivery_drug_quantity_${id}">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                       <label>Caducidad</label>
                                       <input type="text" autocomplete="nope" class="form-control" id="delivery_drug_expiration_${id}" disabled>
                                    </div>
                                </div>
                                <div class="col-2" style="padding-top:32px;" id="add_delivery_drug_btn_${id}">
                                    <p class="btn text-muted" onclick="addDeliveryDrug(${id+1});">+ Agregar</p>
                                </div>
                            </div>
                            <hr>
                        </div>`;
            $("#medication_container").append(drug);
            $("#add_delivery_drug_btn_"+(id-1)).html(`<p class="btn text-muted" onclick="removeDrug(${id-1});">- Remover</p>`);

            
            let _id_ = id;
            $("#delivery_drug_id_"+id).on("change",function() {
                let _id = $(this).val();
                $.ajax({
                    url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=getDrugConcentrations",
                    data:{
                        name_id:_id
                    },
                    success:function(res) {
                        res = JSON.parse(res)
                        console.log(res)
                        let cons = "<option value=''>Selecciona</option>";
                        $.each(res,function(index,con){
                            cons += `<option value="${con.id}">${con.name}</option>`
                        });
                        $("#delivery_drug_concentration_"+_id_).html(cons);
                    }
                }); 
            });

            let _drugs = null;

            $("#delivery_drug_concentration_"+id).on("change",function() {
                let _id = $(this).val();
                $.ajax({
                    url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=getDrugLotes",
                    data:{
                        concentration_id:_id,
                        name_id:$("#delivery_drug_id_"+_id_).val()
                    },
                    success:function(res) {
                        _drugs = JSON.parse(res)
                        let lotes = "<option value=''>Selecciona</option>";
                        $.each(_drugs,function(index,dr){
                            if (dr.quantity!=null && dr.quantity>0)
                                lotes += `<option value="${dr.id}">${dr.lote}<small style="font-size:9px;"> (${dr.quantity})</small></option>`
                        });
                        $("#delivery_drug_lote_"+_id_).html(lotes);

                        $("#delivery_drug_lote_"+_id_).on("change",function() {
                            let selected = _drugs.filter(x => x.id == $(this).val())[0];
                            $("#delivery_drug_quantity_"+_id_).attr("max",selected.quantity);
                            $("#delivery_drug_expiration_"+_id_).val(selected.expiration_date);
                        });

                        $("#delivery_drug_quantity_"+_id_).on("input",function() {
                            if (Number($(this).attr('max'))<Number($(this).val())){
                                $(this).val($(this).attr('max'));
                            }
                        })

                    }
                })
            });


            drugs_delivery_quantity = id+1;

        }else{
            alert({
                title:"Error",
                text:"Agrega al menos un medicamento"
            })
        }
    }

    function removeDrug(id) {
        $(`#drug_container_${id}`).html("");
        $(`#drug_container_${id}`).hide();
    }
</script>

<script type="text/javascript">

    function validate_patient() {
         if ($("#u_id").val()==""){
            $("#u_id").addClass("error");
            return false;
        }
         if ($("#folio").val()==""){
            $("#folio").addClass("error");
            return false;
        }
        if ($("#date").val()==""){
            $("#date").addClass("error");
            return false;
        }
        if ($("#schedule").val()==""){
            $("#schedule").addClass("error");
            return false;
        }
        if ($("#name").val()==""){
            $("#name").addClass("error");
            return false;
        }
        if ($("#email").val()==""){
            $("#email").addClass("error");
            return false;
        }
        if ($("#phone").val()=="" || $("#phone").val().length != 10){
            $("#phone").addClass("error");
            return false;
        }

        if ($("#u_id").val()==""){
            $("#u_id").addClass("error");
            return false;
        }
        if ($("#folio").val()==""){
            $("#folio").addClass("error");
            return false;
        }
        if ($("#date").val()==""){
            $("#date").addClass("error");
            return false;
        }
        if ($("#address").val()==""){
            $("#address").addClass("error");
            return false;
        }
        if ($("#address_townhall").val()==""){
            $("#address_townhall").addClass("error");
            return false;
        }
        if ($("#address_municipality").val()==""){
            $("#address_municipality").addClass("error");
            return false;
        }
        if ($("#address_suburb").val()==""){
            $("#address_suburb").addClass("error");
            return false;
        }
        if ($("#country_code").val()==""){
            $("#country_code").addClass("error");
            return false;
        }
        if ($("#state_code").val()==""){
            $("#state_code").addClass("error");
            return false;
        }
        if ($("#city").val()==""){
            $("#city").addClass("error");
            return false;
        }
        if ($("#address_place").val()==""){
            $("#address_place").addClass("error");
            return false;
        }
        if ($("#postal_code").val()==""){
            $("#postal_code").addClass("error");
            return false;
        }
        if ($("#address_reference_int").val()==""){
            $("#address_reference_int").addClass("error");
            return false;
        }
        if ($("#address_reference").val()==""){
            $("#address_reference").addClass("error");
            return false;
        }

        return true;
    }

    function validate_address() {
        if ($("#address").val()==""){
            $("#address").addClass("error");
            return false;
        }
        if ($("#address_townhall").val()==""){
            $("#address_townhall").addClass("error");
            return false;
        }
        if ($("#address_municipality").val()==""){
            $("#address_municipality").addClass("error");
            return false;
        }
        if ($("#address_suburb").val()==""){
            $("#address_suburb").addClass("error");
            return false;
        }
        if ($("#city").val()==""){
            $("#city").addClass("error");
            return false;
        }
        if ($("#postal_code").val()=="" || $("#postal_code").val().length < 5){
            $("#postal_code").addClass("error");
            return false;
        }
        return true;
    }
</script>

<script type="text/javascript">

    let titles = ["Formato de salida","Acuse","Reservación SAP","Acuse médico","Proyección de envíos","Adicional 1","Adicional 2"];
    let uploaded = [false,false,false,false,false,false,false];

    function saveDelivery() {
        $(".btn-to-hide").fadeOut();

        $(".error").removeClass("error");

        if ($("#delivery_id").val()==0){
            setLoading("step_0");

            if (!validate_patient() || !validate_address())
                setFailed("step_0");


            let auths = [];
            for (var i = 0; i < auth_users_quantity; i++) {
                if ($("#auth_name_"+i).val()!=""){
                    auths.push({name:$("#auth_name_"+i).val(),phone:$("#auth_phone_"+i).val()});
                }else{
                    if ($("#auth_name_"+i).length){
                        setFailed("step_0");
                        $("#auth_name_"+i).addClass("error");
                        $("#auth_phone_"+i).addClass("error");
                        return;
                    }
                }
            }

            let delivery_drugs = [];
            for (var i = 0; i < drugs_delivery_quantity; i++) {
                let q = $("#delivery_drug_quantity_"+i).val();
                if (q){
                    q = Number(q);
                    if (q>0){
                        delivery_drugs.push({id:$("#delivery_drug_lote_"+i).val(),quantity:q});
                    }
                }else{
                    if (i==0){
                        setFailed("step_0");
                        $("#delivery_drug_quantity_"+i).addClass("error");
                        $("#delivery_drug_id_"+i).addClass("error");
                        $("#delivery_drug_lote_"+i).addClass("error");
                        $("#delivery_drug_concentration_"+i).addClass("error");
                        $("#delivery_drug_expiration_"+i).addClass("error");
                        return;
                    }
                }
            }
            $.ajax({
                url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=newDelivery",
                data:{
                    patient_id:$("#patient_id").val(),
                    u_id:$("#u_id").val(),
                    folio:$("#folio").val(),
                    date:$("#date").val(),
                    schedule:$("#schedule").val(),
                    name:$("#name").val(),
                    email:$("#email").val(),
                    phone:$("#phone").val(),
                    address:$("#address").val(),
                    address_townhall:$("#address_townhall").val(),
                    address_municipality:$("#address_municipality").val(),
                    address_suburb:$("#address_suburb").val(),
                    country_code:$("#country_code").val(),
                    state_code:$("#state_code").val(),
                    city:$("#city").val(),
                    address_place:$("#address_place").val(),
                    postal_code:$("#postal_code").val(),
                    address_reference_int:$("#address_reference_int").val(),
                    address_reference:$("#address_reference").val(),
                    auths,
                    drugs:delivery_drugs
                },
                success:function(res) {
                    res = JSON.parse(res)
                    $("#delivery_id").val(res.id);
                    setCompleted("step_0");
                    uploadDocuments()
                }
            });
        }else{
            loaded = 0;
            uploadDocuments();
        }
    }

    let total_to_load = 3;
    let loaded = 0;

    function uploadDocuments() {
        setLoading("step_1");
        
        var images = new FormData();
        
        for (var i = 0; i < 7; i++) {
            if (uploaded[i]==false){
                let file = $("#annexes_"+i).prop('files')[0];
                if (file){
                    console.log("Tratando de subir: "+i+" y ya son "+total_to_load);
                    images.append("file", file);
                    images.append("id", i);
                    $.ajax({
                        url: '<?php echo __ROOT__; ?>/bridge/uploadFile.php',
                        type: 'post',
                        data: images,
                        contentType: false,
                        processData: false,
                        success: function(response){
                            let res = JSON.parse(response)
                            console.log(res)
                            if (res.success==true){
                                uploaded[res.id]=res.success;
                                $("#annexes_"+res.id).prop("disabled",true);
                                $("#annexes_"+res.id).addClass("success");
                                $("#annexes_"+res.id).removeClass("error");
                                setDeliveryDocument(res);
                            }else{
                                $("#annexes_"+res.id).addClass("error");
                                alert({title:"error",text:"Hubo un problema al subir: "+titles[res.id]+"\n("+res.message+")"});
                                setFailed("step_1");
                            }
                        }
                    });
                }else{
                    if (i<3){
                        alert({title:"Error",text:"El archivo es obligatorio: "+titles[i]});
                        $("#annexes_"+i).addClass("error");
                        setFailed("step_1");
                    }
                }
            }else{
                
            }
        }
    }

    let doc_uploaded = false;

    function setDeliveryDocument(doc) {
        $.ajax({
            url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=UploadDocuments",
            data:{
                delivery_id:$("#delivery_id").val(),
                type:(Number(doc.id)+1),
                name:titles[doc.id],
                url:doc.name
            },
            success:function() {
                total_to_load = 3;
                for (var i = 0; i < 7; i++) {
                    let file = $("#annexes_"+i).prop('files')[0];
                        if (file){ if (i>2) total_to_load++ };
                }
                loaded = uploaded.filter(x=>x==true).length;
                console.log("Total: "+total_to_load+", cargados: "+loaded);
                if (loaded==total_to_load){
                    console.log("Todo subido")
                    if (doc_uploaded==false){
                        doc_uploaded = true;
                        console.log("Pedir DHL")
                        getDhlLabel();
                        setCompleted("step_1");
                    }
                }
            }
        });
    }

    function getDhlLabel(id = 0,on_end = null) {
        setLoading("step_2");
        $.ajax({
            url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=createShipment",
            data:{
                delivery_id:id!=0?id:$("#delivery_id").val()
            },
            success:function(res) {
                try{
                    res = JSON.parse(res)
                }catch(error){
                    saveProblem(id,"Error al generar etiqueta de DHL");
                    setFailed("step_2");
                }
                console.log(res)
                if (res.success==false){
                    saveProblem(id,"Error al generar etiqueta de DHL "+res.message);
                    setFailed("step_2");
                }else{
                    $.ajax({
                        url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=UploadDocuments",
                        data:{
                            delivery_id:id!=0?id:$("#delivery_id").val(),
                            type:20,
                            name:res.trackingNumber,
                            url:res.url
                        },
                        success:function() {
                            setCompleted("step_2");
                            setCompleted("step_3");
                            setCompleted("step_4");

                            $("#success_container").removeClass("d-none");
                            $("#delivery_container").addClass("d-none");
                            setTimeout(function() {
                                reload(); 
                            },5000);

                            //if (on_end!=null)
                            //    on_end(res)                  
                            //sendInfoToStore(id);  
                        }
                    });
                }
            }
        })
    }

    function sendInfoToStore(id=0) {
        setLoading("step_3");
        $.ajax({
            url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=sendStoreEmail",
            data:{
                delivery_id:id!=0?id:$("#delivery_id").val(),
            },
            success:function(res) {
                console.log(res)
                res = JSON.parse(res)
                if (res.success==true){
                    setCompleted("step_3");
                    sendInfoToPatient(id);
                }else{
                    alert({title:"error",text:"Error al enviar correo al almacén: \n"+res.message,time:10000});
                    setFailed("step_3")
                    saveProblem(id,"Error al enviar correo al almacén: "+res.message)
                }
            }
        })
    }

    function sendInfoToPatient(id=0) {
        id = id!=0?id:$("#delivery_id").val();
        setLoading("step_4");
        $.ajax({
            url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=sendPatientEmail",
            data:{
                delivery_id:id,
            },
            success:function(res) {
                res = JSON.parse(res)
                if (res.success==true){
                    $.ajax({
                        url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=sendPatientSMS",
                        data:{
                            delivery_id:id,
                        },
                        success:function(res) {
                            res = JSON.parse(res)
                            if (res.success==true){
                                setCompleted("step_4");
                                $("#success_container").removeClass("d-none");
                                $("#delivery_container").addClass("d-none");
                                setTimeout(function() {
                                    reload(); 
                                },5000);
                            }else{
                                alert({title:"error",text:"Error al enviar SMS al paciente: \n"+res.message,time:10000});
                                setFailed("step_4")
                                saveProblem(id,"Error al enviar SMS al paciente: "+res.message)
                            }
                        }
                    })
                }else{
                    alert({title:"error",text:"Error al enviar correo al paciente: \n"+res.message,time:10000});
                    setFailed("step_4")
                    saveProblem(id,"Error al enviar email al paciente: "+res.message)
                }
            }
        })
    }

    function reload() {
        location.reload(true); 
    }

</script>



<script type="text/javascript">

    var typingTimer;                //timer identifier
    var doneTypingInterval = 250;  //time in ms, 5 second for example
    var $input = $('#u_id');

    //on keyup, start the countdown
    $input.on('keyup', function () {
      clearTimeout(typingTimer);
      typingTimer = setTimeout(doneTyping, doneTypingInterval);
    });

    //on keydown, clear the countdown 
    $input.on('keydown', function () {
      clearTimeout(typingTimer);
    });

    //user is "finished typing," do something
    function doneTyping () {
        $.ajax({
            url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=getPatient",
            data:{
                u_id:$("#u_id").val()
            },
            success: function(res) {
                res = JSON.parse(res);
                if (res!=null){
                    $("#patient_id").val(res.id);
                    $("#name").val(res.name);
                    $("#email").val(res.email);
                    $("#phone").val(res.phone);
                    $("#address").val(res.address);
                    $("#address_townhall").val(res.address_townhall);
                    $("#address_municipality").val(res.address_municipality);
                    $("#address_suburb").val(res.address_suburb);
                    $("#country_code").val(res.country_code);
                    $("#state_code").val(res.state_code);
                    $("#city").val(res.city);
                    $("#address_place").val(res.address_place);
                    $("#postal_code").val(res.postal_code);
                    $("#address_reference_int").val(res.address_reference_int);
                    $("#address_reference").val(res.address_reference);
                }
            }
        })
    }
</script>


<div class="modal fade" id="deliveryDetailsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width:60%">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detalles del pedido</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="delivery_details_id">
                
                <fieldset class="row border p-2 m-2">
                    <legend  class="w-auto mb-0" style="font-size:12px;">Status del pedido</legend>
                    <div class="col-12 text-center">
                        <div class="card px-0 pb-0 mt-3 mb-3">
                            <form id="msform">
                                <ul id="progressbar" class="p-0">
                                    <li id="delivery_status_1">
                                        <span class="progress-icon">
                                            <i class="fas fa-file-alt"></i>    
                                        </span>
                                        <p style="font-size:10px;line-height: 1;">
                                            <strong id="delivery_status_1_text">Pedido generado</strong>
                                        </p>
                                    </li>
                                    <li id="delivery_status_2">
                                        <span class="progress-icon">
                                            <i class="fas fa-people-carry"></i>  
                                        </span>
                                        <p style="font-size:10px;line-height: 1;">
                                            <strong id="delivery_status_2_text">Entregado a paciente</strong>
                                        </p>
                                    </li>
                                    <li id="delivery_status_3">
                                        <span class="progress-icon">
                                            <i class="fas fa-shipping-fast"></i>   
                                        </span>
                                        <p style="font-size:10px;line-height: 1;">
                                            <strong id="delivery_status_3_text">Pedido recolectado</strong>
                                        </p>
                                    </li>
                                    <li id="delivery_status_4">
                                        <span class="progress-icon">
                                            <i class="fas fa-archive"></i>  
                                        </span>
                                        <p style="font-size:10px;line-height: 1;">
                                            <strong id="delivery_status_4_text">Pedido entregado</strong>
                                        </p>
                                    </li>
                                </ul>
                            </form>
                        </div>
                    </div>
                    <a class="btn btn-link btn-sm" id="btn_dhl_details" style="color:#035dbf;font-weight: bold;">Ver detalles en DHL</a>
                </fieldset>

                <fieldset class="row border p-2 m-2">
                    <legend  class="w-auto mb-0" style="font-size:12px;">Datos del pedido</legend>
                    <div class="col-3">
                        <span style="font-size:12px;">FOLIO DEL PACIENTE: </span>
                        <br>
                        <span style="font-weight:bold" id="details_patient_u_id"></span>
                    </div>
                    <div class="col-3">
                        <span style="font-size:12px;"># DE RESERVA: </span>
                        <br>
                        <span style="font-weight:bold" id="details_folio"></span>
                    </div>
                    <div class="col-3">
                        <span style="font-size:12px;">FECHA: </span>
                        <br>
                        <span style="font-weight:bold" id="details_date"></span>
                    </div>
                    <div class="col-3">
                        <span style="font-size:12px;">HORARIO: </span>
                        <br>
                        <span style="font-weight:bold" id="details_schedule"></span>
                    </div>
                </fieldset>
                <fieldset class="row border p-2 m-2">
                    <legend  class="w-auto mb-0" style="font-size:12px;">Datos del paciente</legend>
                    <div class="col-4">
                        <span style="font-size:12px;">NOMBRE: </span>
                        <br>
                        <span style="font-weight:bold" id="details_patient_name"></span>
                    </div>
                    <div class="col-5">
                        <span style="font-size:12px;">CORREO ELECTRÓNICO: </span>
                        <br>
                        <span style="font-weight:bold" id="details_patient_email"></span>
                    </div>
                    <div class="col-3">
                        <span style="font-size:12px;">TELÉFONO: </span>
                        <br>
                        <span style="font-weight:bold" id="details_patient_phone"></span>
                    </div>
                </fieldset>

                <fieldset class="row border p-2 m-2">
                    <legend  class="w-auto mb-0" style="font-size:12px;">Dirección</legend>
                    <div class="col-4">
                        <span style="font-size:12px;">CALLE Y NÚMERO: </span>
                        <br>
                        <span style="font-weight:bold" id="details_patient_address_address"></span>
                    </div>
                    <div class="col-4">
                        <span style="font-size:12px;">ALCALDÍA: </span>
                        <br>
                        <span style="font-weight:bold" id="details_patient_address_townhall"></span>
                    </div>
                    <div class="col-4">
                        <span style="font-size:12px;">MUNICIPIO: </span>
                        <br>
                        <span style="font-weight:bold" id="details_patient_address_municipality"></span>
                    </div>
                    <div class="col-4">
                        <span style="font-size:12px;">COLONIA: </span>
                        <br>
                        <span style="font-weight:bold" id="details_patient_address_suburb"></span>
                    </div>
                    <div class="col-4">
                        <span style="font-size:12px;">PAÍS: </span>
                        <br>
                        <span style="font-weight:bold" id="details_patient_address_country_code"></span>
                    </div>

                    <div class="col-4">
                        <span style="font-size:12px;">ESTADO: </span>
                        <br>
                        <span style="font-weight:bold" id="details_patient_address_state"></span>
                    </div>
                    <div class="col-4">
                        <span style="font-size:12px;">CIUDAD: </span>
                        <br>
                        <span style="font-weight:bold" id="details_patient_address_city"></span>
                    </div>
                    <div class="col-4">
                        <span style="font-size:12px;">CÓDIGO POSTAL: </span>
                        <br>
                        <span style="font-weight:bold" id="details_patient_address_postal_code"></span>
                    </div>
                    <div class="col-4">
                        <span style="font-size:12px;">LUGAR DE ENTREGA: </span>
                        <br>
                        <span style="font-weight:bold" id="details_patient_address_place"></span>
                    </div>
                    <div class="col-6">
                        <span style="font-size:12px;">REFERENCIA (USO INTERNO): </span>
                        <br>
                        <span style="font-weight:bold" id="details_patient_address_reference_int"></span>
                    </div>
                    <div class="col-6">
                        <span style="font-size:12px;">REFERENCIA (DHL): </span>
                        <br>
                        <span style="font-weight:bold" id="details_patient_address_reference"></span>
                    </div>
                </fieldset>

                <fieldset class="row border p-2 m-2">
                    <legend  class="w-auto mb-0" style="font-size:12px;">Persona(s) autorizada(s)</legend>
                    <div class="col-12">
                        <div class="container">
                            <div class="row" id="details_auth_users_container"></div>
                        </div>
                    </div>
                </fieldset>


               <fieldset class="row border p-2 m-2">
                   <legend  class="w-auto mb-0" style="font-size:12px;">Medicamento(s)</legend>
                   <div class="col-12">
                       <div class="container">
                           <div class="row" id="details_medication_container"></div>
                       </div>
                   </div>
               </fieldset>

               <fieldset class="row border p-2 m-2">
                   <legend  class="w-auto mb-0" style="font-size:12px;">Anexos</legend>
                   <div class="col-12">
                       <div class="container">
                           <div class="row" id="details_documents_container"></div>
                       </div>
                   </div>
               </fieldset>

               <fieldset class="row border p-2 m-2">
                   <legend  class="w-auto mb-0" style="font-size:12px;">Evidencia</legend>
                   <div class="col-12">
                       <div class="container">
                           <div class="row" id="details_evidence_container"></div>
                       </div>
                   </div>
               </fieldset>

            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="button" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    let stats_s = ["Pedido generado","Entregado a paciente","Pedido recolectado","Pedido entregado","5","Pedido eliminado"];

    function viewDetails(id) {
        $("#delivery_details_id").val(id);
        $.ajax({
            url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=getDeliveryDetails",
            data:{
                delivery_id:id
            },
            success: function(res) {
                res = JSON.parse(res)
                console.log(res)
                $("#deliveryDetailsModal").modal("show");
                $("#details_patient_u_id").html(res.patient.u_id);
                $("#details_folio").html(res.folio);
                $("#details_date").html(res.date);
                $("#details_schedule").html(res.schedule);

                $("#details_patient_name").html(res.patient.name);
                $("#details_patient_email").html(res.patient.email);
                $("#details_patient_phone").html(res.patient.phone);

                $("#details_patient_address_address").html(res.patient.address)
                $("#details_patient_address_townhall").html(res.patient.address_townhall)
                $("#details_patient_address_municipality").html(res.patient.address_municipality)
                $("#details_patient_address_suburb").html(res.patient.address_suburb)
                $("#details_patient_address_country_code").html(res.patient.country_code)
                $("#details_patient_address_state").html(res.patient.state_code)
                $("#details_patient_address_city").html(res.patient.city)
                $("#details_patient_address_place").html(res.patient.address_place)
                $("#details_patient_address_postal_code").html(res.patient.postal_code)
                $("#details_patient_address_reference_int").html(res.patient.address_reference_int)
                $("#details_patient_address_reference").html(res.patient.address_reference)

                $("#btn_dhl_details").prop("onclick",null).off("click");
                $("#btn_dhl_details").on("click",function() {
                    window.open("https://mydhl.express.dhl/mx/es/tracking.html#/results?id="+res.shipment_id_number,"_blank");
                })

                let auths = "<ul>";
                $.each(res.auth_user,function(index,us) {
                    auths+=`<li>${us.name} <small><strong>${us.phone!=null?us.phone:''}</strong></small></li>`;
                }); 
                auths+=`</ul>`;
                $("#details_auth_users_container").html(auths);

                let drugs = "<ul>";
                $.each(res.drugs,function(index,dr) {
                    drugs+=`<li>${dr.quantity}x ${dr.name.name}<small> - ${dr.concentration.name} (Lote: <strong>${dr.lote}</strong>)</small></li>`;
                }); 
                drugs+=`</ul>`;
                $("#details_medication_container").html(drugs);

                let docs = "<ul class='list-inline'>";
                let evidences = '<div class="col-12">'; 
                $.each(res.documents,function(index,doc) {
                    if (doc.type<8)
                        docs+=`<li class="list-inline-item"><a class="btn btn-primary btn-sm m-2" href="<?php echo __ROOT__; ?>/${doc.url}" target="_blank">${titles[doc.type-1]}</a></li>`;
                    if (doc.type==20)
                        docs+=`<li class="list-inline-item"><a class="btn btn-warning btn-sm m-2" href="<?php echo __ROOT__; ?>/${doc.url}" target="_blank">Guía DHL</a></li>`;
                    if (doc.type==8){
                        evidences+=`<img src="<?php echo __ROOT__; ?>/${doc.url}" style="height:60px;width:auto;" onclick="viewImage('${doc.url}')" class="btn">`
                    }
                }); 
                docs+="</ul>";
                evidences+=`</div><div class="col-12"><a class="btn btn-sm btn-primary" onclick="uploadEvidence(${res.id})">Cargar evidencia</a></div>`;
                $("#details_documents_container").html(docs);

                $("#details_evidence_container").html(evidences);

                $.each(res.status,function(index,st) {
                    $("#delivery_status_"+st.status).addClass("active");                    
                    $("#delivery_status_"+st.status+"_text").html(stats_s[st.status-1]+"<br><small>("+st.timestamp+")</small>");                    
                });
            }
        })
    }
</script>

<div class="modal fade" id="deliveryEvidenceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width:60%">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Evidencia del pedido</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <img src="" id="delivery_evidence_image" width="500px">
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="button" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function viewImage(url) {
        $("#delivery_evidence_image").prop("src","<?php echo __ROOT__; ?>/"+url);
        $("#deliveryEvidenceModal").modal("show");
    }
</script>


<div class="modal fade" id="uploadEvidenceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width:60%">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Subir evidencia del pedido</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <input type="hidden" id="delivery_evidence_delivery_id">
                <input type="file" id="upload_evidence_file" accept="image/*">
                <br>
                <br>
                <a class="btn btn-primary btn-sm" onclick="saveEvidence()">Cargar evidencia</a>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="button" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function uploadEvidence(id) {
        $("#delivery_evidence_delivery_id").val(id);
        $("#uploadEvidenceModal").modal("show");
    }

    function saveEvidence() {
        var images = new FormData();
        let file = $("#upload_evidence_file").prop('files')[0];
        if (file){
            images.append("image", file);
            $.ajax({
                url:"<?php echo __ROOT__; ?>/bridge/uploadImage.php",
                data:images,
                type: 'post',
                data: images,
                contentType: false,
                processData: false,
                success:function(res) {
                    res = JSON.parse(res)
                    console.log(res)
                    if (res.success==true){
                        setDeliveryEvidence(res)
                    }else{
                        alert({title:"error",text:"Ha habido un error:\n"+res.message});
                        saveProblem($("#delivery_evidence_delivery_id").val(),"Error al subir evidencia "+res.message)
                    }
                }
            })
        }else{
            alert({title:"error",text:"Selecciona un archivo"});
        }
    }

    function setDeliveryEvidence(img) {
        $.ajax({
            url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=uploadEvidence",
            data:{
                delivery_id:$("#delivery_evidence_delivery_id").val(),
                name:"Evidencia",
                url:img.name
            },
            success:function() {
                alert("Evidencia cargada con éxito");
                setTimeout(function() {
                    location.reload();
                },2000);
            }
        });
    }
</script>

<div class="modal fade" id="deliveryStatusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Estatus del pedido</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <input type="hidden" id="delivery_status_delivery_id">
                <a class="btn btn-primary" style="width:200px;" onclick="setDeliveryStatus(1)">
                    <i class="fas fa-file-alt"></i>
                    Pedido creado
                </a>
                <br>
                <br>
                <a class="btn btn-primary" style="width:200px;" onclick="setDeliveryStatus(2)">
                    <i class="fas fa-people-carry"></i>
                    Entregado a paciente
                </a>
                <br>
                <br>
                <a class="btn btn-primary" style="width:200px;" onclick="setDeliveryStatus(3)">
                    <i class="fas fa-shipping-fast"></i>
                    Pedido recolectado
                </a>
                <br>
                <br>
                <a class="btn btn-primary" style="width:200px;" onclick="setDeliveryStatus(4)">
                    <i class="fas fa-archive"></i>
                    Pedido entregado
                </a>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="button" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function editStatus(id) {
        $("#delivery_status_delivery_id").val(id);
        $("#deliveryStatusModal").modal("show");
    }

    function getPatientToken(id) {
        navigator.clipboard.writeText("<?php echo __ROOT__; ?>/recept-vials/"+id).then(function() {
          alert("URL para paciente copiado al portapapeles")
        }, function(err) {
          alert({title:"error",text:'Error al intentar copiar al portapapeles'+ err});
        });
    }

    function deleteDelivery(id) {
        if (confirm('¿Seguro que deseas eliminar este pedido?')){
            $.ajax({
                url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=deleteDelivery",
                data:{
                    id
                },
                success:function(res) {
                    console.log(res)
                    location.reload();
                }
            });
            return true;
        }
        return false;
    }

    function setDeliveryStatus(st) {
        if (confirm('¿Seguro que deseas cambiar el estado del pedido a "'+stats_s[st-1]+'"?')){
            let id = $("#delivery_status_delivery_id").val();
            console.log("Cambiar status a "+st+" de "+id);
            $.ajax({
                url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=setDeliveryStatus",
                data:{
                    delivery_id:id,
                    status:st
                },
                success:function() {
                    location.reload();
                }
            });
        }else{
            $("#deliveryStatusModal").modal("hide");
            $("#delivery_status_delivery_id").val(0); 
        }
    }
</script>


<div class="modal fade" id="deliveryDateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Fecha de entrega</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <input type="hidden" id="delivery_date_delivery_id">
                <center>
                    <h6>Ingresa la nueva fecha</h6>
                    <input type="date" id="delivery_date_edit" class="form-control" style="width: 200px">
                </center>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-primary btn-block btn-to-hide" onclick="saveDeliveryDate()">Guardar</a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function changeDeliveryDate(id) {
        $("#delivery_date_delivery_id").val(id);
        $.ajax({
            url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=getDeliveryDate",
            data:{
                id
            },
            success: function(res) {
                console.log(res)
                res = JSON.parse(res)
                $("#delivery_date_edit").prop("min",res);
            }
        })
        $("#deliveryDateModal").modal("show");
    }

    function saveDeliveryDate() {
        let id = $("#delivery_date_delivery_id").val();
        let date = $("#delivery_date_edit").val();
        $.ajax({
            url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=changeDateDelivery",
            data:{
                delivery_id:id,
                date
            },
            success: function(res) {
                res = JSON.parse(res)
                if (res.success==true){
                    alert("¡Cambio de fecha realizado con éxito!");
                    setTimeout(function() {
                        location.reload();
                    },3000);
                }else{
                    alert({title:"error",text:res.message,time:5000});
                }
            }
        })
    }
</script>


<div class="modal fade" id="deliveryProblemsModal" tabindex="-1" role="dialog" aria-labelledby="modalCommunicationLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCommunicationLabel">Problemas reportados</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <input type="hidden" id="problem_modal_delivery_id">
            
            <div class="modal-body container">
                <div id="problems_modal_descriptions_container"></div>
                <div class="row mt-4">
                    <div class="col-12 col-md-8">
                        <input type="text" autocomplete="nope" id="problem_modal_description" class="form-control" placeholder="Describe el problema">
                    </div>
                    <div class="col-12 col-md-4">
                        <a onclick="reportProblem()" class="btn btn-primary btn-block">Reportar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">

    function viewProblems(id) {
        $("#problem_modal_delivery_id").val(id);
        $.ajax({
            url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=getDeliveryProblems",
            data:{
                delivery_id:id
            },
            success:function(res) {
                res = JSON.parse(res);
                let desc = "";
                $.each(res,function(index,pro) {
                    desc+='<small>'+pro.date+`</small><div class="col-12" style="width:100%;background-color:#f1f1f1;border-radius:10px;padding: 5px 10px;color:black;margin:10px">${pro.description}<br><small><a style="font-size:9px;padding:0;" onclick="deleteProblem(${pro.id})" class="btn">(Resuelto)</a></small></div>`;
                });
                $("#problems_modal_descriptions_container").html(desc);
                $("#deliveryProblemsModal").modal("show");
            }
        })
    }

    function reportProblem() {
        let mess = $("#problem_modal_description").val();
        saveProblem($("#problem_modal_delivery_id").val(),mess,function() {
            window.reload();
        });

    }

    function deleteProblem(id) {
        if (confirm("¿Seguro que deseas marcar como resuelto este problema?")){
            $.ajax({
                url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=deleteProblem",
                data:{
                    id
                },
                success:function() {
                    viewProblems($("#problem_modal_delivery_id").val())
                }
            })
        }
    }

    function saveProblem(id,description=null,on_end=null) {
        if (description==null){
            description = prompt("Describe el problema brevemente");
            on_end = function() {
                reload();
            }
        }
        if (description){ 
            $.ajax({
                url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=saveProblem",
                data:{
                    delivery_id:id,
                    description
                },
                success:function(res) {
                    if (on_end!=null) on_end();
                    viewProblems(id)
                }
            })
        }
    }
</script>