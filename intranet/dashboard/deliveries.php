<script type="text/javascript">
    let type = "<?php echo $type ?>";
    type = type==""?"active":type;
    let history_id = "<?php echo $id; ?>";
</script>

<div class="container-fluid">
    <div class="page-title">
        <h3 style="font-weight:bold"><?php echo (isset($type)?($type!='history'?"Todos los pedidos":"Historial del paciente"):"Pedidos activos"); ?></h3>
        <h6 id="patient_name_display"></h6>
    </div>


    <div class="row" style="margin-bottom: -35px;margin-top: 30px;">
        <div class="col-7"></div>
        <div class="col-1 text-right pt-1">
            <img src="<?php echo __ROOT__; ?>/intranet/assets/img/filter.svg" width="20px" class="date_range d-none">
        </div>
        <div class="col-2 px-0">
            <input type="text" name="daterange" value="01/01/2018 - 01/15/2018" class="form-control d-none date_range" />
        </div>
        <!--<div class="col-1">
            <a onclick="filterDeliveries()" class="btn btn-primary">Filtrar</a>
        </div>-->
    </div>

    <!-- DataTales Example -->
    <div class="table-responsive" style="margin-top:-20px;">
        <table class="table table-striped dt-responsive compact" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr style="font-size:10px;">
                    <th style="width:10%;">Fecha de creación</th>
                    <th style="width:5%;"># DE RESERVA</th>
                    <th style="width:10%;"># DE GUÍA</th>
                    <th style="width:15%;">PACIENTE</th>
                    <th style="width:20%;">MEDICAMENTO(S)</th>
                    <th style="width:10%;">DIRECCIÓN</th>
                    <th style="width:10%;">FECHA/HORA</th>
                    <th style="width:10%;">STATUS</th>
                    <!--<th style="width:10%;">PERSONA AUTORIZADA</th>-->
                    <th style="width: 10%;">ACCIONES</th>
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
       getInvoices();


        $('input[name="daterange"]').daterangepicker({
            locale: {
                   format: "DD/MM/YYYY",
                   separator: " - ",
                   applyLabel: "Filtrar",
                   cancelLabel: "Cancelar",
                   daysOfWeek: [
                        "Do",
                        "Lu",
                        "Ma",
                        "Mi",
                        "Ju",
                        "Vi",
                        "Sa"
                    ],
                    monthNames: [
                        "Enero",
                        "Febrero",
                        "Marzo",
                        "Abril",
                        "Mayo",
                        "Junio",
                        "Julio",
                        "Agosto",
                        "Septiembre",
                        "Octubre",
                        "Noviembre",
                        "Diciembre"
                    ]
            },
            startDate: "12/12/2021", endDate: new Date(),
            opens: 'left'
          }, function(start, end, label) {
            getInvoices({
                type:"date",
                dateStart:start.format('YYYY-MM-DD'),
                dateEnd:end.format('YYYY-MM-DD')
            })
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        });
    });

    function getInvoices(filter=null) {
        $.ajax({
            url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=getDeliveriesDetails",
            data:{
                type,
                user_id:history_id,
                filter
            },
            success:function(res) {
                //console.log(res)
                res = JSON.parse(res);
                setInvoices(res);
                setDataTable();
                if (type=="history"){
                    $("#patient_name_display").html(res[0].patient.name+"<br><small>("+res[0].patient.u_id+")</small>");
                    $("#u_id").val(res[0].patient.u_id);
                    doneTyping();
                }
            }
        });
    }

    function setInvoices(invoices) {
        let invs = "";
        if (data_table!=null){
            $('#dataTable').DataTable().clear();
            $('#dataTable').DataTable().destroy();
        }
        $.each(invoices,function(index,inv) {
            //console.log(inv)

            let patient = `<span class="tooltip-data">${inv.patient.name}<small><b><br>(${inv.patient.u_id})</b></small></span>`;
            let drugs = "";
            $.each(inv.drugs,function(ind,dru) {
                drugs+=`<div class="tooltip-data">${dru.quantity}x ${dru.name}<br><span style="font-size:9px">${dru.concentration}</span><span class="tiptext">|${dru.quantity}x ${dru.name}<br><small>${dru.concentration}<br>(${dru.lote})</small></span></div><div class="row m-1"></div>`;
            });

            let address = `<div class="tooltip-data">
                                <p style="font-size:10px;line-height:1;margin:0">
                                    ${inv.patient.address_suburb}, ${inv.patient.address_municipality}<br><br>${inv.patient.state_code}</p><span class="tiptext" style="font-size:11px">${inv.patient.address}<br><br>${inv.patient.address_suburb}, ${inv.patient.address_municipality}<br><br>${inv.patient.state_code}<br><br>${inv.patient.address_place}<br>${inv.patient.address_reference_int}
                                </span>
                            </div>`;

            let schedule = `<span style="font-size:12px;line-height:1">${inv.date}<br><small style="font-size:9px;">(${inv.schedule})</small><span>`;
            
            let auth_users = "";
            $.each(inv.auth_users,function(ind,auth) {
                auth_users+=`<div class="tooltip-data" style="font-size:12px;">${auth.name}</div><small>${auth.phone?("<small> ("+auth.phone+")</small>"):""}</small><br>`;
            });

            let status = stats_s[inv.status-1];

            if (inv.problems.length>0){
                status+=`<a onclick="viewProblems(${inv.id})"><i class="fas fa-exclamation-triangle"></i></a>`;
            } 

            invs+=`
                <tr style="font-size:12px;cursor:pointer;">
                    <td onclick="viewDetails(${inv.id})">${inv.timestamp}</td>
                    <td onclick="viewDetails(${inv.id})">${inv.folio}</td>
                    <td onclick="viewDetails(${inv.id})">${inv.shipment_id_number}</td>
                    <td onclick="viewDetails(${inv.id})">${patient}</td>
                    <td onclick="viewDetails(${inv.id})">${drugs}</td>
                    <td onclick="viewDetails(${inv.id})">${address}</td>
                    <td onclick="viewDetails(${inv.id})">${schedule}</td>
                    <td>${status}</td>
                    <!--<td onclick="viewDetails(${inv.id})">${auth_users}</td>-->`;
            if (type!="all"){
                    invs+=`<td style="padding:0">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="btn-group" role="group">
                                        <button id="view_btn_${inv.id}" type="button" class="btn btn-primary dropdown-toggle menu btn-group-sm mt-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          Ver
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="view_btn_${inv.id}">
                                          <!--<a class="btn btn-primary m-1" title="Ver detalles" onClick="viewDetails(${inv.id})">
                                              <img src="<?php echo __ROOT__; ?>/intranet/assets/img/view_details.svg" width="20px">
                                          </a>-->
                                          <a class="btn btn-primary m-1" title="Ver etiqueta DHL" onClick="viewDhlLabel(${inv.id})">
                                              <img src="<?php echo __ROOT__; ?>/intranet/assets/img/view_dhl_label.svg" width="20px">
                                          </a>
                                          <a class="btn btn-primary m-1" title="Editar status" onClick="editStatus(${inv.id})">
                                              <img src="<?php echo __ROOT__; ?>/intranet/assets/img/edit_status.svg" width="20px">
                                          </a>
                                          <a class="btn btn-primary m-1" title="Cambiar fecha" onClick="changeDeliveryDate(${inv.id})">
                                              <img src="<?php echo __ROOT__; ?>/intranet/assets/img/edit_date.svg" width="20px">
                                          </a> 
                                          <a class="btn btn-primary m-1" title="Ver token del paciente" onClick="getPatientToken(${inv.id})">
                                              <img src="<?php echo __ROOT__; ?>/intranet/assets/img/view_patient_token.svg" width="20px">
                                          </a>
                                          <a class="btn btn-primary m-1" title="Cargar evidencia" onClick="uploadEvidence(${inv.id})">
                                              <img src="<?php echo __ROOT__; ?>/intranet/assets/img/upload_evidence.svg" width="20px">
                                          </a>
                                          <a class="btn btn-warning m-1" title="Reportar un problema" onClick="saveProblem(${inv.id})">
                                              <i class="fas fa-exclamation-triangle"></i>
                                          </a>
                                          <a class="btn btn-danger m-1" title="Eliminar pedido" onClick="deleteDelivery(${inv.id})">
                                              <img src="<?php echo __ROOT__; ?>/intranet/assets/img/delete.svg" width="20px">
                                          </a>
                                        </div>
                                      </div>
                                </div>
                            </div>
                        </div>
                    </td>`;
            }else{
                invs+=`<td>N/A</td>`;
            }
            invs+=`</tr>`;
        });
        $("#table_data").html(invs);
    }

    function setDataTable() {

        let bts = [
            { 
                extend: 'excelHtml5', 
                className: 'excel-button', 
                text:"<span style='margin-left:30px;color:#14a736;font-weight:bold;font-size:12px;'>Exportar</span>",
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7],
                    //rows: ':visible',
                    modifier: {
                        page: 'all',
                        search: 'applied'   
                    },
                    format: {
                        body: function ( data, row, column, node ) {
                            let d = data;
                            if (column==5){ 
                                console.log(d);
                                d = d.replaceAll('<br><br>',', ');
                                //d = d.split(/\s/g).join(' ');
                            }
                            d = d.replace(/(&nbsp;|<([^>]+)>)/ig, "");
                            if (column==3) {
                                d = d.split("|")[1]; 
                                if (d)
                                    d=(d.split("(")[0]+'; '+d.split(")")[1]); 
                                console.log(d);}
                            return d;
                        }
                    }
                }
            }
        ]

        if (type!="all"){
            bts.push(
                {
                    className: 'new-delivery-btn', 
                    text:"<span style='margin-left:30px;color:#2687be;font-weight:bold;font-size:12px;' onclick='newDelivery()'>Nuevo pedido</span>"
                }
            )
        }

        data_table = $('#dataTable').DataTable({
            "lengthMenu": [[25, 50, 100, 200, -1], [25, 50, 100, 200, "Todos"]],
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
            "order": [[ 0, "desc" ]],
            "ordering": true,
            "dom": 'Bsflitp',
            initComplete:function() {
                $(".date_range").removeClass("d-none");
            }
        });

        $(".new-delivery-btn").on("click",newDelivery);
    }
</script>

<script type="text/javascript">
    $(function () {
        $.ajax({
            url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=getDrugs",
            success:function(res) {
                res = JSON.parse(res);
                $.each(res,function(index,drug){
                    drugs += `<option value="${drug.id}">${drug.name}</option>`
                });
            }
        })
    });
    let generating_label=false;
    function viewDhlLabel(id) {
        if (generating_label==true){
            alert("Espera, estamos generando la etiqueta");
            return;
        }
        $.ajax({
            url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=getDHLLabel",
            data:{
                delivery_id:id
            },
            success: function(res) {
                res = JSON.parse(res)
                console.log(res)
                if (res!=null){
                    window.open("../"+res.url,"_blank");
                }else{
                    generating_label = true;
                    getDhlLabel(id,function(res) {
                        console.log(res);
                        window.open("../"+res.url,"_blank");
                    });
                }
            }
        })
    }

    function newDelivery() {
        $("#date").prop("min",new Date().toISOString().split("T")[0]);
        $("#auth_users_container").html("");
        $("#medication_container").html("");
        addAuth(0);
        addDeliveryDrug(0);
        for (var i = 0; i < 7; i++) {
            $("#annexes_"+i).val("");
        }
        $("#newDeliveryModal").modal("show");
    }
</script>