<div class="container-fluid">

    <div class="page-title">
		<div class="row text-left mb-2 pl-3">
			<a href="<?php echo __ROOT__; ?>/admin/stock">
				<i class="fas fa-arrow-circle-left" style="font-size:30px;margin-bottom: 5px;color:#2687be;"></i>	
			</a>
		</div>
        <h3 style="font-weight:bold"><?php echo $drug['name']['name']; ?><small> (<?php echo $drug['concentration']['name']; ?>)</small></h3>
        <h5><small>Lote: <strong><?php echo $drug['lote']; ?></strong> / Caducidad: <strong><?php echo $drug['expiration_date']; ?></strong></small></h5>
        <h6><small>Cantidad actual: <strong><?php echo $drug['summary']['quantity']; ?></strong></small></h6>
    </div>

    <div class="container">
    	<div class="row">
    		<div class="col-12">
    			<input type="radio" name="type" checked onchange="changeView();" value="0" style="width: 15px;height:15px"> Todas
    			<input type="radio" name="type"  onchange="changeView();" value="1" style="width: 15px;height:15px;margin-left: 20px;"> Entradas
    			<input type="radio" name="type"  onchange="changeView();" value="2" style="width: 15px;height:15px;margin-left: 20px;"> Salidas
    		</div>
    	</div>
    </div>
    <!-- DataTales Example -->
    <div class="table-responsive" style="margin-top:-30px;">
        <table class="table table-striped dt-responsive compact" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr style="font-size:10px;">
                    <th id="date">FECHA</th>
                    <th>TIPO</th>
                    <th id="quantity">CANTIDAD</th>
                   	<th>ACCIONES</th>
                </tr>
            </thead>
            <tbody id="table_data"></tbody>
        </table>
    </div>
</div>

<style type="text/css">
	.dt-buttons{
		margin-top: 30px;
		padding-top: 0px;
	}
	.excel-button{
		margin-top: 0px !important;
	}
</style>


<script type="text/javascript">
	$(document).ready( function () {
	   getLog();
	});
</script>

<script type="text/javascript">
	let user_type = "<?php echo $_SESSION['user']['company_id']; ?>";
	let id = "<?php echo $id; ?>";
	let type = 0;
	let data_table = null;

	function changeView(el) {
		type = $("input[name='type']:checked").val();
		getLog();
	}

	function getLog() {
		console.log(type)
		$.ajax({
		    url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=getSummaryLog",
		    data:{
		    	drug_id:id,
		    	type:type
		    },
		    success:function(res) {
		        res = JSON.parse(res);
		        console.log(res)
		        setLog(res);
		        setDataTable();
		    }
		});
	}


	function setLog(drugs) {
	    let drs = "";
	    if (data_table!=null){
	    	$('#dataTable').DataTable().clear();
	    	$('#dataTable').DataTable().destroy();
	    }
	    $.each(drugs,function(index,dr) {
	        drs+=`
	            <tr>
	                <td>${dr.date}</td>
	                <td>${dr.type==1?'Entrada':('Salida<br>('+(dr.delivery?dr.delivery.folio:"N/A")+')')}</td>
	                <td>${dr.quantity} viales</td>
	                <td>`;
	        if (dr.annexed){
	        	drs+=`<a class="btn btn-primary m-1 btn-sm" title="Ver anexo" onClick="viewAnnexed('${dr.annexed}')">
	                  	<i class="far fa-file"></i>
	                  </a>`;
	        }
	            	drs+=((user_type==1 && type==1)?`<a class="btn btn-warning m-1 btn-sm" title="Eliminar registro" onClick="deleteLog(${dr.id})">
		                  <i class="far fa-trash-alt"></i>`:'');
		            drs+=`</a>
		            </td>
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

<style type="text/css">
	.excel-button{
		margin-top: 40px;
	}
</style>

<script type="text/javascript">

	function viewAnnexed(url) {
		window.open("<?php echo __ROOT__; ?>/"+url,"_blank");
	}

	function deleteLog(id) {
		if (confirm("¿Seguro que deseas eliminar este registro?")){
			$.ajax({
				url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=deleteFromSummary",
				data:{
					id
				},
				success:function() {
					location.reload()
				}
			})
		}
	}
</script>