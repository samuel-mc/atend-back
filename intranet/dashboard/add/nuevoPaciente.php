<main class="main">
	<section class="main__content main__add--cotainer">
	    <header class="main__header--servicios">
	        <h1>Info del paciente</h1>
	    </header>
	    <div>
	        <form class="form__info-paciente" id="formInfoPaciente">
	            <div>
	                <div class="form__field">
	                    <label for="nombrePaciente">Nombre del paciente </label>
	                    <input type="text" value="" name="nombrePaciente" id="nombrePaciente">
	                </div>
	                <div class="form__field form__field--doble">
	                    <div>
	                        <label for="fechaNacimiento">Fecha de Nacimmiento</label>
	                        <input type="date" name="fechaNacimiento" id="fechaNacimiento">
	                    </div>
	                    <div>
	                        <label for="sexoPaciente">Sexo</label>
	                        <select name="sexoPaciente" id="sexoPaciente">
	                            <option value="1">Femenino</option>
	                            <option value="2">Masculino</option>
	                        </select>
	                    </div>
	                </div>

	                <div class="form__field form__field--doble">
	                    <div>
	                        <label for="peso">Peso</label>
	                        <input type="text" value="" name="peso" id="peso">
	                    </div>

	                    <div>
	                        <label for="estatura">Estatura</label>
	                        <input type="text" value="" name="estatura" id="estatura">
	                    </div>
	                </div>

	                <div class="form__field">
	                    <label for="callePaciente">Calle </label>
	                    <input type="text" value="" name="callePaciente" id="callePaciente">
	                </div>

	                <div class="form__field form__field--doble">
	                    <div>
	                        <label for="numeroExteriorPaciente">Número Ext</label>
	                        <input type="number" value="" name="numeroExteriorPaciente" id="numeroExteriorPaciente">
	                    </div>

	                    <div>
	                        <label for="numeroInteriorPaciente">Número Int</label>
	                        <input type="number" value="" name="numeroInteriorPaciente" id="numeroInterion">
	                    </div>
	                </div>

	                <div class="form__field form__field--doble">
	                    <div>
	                        <label for="coloniaPaciente">Colonia</label>
	                        <input type="text" value="" name="coloniaPaciente" id="coloniaPaciente">
	                    </div>

	                    <div>
	                        <label for="delegacionPaciente">Delegación</label>
	                        <input type="number" value="" name="delegacionPaciente" id="delegacionPaciente">
	                    </div>
	                </div>

	                <div class="form__field form__field--doble">
	                    <div>
	                        <label for="cpPaciente">CP</label>
	                        <input type="number" value="" name="cpPaciente" id="cpPaciente">
	                    </div>

	                    <div>
	                        <label for="estadoPaciente">Estado</label>
	                        <input type="text" value="" name="estadoPaciente" id="estadoPaciente">
	                    </div>
	                </div>

	                <div class="form__field">
	                    <label for="paisPaciente">País </label>
	                    <input type="text" value="" name="paisPaciente" id="paisPaciente">
	                </div>

	                <div class="form__field">
	                    <label for="medicoTratante">Médico Tratante </label>
	                    <input type="text" value="" name="medicoTratante" id="medicoTratante">
	                </div>

	                <div class="form__field">
	                    <label for="contactoDeEmergencia">Contacto de Emergencia </label>
	                    <input type="text" value="" name="contactoDeEmergencia" id="contactoDeEmergencia">
	                </div>

	                <div class="form__field form__field--doble">
	                    <div>
	                        <label for="telEmergencia1">Tel emergencia 1</label>
	                        <input type="tel" value="" name="telEmergencia1" id="telEmergencia1">
	                    </div>

	                    <div>
	                        <label for="telEmergencia2">Tel emergencia 2</label>
	                        <input type="tel" value="" name="telEmergencia2" id="telEmergencia2">
	                    </div>
	                </div>
	            </div>

	            <div>
	                <div class="form__field">
	                    <label for="diagnostico">Diagnóstico</label>
	                    <input type="text" name="diagnostico" id="diagnostico">
	                </div>
	                <div class="form__field">
	                    <label for="comentarioPaciente">Comentarios</label>
	                    <input type="text" name="comentarioPaciente" id="comentarioPaciente">
	                </div>
	                <div class="form__field">
	                    <label for="alergia">Alergías</label>
	                    <input type="text" name="alergia" id="alergia">
	                </div>
	                <div class="form__field">
	                    <label for="ordenMedica">Orden Médica</label>
	                    <input type="text" name="ordenMedica" id="ordenMedica">
	                </div>
	                <div class="form__field">
	                    <label for="reanimacion">Reanimación </label>
	                    <label for="requiereReanimacion" class="form--checkbox">El paciente quiere reanimación
	                        <input type="checkbox" name="requiereReanimacion" id="requiereReanimacion">
	                    </label>
	                </div>
	            </div>

	            <div>
	                <div class="form__field">
	                   	<label for="padecimientos">Padecimientos</label>
	                   	<select name="padecimientos" id="padecimientos" onchange="selectAilment()">
	                   	    <option value="0">Seleccionar Padecimientos</option>
	                   	    <?php foreach ($ailments as $ail) { ?>
	                   	        <option value="<?php echo $ail['id']; ?>"><?php echo $ail['name']; ?></option>
	                   	    <?php } ?>
	                   	</select>
	                   	<div class="row" style="margin-top:10px;">
	                   	    <div id="ailments_selected"></div>
	                   	</div>
	                </div>
	            </div>

	            <input type="submit" class="button button--primary button--submit" value="Guardar">
	        </form>
	    </div>
	</section>
</main>


<script type="text/javascript">
    let ailments = Array();
    for (var i = 1; i < 11; i++) {
        if ($("#selected_ailment_"+i).length){
            ailments.push({id:i,name:$("#selected_ailment_"+i).attr("name")});
            $("#padecimientos option[value='"+i+"']").remove();
        }
    }
    console.log(ailments);
    setAilments();
    function selectAilment() {
        ailments.push({id:Number($("#padecimientos").val()),name:$("#padecimientos option:selected").text()});
        $("#padecimientos option[value='"+$("#padecimientos").val()+"']").remove();
        $("#padecimientos").val(0);
        setAilments();
    }
    function deleteAilment(id) {
        let ac = ailments.filter(item => item.id === id);
        $("#padecimientos").append("<option value='"+id+"'>"+ac[0].name+"</option>")
        ailments = ailments.filter(item => item.id !== id);
        setAilments();
    }
    function setAilments() {
        let ms = "";
        for (var i = 0; i < ailments.length; i++) {
            let m = ailments[i];
            ms+='<span id="selected_ailment_'+m.id+'" name="'+m.name+'" class="ailment-tag">'+m.name+' <span><i onclick="deleteAilment('+m.id+')" class="fas fa-times"></i></span></span>';
        }
        $("#ailments_selected").html(ms);
    }
</script>