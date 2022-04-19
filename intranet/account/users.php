<div class="container-fluid">
    <div class="page-title">
        <h3 style="font-weight:bold">Administrar usuarios</h3>
        <h6 id="patient_name_display"></h6>
    </div>

    <!-- DataTales Example -->
    <div class="table-responsive">
        <table class="table table-striped dt-responsive compact" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr style="font-size:10px;">
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>CORREO ELECTRÓNICO</th>
                    <th>TIPO</th>
                    <th>ACCIONES</th>
                </tr>
            </thead>
            <tbody id="table_data"></tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
    let data_table = null;
    $(document).ready( function () {
        //console.log(type);
        $.ajax({
            url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=getUsers",
            data:{

            },
            success:function(res) {
                res = JSON.parse(res);
                console.log(res)
                setUsers(res);
                setDataTable();
            }
        });
    });

    function setUsers(users) {
        let uss = "";
        $.each(users,function(index,us) {
            uss+=`
                <tr style="font-size:12px;cursor:pointer;">
                    <td>${us.id}</td>
                    <td>${us.name} ${us.lastname}</td>
                    <td>${us.email}</td>
                    <td>${us.company}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <button id="view_btn_${us.id}" type="button" class="btn btn-primary dropdown-toggle menu btn-group-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-top:-7px;">
                              Ver
                            </button>
                            <div class="dropdown-menu" aria-labelledby="view_btn_${us.id}">
                              <!--<a class="btn btn-primary m-1" title="Ver detalles" onClick="viewDetails(${us.id})">
                                  <i class="far fa-eye"></i>
                              </a>-->
                              <a class="btn btn-primary m-1" title="Editar" onClick="editUser(${us.id})">
                                  <i class="far fa-pencil-alt"></i>
                              </a>
                              <a class="btn btn-warning m-1" title="Reestablecer contraseña" onClick="restorePassword('${us.email}')">
                                  <i class="fas fa-unlock-alt"></i>
                              </a>
                              <a class="btn btn-danger m-1" title="Eliminar pedido" onClick="deleteUser(${us.id})">
                                  <i class="far fa-trash-alt"></i>
                              </a>
                            </div>
                        </div>
                    </td>
                </tr>
            `;
        });
        $("#table_data").html(uss);
    }

    function setDataTable() {

        let bts = [
            /*{ 
                extend: 'excelHtml5', 
                className: 'excel-button', 
                text:"<span style='margin-left:30px;color:#14a736;font-weight:bold;font-size:12px;'>Exportar</span>",
                exportOptions: {
                    columns: ':visible',
                    rows: ':visible' 
                }
            },*/
            {
                className: 'new-delivery-btn', 
                text:"<span style='margin-left:30px;color:#2687be;font-weight:bold;font-size:12px;' onclick='newUser()'>Nuevo registro</span>"
            }
        ];

        data_table = $('#dataTable').DataTable({
            "language":{
                "lengthMenu": "Mostrar _MENU_ registros",
                "info": "Mostrando del _START_ al _END_ de _TOTAL_ registros",
                "search": "",
                "searchPlaceholder": "Buscar",
                "infoFiltered": "(filtrados de _MAX_ resultados)",
                "pageLength": 10,
                "paginate": {
                   "first":      "Inicio",
                   "last":       "Final",
                   "next":       "Sig.",
                   "previous":   "Ant."
                }
            },
            buttons: bts,
            //"order": [[ 0, "desc" ]],
            "ordering": false,
            "dom": 'Bpsfit'
        });

        $(".new-delivery-btn").on("click",newUser);
    }
</script>

<script type="text/javascript">
    function newUser() {
        $("#add_user_id").val(0);
        $("#add_user_id").val("");
        $("#add_user_name").val("");
        $("#add_user_lastname").val("");
        $("#add_user_email").val("");
        $("#add_user_phone").val("");
        $("#add_user_password").val("");
        $("#add_user_company").val(0);
        $("#addUserModal").modal("show");
    }

    function editUser(id) {
        $("#add_user_id").val(id);
        $.ajax({
            url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=getUser",
            data:{
                id
            },
            success: function(res) {
                res = JSON.parse(res);
                $("#add_user_id").val(res.id);
                $("#add_user_name").val(res.name);
                $("#add_user_lastname").val(res.lastname);
                $("#add_user_email").val(res.email);
                $("#add_user_phone").val(res.phone);
                $("#add_user_company").val(res.company_id);
            }
        })
        $("#addUserModal").modal("show");
    }

    function deleteUser(id) {
        if (confirm("¿Seguro que deseas eliminar este registro?")){
            $.ajax({
                url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=deleteUser",
                data:{
                    id
                },
                success:function() {
                    location.reload();
                }
            })
        }
    }
</script>

<script type="text/javascript">
    function restorePassword(email) {
        if (confirm("¿Seguro que deseas reestablecer la contraseña para este usuario?")){
            $.ajax({
                url:"../bridge/routes.php?action=passwordForgotten",
                data:{
                    email
                },
                success:function(res) {
                    res = JSON.parse(res);
                    console.log(res)
                    if (res.success==true){
                        alert("Listo, contraseña temporal enviada")
                    }else{
                        alert({title:"Error",text:res.message});
                    }
                }
            });
        }
        return false;
    }
</script>