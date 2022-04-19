<link rel="stylesheet" href="<?php echo __ROOT__; ?>/assets/css/stepper.css">

<section class="container pt-4">
  <div class="col-12 text-center"> 
    <h3 class="text-white">ENTREGA DE VIALES</h3>
    <h6 class="text-white"><?php echo $delivery['date'] ?> | Folio: #<?php echo $delivery['folio']; ?></h6>
  </div>


  <div class="container text-white pt-3 mt-3">
    <h6>Medicamentos</h6>
    <div style="/*height:25vh;overflow-y: scroll;margin-bottom: 30px;*/">
    <?php  
      foreach ($delivery['drugs'] as $drug) { ?>
        <div class="row">
          <div class="col-3">
            Piezas: <br>
            <strong><?php echo $drug['quantity']; ?></strong>
          </div>
          <div class="col-5">
            Medicamento: <br>
            <strong><?php echo $drug['name']['name']; ?></strong>
          </div>
          <div class="col-2">
            Lote: <br>
            <strong><?php echo $drug['lote']; ?></strong>
          </div>
          <div class="col-12">
            Concentración: <br>
            <strong><?php echo $drug['concentration']['name'] ?></strong>
          </div>
        </div> 
        <hr style="border-color: white;">
      <?php
      }
    ?>
    </div>
  </div>

   <div class="container text-white">
    <h6>Carga de evidencia</h6>
  </div>

  <div class="bs-stepper vertical" id="stepper_1">
    <div class="bs-stepper-header" role="tablist">
      <!-- your steps here -->
      <div class="step" data-target="#step-1">
        <button type="button" class="step-trigger" role="tab" aria-controls="step-1" id="step-1-trigger">
          <span class="bs-stepper-circle">1</span>
        </button>
      </div>
      <div class="line"></div>
      <div class="step" data-target="#step-2">
        <button type="button" class="step-trigger" role="tab" aria-controls="step-2" id="step-2-trigger">
          <span class="bs-stepper-circle">2</span>
        </button>
      </div>
      <div class="line"></div>
      <div class="step" data-target="#step-3">
        <button type="button" class="step-trigger" role="tab" aria-controls="step-3" id="step-3-trigger">
          <span class="bs-stepper-circle">3</span>
        </button>
      </div>
    </div>
    <div class="bs-stepper-content">
      <!-- your steps content here -->
      <div id="step-1" class="content" role="tabpanel" aria-labelledby="step-1-trigger">
          
          <div class="container pt-3">
            <div class="row">
              <div class="col-12">
                <h6 class="text-white">Foto del medicamento:</h6>
              </div>
              <div class="col-8">
                <img src="" id="file_1_preview" style="width:100%;">
              </div>
              <div class="col-4 pt-3">
                <label class="custom-file-upload">
                    <input type="file" id="file_1" accept="image/*" onchange="loadFile1(event)">
                    <span id="take_capture_1">Capturar</span>
                </label>
                <label class="custom-file-upload mt-5 d-none" onclick="confirmCapture1()" id="confirm_capture_1">
                    <span>Confirmar</span>
                </label>
              </div>
            </div>
          </div>

      </div>
      <div id="step-2" class="content" role="tabpanel" aria-labelledby="step-2-trigger">
        
          <div class="container pt-3">
            <div class="row">
              <div class="col-12">
                <h6 class="text-white">Foto de la hoja:</h6>
              </div>
              <div class="col-8">
                <img src="" id="file_2_preview" style="width:100%;">
              </div>
              <div class="col-4 pt-3">
                <label class="custom-file-upload">
                    <input type="file" id="file_2" accept="image/*" onchange="loadFile2(event)">
                    <span id="take_capture_2">Capturar</span>
                </label>
                <label class="custom-file-upload mt-5 d-none" onclick="confirmCapture2()" id="confirm_capture_2">
                    <span>Confirmar</span>
                </label>
              </div>
            </div>
          </div>

      </div>
      <div id="step-3" class="content" role="tabpanel" aria-labelledby="step-3-trigger">
        <div class="container pt-3">
          <div class="row">
            <div class="col-12">
              <h6 class="text-white">Confirmar ambas capturas</h6>
            </div>
            <div class="col-6" style="height: 100px;overflow-y: hidden;">
              <img src="" id="file_1_preview2" style="width:100%;" onclick="viewImage(this)">
            </div>
            <div class="col-6" style="height: 100px;overflow-y: hidden;">
              <img src="" id="file_2_preview2" style="width:100%;" onclick="viewImage(this)">
            </div>
            <div class="col-12">
              <span style="font-size: 11px;color: white;">(Da click en las imágenes para agrandarlas)</span>
            </div>
            <div class="col-6">
              <label class="custom-file-upload mt-3" onclick="reset()">
                  <span>Regresar al inicio</span>
              </label>
            </div>
            <div class="col-6">
              <label class="custom-file-upload mt-3" onclick="confirmCapture3()">
                  <span>Finalizar y enviar</span>
              </label>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="container text-center pb-3">
  <hr style="border-color:white;margin-bottom: 5px;">
  <a onclick="saveProblem(<?php echo $delivery['id']; ?>)" class="text-white" style="text-decoration: underline;font-size: 9px;">Reportar un problema</a>
</section>

<div class="modal fade" id="viewImageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Previsualizar imagen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="" width="100%" id="viewImageModalImage">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<script src="<?php echo __ROOT__; ?>/assets/js/stepper.js"></script>

<script type="text/javascript">
  function saveProblem(id) {
      description = prompt("Describe el problema, por favor");
      if (description){
        $.ajax({
            url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=saveProblem",
            data:{
                delivery_id:id,
                description:"El paciente reporta: "+description
            },
            success:function(res) {
                alert({title:"Listo",text:"Problema reportado correctamente"});
            }
        })
      }
  }
</script>

<script type="text/javascript">
  let stepper_1;
  $(function() {
    stepper_1 = new Stepper($("#stepper_1")[0]);
  })
  function next() {
    stepper_1.next();
  }

  var loadFile1 = function(event) {
      var output = document.getElementById('file_1_preview');
      var output2 = document.getElementById('file_1_preview2');
      output.src = URL.createObjectURL(event.target.files[0]);
      output2.src = URL.createObjectURL(event.target.files[0]);
      $("#take_capture_1").html("Reintentar");
      output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
      }
      $("#confirm_capture_1").removeClass("d-none");
    };

  var loadFile2 = function(event) {
      var output = document.getElementById('file_2_preview');
      var output2 = document.getElementById('file_2_preview2');
      output.src = URL.createObjectURL(event.target.files[0]);
      output2.src = URL.createObjectURL(event.target.files[0]);
      $("#take_capture_2").html("Reintentar");
      output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
      }
      $("#confirm_capture_2").removeClass("d-none");
    };

  function confirmCapture1() {
    stepper_1.next();
  }

  function confirmCapture2() {
    stepper_1.next();
  }

  function confirmCapture3(id) {
    waitingDialog.show("Espera");
    uploadFile("file_1",function(res) {
      if (res.success==true){
        setDeliveryEvidence(res)
        uploadFile("file_2",function(res2) {
          waitingDialog.hide();
          if (res2.success==true){
            setDeliveryEvidence(res2);
            alert("Gracias por subir la evidencia");
            setTimeout(function() {
                location.reload();
            },3000);
          }else{
            alert({title:"error",text:"Ha habido un error al subir la segunda imagen:\n"+res.message});
            stepper_1.previous();
          }
        })
      }else{
          waitingDialog.hide();
          alert({title:"error",text:"Ha habido un error al subir la primera imagen:\n"+res.message});
          stepper_1.previous();
          stepper_1.previous();
      }
    });
  }

  function uploadFile(id,on_end) {
    var images = new FormData();
    let file = $("#"+id).prop('files')[0];
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
                on_end(res)                
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
              delivery_id:"<?php echo $delivery['id']; ?>",
              name:"Evidencia",
              url:img.name
          }
      });
  }

  function reset() {
    stepper_1.previous();
    stepper_1.previous();
  }

  function viewImage(el) {
    console.log($(el).prop("src"));
    $("#viewImageModalImage").prop("src",$(el).prop("src"));
    $("#viewImageModal").modal("show");
  }

</script>

<style type="text/css">
  body{
    background-image: linear-gradient(199deg,#0651b7 100%,#06c 0);;
  }

  .custom-file-upload {
    color: #37474f;
    background-color: #add7f6!important;
    border-color: #add7f6!important;
    border-radius: 3rem!important;
    display: inline-block;
    padding: 10px;
    font-weight: bold;
    font-size: 10px;
    text-align: center;
    cursor: pointer;
  }

  input[type="file"] {
      display: none;
  }
</style>

