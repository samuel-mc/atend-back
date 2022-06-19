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
	            <td><?php echo $client['name']; ?></td>
	            <td>
	               	<?php foreach ($client['patients'] as $pat): ?>
	               		<?php echo $pat['name']; ?> <br>
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