<table class="main__table" id="tablaClientes">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Pacientes</th>
            <th>Saldos</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody id="indexTable">
    	<?php foreach ($clients as $client): ?>
	        <tr class="table__row">
	            <td><?php echo $client['id']; ?></td>
	            <td>
	            	<a href="<?php echo __ROOT__; ?>/cliente/<?php echo $client['id']; ?>">
	            		<?php echo $client['name']; ?>		
	            	</a>
				</td>
	            <td>
	               	<?php foreach ($client['patients'] as $pat): ?>
	               		<a href="<?php echo __ROOT__; ?>/servicios-paciente/<?php echo $pat['id']; ?>">
	               			<?php echo $pat['name']; ?> <br>
	               		</a>
	               	<?php endforeach ?>
	                <a href="<?php echo __ROOT__; ?>/add/servicio/<?php echo $client['id']; ?>">Agregar paciente</a>
	            </td>
	            <td>
	            	<?php foreach ($client['patients'] as $pat): ?>
	               		$ <?php echo($pat['balance']?$pat['balance']['amount']:0); ?> <br>
	               	<?php endforeach ?>
	            	<a href="">Acreditar pago</a>
	            </td>
	            <td>
	                <!--<span id="name_1">Jane Doe</span>
	                <i class="fa-solid fa-pencil" onclick="cambiarNombre(1)"></i>-->
	            </td>
	        </tr>
    	<?php endforeach ?>
    </tbody>
</table>


<script> //Script para la funcionalidad de la barra de búsqueda.
	const clientes = JSON.parse("<?php echo json_encode($clients); ?>");

    const searchButton = document.getElementById('searchButton');
    searchButton.style.display = 'none';

    const searchInput = document.getElementById('searchInput');
    searchInput.addEventListener('keyup', (event) => {
        let searchValue = event.target.value;
        console.log(searchValue);
        let servicioFiltrados = [...servicios];
        if (searchValue !== '') {
            servicioFiltrados = servicios.filter(servicio => {
                return (servicio?.client?.name + ' ' + servicio?.client?.lastname).toLowerCase().includes(searchValue.toLowerCase()) ||
                    servicio?.patient?.name.toLowerCase().includes(searchValue.toLowerCase()) ||
                    servicio?.service?.name.toLowerCase().includes(searchValue.toLowerCase()) ||
                    (servicio?.provider?.name + ' ' + servicio?.provider?.lastname).toLowerCase().includes(searchValue.toLowerCase()) ||
                    servicio?.duration.toLowerCase().includes(searchValue.toLowerCase()) ||
                    servicio?.date.toLowerCase().includes(searchValue.toLowerCase()) ||
                    servicio?.cost.cost.toString().includes(searchValue.toLowerCase()) ||
                    servicio?.cost.eca_cost.toString().includes(searchValue.toLowerCase()) ||
                    servicio?.cost.extra_cost.toString().includes(searchValue.toLowerCase())
            });
        }
        searchButton.style.display = 'flex';
        fillindexTable(servicioFiltrados);
    });
    const clearSearch = () => {
        searchInput.value = '';
        searchButton.style.display = 'none';
        fillindexTable(servicios);
    };
</script>

<script> //Script para manejar el editado de la fecha
    const editFecha = () => {
        console.log('editFecha');
    }
</script>

<script>
    const filtrarServicioPorEstatus = (estatus) => {
        let servicioFiltrados = [...servicios];
        const FECHA_HOY = new Date();
        const FECHA_HOY_STRING = FECHA_HOY.getFullYear() + '-0' + (FECHA_HOY.getMonth() + 1) + '-' + FECHA_HOY.getDate();        

        if (estatus === 'activos') {
            botonActivos.classList.add('active');
            botonFuturos.classList.remove('active');
            botonPasados.classList.remove('active');
            servicioFiltrados = servicios.filter(servicio => {
                return servicio.date.split(' ')[0] === FECHA_HOY_STRING;

            });
        } else if (estatus === 'pasados') {
            botonActivos.classList.remove('active');
            botonFuturos.classList.remove('active');
            botonPasados.classList.add('active');
            servicioFiltrados = servicios.filter(servicio => {
                return servicio.date.split(' ')[0] < FECHA_HOY_STRING;
            });
        } else if (estatus === 'futuros') {
            botonActivos.classList.remove('active');
            botonFuturos.classList.add('active');
            botonPasados.classList.remove('active');
            servicioFiltrados = servicios.filter(servicio => {
                return servicio.date.split(' ')[0] > FECHA_HOY_STRING;
            });
        }
        fillindexTable(servicioFiltrados);
    }
</script>

<script> // Script para manejar la edicion de prestadora
    let estaEditandoPrestador = false;

    const editarPrestador = (element, idServicio) => {
        console.log('editPrestador');
        if (estaEditandoPrestador) {
            return;
        }

        $.ajax({
            url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=get_possible_provider",
            data:{
                service_id:idServicio
            },
            success: function(res) {
                res = JSON.parse(res)
                console.log(res);
                console.log(idServicio);
                const modalEditandoPrestado = document.createElement('div');
                modalEditandoPrestado.classList.add('main__modal', 'main__modal--edit');
                modalEditandoPrestado.innerHTML = `       
                    <div>
                        <button
                            class="button button--primary button--circle"
                            onclick="closeModalEditarPrestadora(this)"
                        >
                            <i class="fa-solid fa-x"></i>
                        </button>
                    </div>
                    <form id="formEditandoPrestador" onsubmit="handlePrestadorSubmit(event)">
                        <input type="hidden" name="idServicio" value="${idServicio}">
                        <div class="form-group">
                            <label for="prestador">Prestador</label>
                            <select class="form-control" id="nuevoPrestador">
                                <option value="0">Seleccione una prestadora</option>
                                <optgroup label="---Recomendados---">
                                    ${res.recommended.map(prestadora => `
                                        <option value="${prestadora.id}">${prestadora.name} ${prestadora.lastname}</option>
                                    `).join('')}
                                </optgroup>
                                <optgroup label="---Otros---">
                                    ${res.not_recommended.map(prestadora => `
                                        <option value="${prestadora.id}">${prestadora.name} ${prestadora.lastname}</option>
                                    `).join('')}
                                </optgroup>
                            </select>
                        </div>
                        <button type="submit" class="button button--primary button--submit">
                            Guardar
                        </button>
                    </form>
                `;
                element.parentNode.appendChild(modalEditandoPrestado);
                estaEditandoPrestador = true;
            }
        })

    }

    const closeModalEditarPrestadora = (element) => {
        element.parentNode.parentNode.remove();
        estaEditandoPrestador = false;
    }

    const handlePrestadorSubmit = (event) => {
        event.preventDefault();
        const nuevoPrestador = event.target.nuevoPrestador.value;
        const idServicio = event.target.idServicio.value;
        const provider = $("#nuevoPrestador").val();

        console.log("provider", provider);

        const data = {
            id: idServicio,
            provider_id: nuevoPrestador
        }

        $.ajax({
            url: 'bridge/routes.php?action=update_provider',
            type: 'GET',
            data,
            success: function(resp) {
                alert('Información actualizada');
                servicios.forEach(element => {
                    if (element.id === parseInt(idServicio)) {
                        element.provider = provider[0];
                    }
                });
                fillindexTable(servicios);
                closeModalEditarPrestadora(event.target.parentNode);
                location.reload(true);
            }
        });
    }

</script>