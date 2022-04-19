<div class="container-fluid">

    <div class="page-title">
        <h3 style="font-weight:bold">Pacientes</h3>
    </div>

    <!-- DataTales Example -->
    <div class="table-responsive">
        <table class="table table-striped dt-responsive compact" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr style="font-size:10px;">
                    <th>ID PACIENTE</th>
                    <th>NOMBRE</th>
                    <th>DIRECCIÓN</th>
                    <th>EMAIL</th>
                    <th>TELÉFONO</th>
                </tr>
            </thead>
            <tbody id="table_data"></tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
    let data_table = null;
    $(document).ready( function () {
        $.ajax({
            url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=getPatients",
            success:function(res) {
                res = JSON.parse(res);
                //console.log(res)
                setPatients(res);
                setDataTable();
            }
        });
    });

    function setPatients(patients) {
        let pats = "";
        $.each(patients,function(index,pat) {
            //console.log(inv)
            let address = `<div class="tooltip-data">
                                <p style="font-size:10px;line-height:1;margin:0">
                                    ${pat.address_suburb}, ${pat.address_municipality}
                                    <br><br>
                                    ${pat.state_code}
                                </p>
                                <span class="tiptext" style="font-size:11px">
                                    ${pat.address}
                                    <br><br>
                                    ${pat.address_suburb}, ${pat.address_municipality}
                                    <br><br>
                                    ${pat.state_code}
                                    <br><br>
                                    ${pat.address_place}
                                    <br>
                                    ${pat.address_reference_int}
                                </span>
                            </div>`;
            pats+=`
                <tr style="font-size:12px;cursor:pointer;">
                    <td onclick="viewDetails(${pat.id})">${pat.u_id}</td>
                    <td onclick="viewDetails(${pat.id})">${pat.name}</td>
                    <td onclick="viewDetails(${pat.id})">${address}</td>
                    <td onclick="viewDetails(${pat.id})">${pat.email}</td>
                    <td onclick="viewDetails(${pat.id})">${pat.phone}</td>
                </tr>`;

        });
        $("#table_data").html(pats);
    }

    function setDataTable() {

        let bts = [
            { 
                extend: 'excelHtml5', 
                className: 'excel-button', 
                text:"<span style='margin-left:30px;color:#14a736;font-weight:bold;font-size:12px;'>Exportar</span>",
                exportOptions: {
                    columns: ':visible',
                    rows: ':visible' 
                }
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
    }
</script>

<script type="text/javascript">
    function viewDetails(id) {
        location.href="<?php echo __ROOT__; ?>/admin/deliveries/history/"+id;
    }
</script>