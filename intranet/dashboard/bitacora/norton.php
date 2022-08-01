<main class="main">
    <section class="main__content" id="main">
        
        <?php include "botones.php"; ?>

        <h1>Norton</h1>

        <table class="main__table" id="tablaBitacora">
            <thead>
                <tr>
                    <th>Hora</th>
                    <th>Edo. Mental</th>
                    <th>Actividad</th>
                    <th>Movilidad</th>
                    <th>Incont</th>
                    <th>Edo. Gen</th>
                    <th>Zona</th>
                    <th>Tratamiento</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $d) : ?>
                    <tr>
                        <td><?php echo explode(" ",$d['timestamp'])[1]; ?></td>
                        <td><?php echo $d['state_of_mind']; ?></td>
                        <td><?php echo $d['activity']; ?></td>
                        <td><?php echo $d['movility']; ?></td>
                        <td><?php echo $d['incontinence']; ?></td>
                        <td><?php echo $d['general_status']; ?></td>
                        <td><?php echo $d['affected_zone']; ?></td>
                        <td><?php echo $d['norton_scale']; ?></td>
                        <td>
                            <button
                                class="button"
                                onclick="handleEditNorton(
                                    this,
                                    <?php echo $d['id']; ?>,
                                    <?php echo $d['state_of_mind_id']; ?>,
                                    <?php echo $d['activity_id']; ?>,
                                    <?php echo $d['movility_id']; ?>,
                                    <?php echo $d['incontinence_id']; ?>,
                                    <?php echo $d['general_status_id']; ?>,
                                    <?php echo $d['affected_zone_id']; ?>,
                                    <?php echo $d['norton_scale']; ?>
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

    const handleEditNorton = (button, id, mental, actividad, movilidad, incont, edoGral, zonaAfectada, escalaNorton) => {        
        const modalNorton = document.createElement('div');
        modalNorton.classList.add('main__modal', 'main__modal--filtrar');
        modalNorton.id = 'modalFiltrado';
        modalNorton.innerHTML = `
            <div>
                <button
                    class="button button--primary button--circle"
                    onclick="closeModalNorton(this)"
                    >
                    <i class="fa-solid fa-x"></i>
                </button>
            </div>
            <form id="formFiltrado">
                <input type="hidden" name="id" id="id" value="${id}">
                <div class="form__field">
                    <label for="estadoMental">Estado mental</label>
                    <select name="estadoMental" id="estadoMental">
                        <option value="">Seleccione una opción</option>
                        <?php foreach ($stateMinds as $type) { ?>
                            <option value="<?php echo $type['id']; ?>" ${Number(<?php echo $type['id']; ?>) === mental ? 'selected' : ''}>
                                <?php echo $type['name']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form__field">
                    <label for="actividad">Actividad</label>
                    <select name="actividad" id="actividad">
                        <option value="">Seleccione una opción</option>
                        <option value="1" ${actividad == '1' ? 'selected' : ''}>Sentado</option>
                        <option value="2" ${actividad == '2' ? 'selected' : ''}>Otro</option>
                    </select>
                </div>
                <div class="form__field">
                    <label for="movilidad">Movilidad</label>
                    <select name="movilidad" id="movilidad">
                        <option value="">Seleccione una opción</option>
                        <?php foreach ($movilities as $type) { ?>
                            <option value="<?php echo $type['id']; ?>" ${Number(<?php echo $type['id']; ?>) === movilidad ? 'selected' : ''}>
                                <?php echo $type['name']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form__field">
                    <label for="incontiencia">Incontiencia</label>
                    <select name="incontiencia" id="incontiencia">
                        <option value="">Seleccione una opción</option>
                        <?php foreach ($incontinences as $type) { ?>
                            <option value="<?php echo $type['id']; ?>" ${Number(<?php echo $type['id']; ?>) === incont ? 'selected' : ''}>
                                <?php echo $type['name']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form__field">
                    <label for="estadoGeneral">Estado general</label>
                    <select name="estadoGeneral" id="estadoGeneral">
                        <option value="">Seleccione una opción</option>
                        <?php foreach ($generalStatus as $type) { ?>
                            <option value="<?php echo $type['id']; ?>" ${Number(<?php echo $type['id']; ?>) === edoGral ? 'selected' : ''}>
                                <?php echo $type['name']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form__field">
                    <label for="zonaAfectada">Zona afectada</label>
                    <select name="zonaAfectada" id="zonaAfectada">
                        <option value="">Seleccione una opción</option>
                        <?php foreach ($affectedZones as $type) { ?>
                            <option value="<?php echo $type['id']; ?>" ${Number(<?php echo $type['id']; ?>) === zonaAfectada ? 'selected' : ''}>
                                <?php echo $type['name']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form__field">
                    <label for="escalaDeNorton">Escala de Norton</label>
                    <input type="text" name="escalaDeNorton" id="escalaDeNorton" placeholder="10 = Alto riesgo" min="0" max="10" value="${escalaNorton}">
                </div>
    
                <div class="form__field">
                    <button type="button" class="button button--primary" onclick="actualizarNorton()">
                        Guardar
                    </button>
                </div>
            </form>`
        button.parentNode.appendChild(modalNorton)
        console.log("editar")
    }

    const closeModalNorton = (button) => {
        button.parentNode.parentNode.remove();
    }

    const actualizarNorton = () => {
        const id = document.getElementById('id').value;
        const state_of_mind_id = $('#estadoMental').val();
        const activity_id = $('#actividad').val();
        const movility_id = $('#movilidad').val();
        const incontinence_id = $('#incontiencia').val();
        const general_status_id = $('#estadoGeneral').val();
        const affected_zone_id = $('#zonaAfectada').val();
        const norton_scale = $('#escalaDeNorton').val();

        if (
            state_of_mind_id === '' ||
            activity_id === '' ||
            movility_id === '' ||
            incontinence_id === '' ||
            general_status_id === '' ||
            affected_zone_id === '' ||
            norton_scale === ''
        ) {
            window.alert("Revisar la información ingresada.");
            return;
        }

        $.ajax({
            url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=update_scale_norton",
            data: {
                id,
                state_of_mind_id,
                activity_id,
                movility_id,
                incontinence_id,
                general_status_id,
                affected_zone_id,
                norton_scale
            },
            success: function(res){
                alert("Información guardada con éxito");
                location.reload();
            }
        });

    }
</script>