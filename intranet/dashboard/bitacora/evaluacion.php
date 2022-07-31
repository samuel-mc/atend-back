<main class="main">
    <section class="main__content" id="main">
       
        <?php include "botones.php"; ?>

        <h1>Evaluación y reevaluación del dolor</h1>

        <table class="main__table" id="tablaBitacora">
            <thead>
                <tr>
                    <th>Hora</th>
                    <th>EVA/ENA</th>
                    <th>EVERA</th>
                    <th>Conductual</th>
                    <th>Tipo de Dolor</th>
                    <th>Tratamiento</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($data as $d) : ?>
                    <tr>
                        <td><?php echo explode(" ",$d['timestamp'])[1]; ?></td>
                        <td><?php echo $d['ena_eva']; ?></td>
                        <td><?php echo $d['evera']; ?></td>
                        <td><?php echo $d['conductual']; ?></td>
                        <td><?php echo $d['pain']; ?></td>
                        <td><?php echo $d['treatment']; ?></td>
                        <td>
                            <button 
                                class="button"
                                onclick="handleEditEvaluacion(
                                    this,
                                    <?php echo $d['id']; ?>,
                                    <?php echo $d['ena_eva']; ?>,
                                    <?php echo $d['evera_id']; ?>,
                                    '<?php echo $d['conductual']; ?>',
                                    <?php echo $d['pain_type_id']; ?>,
                                    '<?php echo $d['treatment']; ?>'
                                )">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </section>
</main>

<script>
    const modalOpened = false;

    const handleEditEvaluacion = (button, id, eva, evera, conductual, dolor, tratamiento ) => {        
        const modalEvaluacion = document.createElement('div');
        modalEvaluacion.classList.add('main__modal', 'main__modal--filtrar');
        modalEvaluacion.id = 'modalFiltrado';
        modalEvaluacion.innerHTML = `
            <div>
                <button
                    class="button button--primary button--circle"
                    onclick="closeModalEvaluacion(this)"
                    >
                    <i class="fa-solid fa-x"></i>
                </button>
            </div>
            <form id="formFiltrado">
                <input type="hidden" name="id" id="id" value="${id}">
                <div class="form__field">
                    <label for="enaEva">ENA / EVA</label>
                    <input type="number" name="enaEva" id="enaEva" placeholder="ENA / EVA" value="${eva}">
                </div>

                <div class="form__field">
                    <label for="evera">EVERA</label>
                    <select name="evera" id="evera">
                        <option value="">Seleccionar uno</option>                                
                        <option value="1" ${evera === 1 ? 'selected' : ''}>Moderado</option>
                    </select>
                </div>

                <div class="form__field">
                    <label for="conductual">Conductual</label>
                    <select name="conductual" id="conductual">
                        <option value="">Seleccionar uno</option>                                
                        <option value="1" ${dolor === 1 ? 'selected' : ''}>Sin dolor</option>
                        <option value="2" ${dolor === 2 ? 'selected' : ''}>Dolor leve</option>
                        <option value="3" ${dolor === 3 ? 'selected' : ''}>Dolor moderado</option>
                        <option value="4" ${dolor === 4 ? 'selected' : ''}>Dolor intenso</option>
                        <option value="5" ${dolor === 5 ? 'selected' : ''}>Dolor muy intenso</option>
                        <option value="6" ${dolor === 6 ? 'selected' : ''}>Dolor insoportable</option>
                    </select>
                </div>

                <div class="form__field">
                    <label for="tipoDeDolor">Tipo de dolor</label>
                    <select name="tipoDeDolor" id="tipoDeDolor">
                        <option value="">Seleccionar uno</option>
                        <option value="1" ${dolor === 1 ? 'selected' : ''}>Opresivo</option>
                        <option value="2" ${dolor === 2 ? 'selected' : ''}>Otro</option>
                    </select>
                </div>
                <div class="form__field">
                    <label for="tratamiento">Tratamiento</label>
                    <select name="tratamiento" id="tratamiento" onchange="handleMedicamentosEscalas(event)">
                        <option value="">Seleccionar uno</option>
                        <option value="Físico" ${tratamiento === 'Físico' ? 'selected' : ''}>Físico</option>
                        <option value="Químico" ${tratamiento === 'Químico' ? 'selected' : ''}>Químico</option>
                    </select>
                </div>
    
                <div class="form__field">
                    <button type="button" class="button button--primary" onclick="actualizarEvaluacion()">
                        Guardar
                    </button>
                </div>
            </form>`
        button.parentNode.appendChild(modalEvaluacion)
        console.log("editar")
    }

    const closeModalEvaluacion = (button) => {
        button.parentNode.parentNode.remove();
    }

    const actualizarEvaluacion = () => {
        const id = document.getElementById('id').value;
        const ena_eva = $('#enaEva').val();
        const evera_id = $('#evera').val();
        const conductual_id = $("#conductual").val();
        const pain_type_id = $('#tipoDeDolor').val();
        const treatment = $('#tratamiento').val();

        if (
            ena_eva === '' ||
            evera_id === '' ||
            conductual_id === '' ||
            pain_type_id === '' ||
            treatment === ''
        ) {
            alert('Todos los campos son obligatorios');
            return;
        }

        $.ajax({
            url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=update_scale_pain",
            data: {
                id,
                ena_eva,
                evera_id,
                conductual_id,
                pain_type_id,
                treatment
            },
            success: function(res){
                alert("Información guardada con éxito");
                // location.reload();
            }
        });

    }
</script>