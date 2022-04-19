<div class="container-fluid">
    <div class="page-title">
        <h3 style="font-weight:bold">Inventario</h3>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-12">
                <input type="radio" name="type" checked onchange="getHistory(0);" value="0" style="width: 15px;height:15px"> Todos
                <input type="radio" name="type"  onchange="getHistory(1);" value="1" style="width: 15px;height:15px;margin-left: 20px;"> Con inventario
            </div>
        </div>
    </div>
    <!-- DataTales Example -->
    <div class="table-responsive">
        <table class="table table-striped dt-responsive compact" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr style="font-size:10px;">
                    <th>TERAPIA</th>
                    <th>LOTE</th>
                    <th>DOSIS</th>
                    <th>FECHA DE CADUCIDAD  </th>
                    <th>CANTIDAD EN EXISTENCIA</th>
                </tr>
            </thead>
            <tbody id="table_data"></tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
    let data_table = null;

    function getHistory(existent) {
        console.log(existent)
        $.ajax({
            url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=getDrugsDetails",
            data:{
                existent
            },
            success:function(res) {
                res = JSON.parse(res);
                //console.log(res)
                setDrugs(res);
                setDataTable();
            }
        });
    }


    $(document).ready( function () {
        getHistory(0);
        //console.log(type);
    });

    function setDrugs(drugs) {
        let drs = "";
         if (data_table!=null){
            $('#dataTable').DataTable().clear();
            $('#dataTable').DataTable().destroy();
        }
        $.each(drugs,function(index,dr) {
            //if (dr.summary.quantity>0)
            drs+=`
                <tr style="font-size:12px;cursor:pointer;" onclick="viewDetails(${dr.id})">
                    <td>${dr.name.name}</td>
                    <td>${dr.lote}</td>
                    <td>${dr.concentration.name}</td>
                    <td>${dr.expiration_date}</td>
                    <td>${dr.summary.quantity} viales</td>
                </tr>
            `;
        });
        $("#table_data").html(drs);
    }

    function setDataTable() {

        let bts = [
            { 
                extend: 'excelHtml5', 
                className: 'excel-button', 
                text:"<span style='margin-left:30px;color:#14a736;font-weight:bold;font-size:12px;'>Exportar</span>",
                exportOptions: {
                    modifier: {
                        page: 'all',
                        search: 'applied'   
                    },
                }
            },
            {
                className: 'new-delivery-btn', 
                text:"<span style='margin-left:30px;color:#2687be;font-weight:bold;font-size:12px;' onclick='newDrug()'>Nuevo registro</span>"
            }
        ];

        data_table = $('#dataTable').DataTable({
            "language":{
                "lengthMenu": "Mostrar _MENU_ registros",
                "info": "Mostrando del _START_ al _END_ de _TOTAL_ registros",
                "search": "",
                "searchPlaceholder": "Buscar",
                "infoFiltered": "(filtrados de _MAX_ resultados)",
                "infoEmpty": "No hay registros actuales",
                "zeroRecords": "Búsqueda sin resultados",
                "pageLength": 10,
                "paginate": {
                   "first":      "Inicio",
                   "last":       "Final",
                   "next":       "Sig.",
                   "previous":   "Ant."
                }
            },
            buttons: bts,
            "order": [[ 0, "asc" ]],
            "ordering": true,
            "dom": 'Bpsfit'
        });

        $(".new-delivery-btn").on("click",newDrug)
    }
</script>

<script type="text/javascript">
    function newDrug() {
        $("#addStockModal").modal("show");
        $("#add_stock_expiration_date").prop("min",new Date().toISOString().split("T")[0]);
    }

    function viewDetails(drug) {
        location.href="<?php echo __ROOT__; ?>/admin/stock/history/"+drug;
    }
</script>