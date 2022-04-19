<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar usuario</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <input type="hidden" id="add_user_id" value="0">

            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" class="form-control form-control-user" id="add_user_name" placeholder="Nombre">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Apellido</label>
                            <input type="text" class="form-control form-control-user" id="add_user_lastname" placeholder="Apellido">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Correo electrónico</label>
                            <input type="text" class="form-control form-control-user" id="add_user_email" placeholder="Correo electrónico">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Contraseña temporal</label>
                            <input type="text" class="form-control form-control-user" id="add_user_phone" placeholder="Será cambiada por el usuario al entrar">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Contraseña</label>
                            <input type="password" class="form-control form-control-user" id="add_user_password" disabled placeholder="Contraseña">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Compañía</label>
                            <select id="add_user_company" class="form-control">
                                <option value="0">Selecciona</option>
                                <option value="1">ATEND</option>
                                <option value="2">PEN</option>
                                <option value="3">ROCHE</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-primary" onclick="saveUser();">Registrar</a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $("#add_user_phone").on("input",function() {
        $("#add_user_password").val($(this).val())
    })
    function saveUser() {
        let id = $("#add_user_id").val();
        let name = $("#add_user_name").val();
        let lastname = $("#add_user_lastname").val();
        let email = $("#add_user_email").val();
        let phone = $("#add_user_phone").val();
        let company_id = $("#add_user_company").val();
        $.ajax({
            url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=newUser",
            data:{
                id,
                name,
                lastname,
                email,
                phone,
                company_id
            },
            success: function(res) {
                res = JSON.parse(res);
                if (res.success==true){
                    alert({title:"Listo",text:"Usuario guardado con éxito",time:2000});
                    setTimeout(function() {
                        location.reload();
                    },2000)
                }else{
                    alert({title:"error",text:"Ha habido un error: \n"+res.message});
                }
            }
        })
    }
</script>

