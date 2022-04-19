<div class="modal fade" id="addStockModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar entrada de inventario</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Lote</label>
                            <input type="text" class="form-control form-control-user" id="add_stock_lote" placeholder="Lote">
                        </div>
                    </div>
                    <div class="col-6 pt-2">
                        <div id="current_quantity" class="pt-1">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Terapia</label>
                            <select class="form-control" id="add_stock_drug_name"></select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Dosis</label>
                            <select class="form-control" id="add_stock_drug_concentration"></select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Fecha de caducidad</label>
                            <input type="date" class="form-control form-control-user" id="add_stock_expiration_date" placeholder="Fecha de caducidad" onkeydown="return false">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Cantidad a ingresar</label>
                            <input type="number" class="form-control form-control-user" id="add_stock_quantity" placeholder="Cantidad a ingresar" max="10000">
                        </div>
                    </div>
                    <div class="col-12">
                        <label>Anexo</label>
                        <input type="file" class="form-control form-control-user" id="add_stock_annexed">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-primary" onclick="saveRegister();">Registrar</a>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $.ajax({
        url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=getDrugs",
        success:function(res) {
            res = JSON.parse(res)
            let drs = "<option>Selecciona</option>";
            $.each(res,function(index,dr){
                drs+=`<option value="${dr.id}">${dr.name}</option>`;
            });
            $("#add_stock_drug_name").html(drs);
        }
    })
    $.ajax({
        url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=getConcentrations",
        success:function(res) {
            res = JSON.parse(res)
            let drs = "<option>Selecciona</option>";
            $.each(res,function(index,dr){
                drs+=`<option value="${dr.id}">${dr.name}</option>`;
            });
            $("#add_stock_drug_concentration").html(drs);
        }
    })
</script>

<script type="text/javascript">
    function saveRegister() {
        let quantity = $("#add_stock_quantity").val();
        if (quantity){
            let images = new FormData(); 
            let file = $("#add_stock_annexed").prop('files')[0];
            if (file){
                images.append("file", file);
                $.ajax({
                    url: '<?php echo __ROOT__; ?>/bridge/uploadFile.php',
                    type: 'post',
                    data: images,
                    contentType: false,
                    processData: false,
                    success:function(res) {
                        res = JSON.parse(res)
                        if (res.success==true){
                            createRegister(res.name);
                        }else{
                            alert({title:"error",text:"Hubo un error al subir el documento: \n"+res.message});
                        }

                    }
                });
            }else{
                createRegister("");
            }
        }else{
            alert({title:"error",text:"Ingresa una cantidad válida"});
        }
    }

    function createRegister(url) {
        let quantity = $("#add_stock_quantity").val();
        let drug_id = $("#add_stock_drug_name").val();
        let concentration_id = $("#add_stock_drug_concentration").val();
        let lote = $("#add_stock_lote").val();
        let expiration_date = $("#add_stock_expiration_date").val();
        $.ajax({
            url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=summaryEntrance",
            data:{
                quantity,
                drug_id,
                concentration_id,
                lote,
                expiration_date,
                annexed:url
            },
            success:function(res) {
                location.reload();
            }
        })
    }
</script>



<script type="text/javascript">

    var typingTimer;                //timer identifier
    var doneTypingInterval = 250;  //time in ms, 5 second for example
    var $input = $('#add_stock_lote');

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
            url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=getDrugByLote",
            data:{
                lote:$("#add_stock_lote").val()
            },
            success: function(res) {
                console.log(res)
                res = JSON.parse(res);
                if (res!=null){
                    $("#current_quantity").html("Cantidad actual:<br>"+res.quantity);
                    $("#add_stock_drug_name").val(res.name_id);
                    $("#add_stock_drug_concentration").val(res.concentration_id);
                    $("#add_stock_expiration_date").val(res.expiration_date);
                }
            }
        })
    }
</script>