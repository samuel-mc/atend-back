<main class="main">
    <section class="main__content" id="main">
       
       <?php include "botones.php"; ?>

        <h1>Glasgow</h1>

        <table class="main__table" id="tablaBitacora">
            <thead>
                <tr>
                    <th>Hora</th>
                    <th>Apertura de ojos</th>
                    <th>Resp Verbal</th>
                    <th>Resp Motora</th>
                    <th>Escala de Glasgow</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $d) : ?>
                    <tr>
                        <td><?php echo explode(" ",$d['timestamp'])[1]; ?></td>
                        <td><?php echo $d['eyes_open']; ?></td>
                        <td><?php echo $d['verbal_response']; ?></td>
                        <td><?php echo $d['motor_response']; ?></td>
                        <td><?php echo $d['glasgow_scale']; ?></td>
                        <td>
                            <button 
                                class="button"
                                onclick="handleEditGlasgow(
                                    this,
                                    <?php echo $d['id']; ?>,
                                    <?php echo $d['eyes_open_id']; ?>,
                                    <?php echo $d['verbal_response_id']; ?>,
                                    <?php echo $d['motor_response_id']; ?>,
                                    <?php echo $d['glasgow_scale']; ?>
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

    const handleEditGlasgow = (button, id, ojos, verbal, motor, glasgow) => {        
        const modalGlasgow = document.createElement('div');
        modalGlasgow.classList.add('main__modal', 'main__modal--filtrar');
        modalGlasgow.id = 'modalFiltrado';
        modalGlasgow.innerHTML = `
            <div>
                <button
                    class="button button--primary button--circle"
                    onclick="closeModalGlasgow(this)"
                    >
                    <i class="fa-solid fa-x"></i>
                </button>
            </div>
            <form id="formFiltrado">
                <input type="hidden" name="id" id="id" value="${id}">
                <div class="form__field">
                    <label for="aperturaDeOjos">Apertura de ojos</label>
                    <select name="aperturaDeOjos" id="aperturaDeOjos">
                        <option value="">Seleccione una opción</option>
                        <?php foreach ($catEyes as $type) { ?>
                            <option value="<?php echo $type['id']; ?>" ${Number(<?php echo $type['id']; ?>) === ojos ? 'selected' : ''}>
                                <?php echo $type['name']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form__field">
                    <label for="respuestaVerbal">Respuesta verbal</label>
                    <select name="respuestaVerbal" id="respuestaVerbal">
                        <option value="">Seleccione una opción</option>
                        <?php foreach ($verbalRes as $type) { ?>
                            <option value="<?php echo $type['id']; ?>" ${Number(<?php echo $type['id']; ?>) === verbal ? 'selected' : ''}>
                                <?php echo $type['name']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form__field">
                    <label for="respuestaMotora">Respuesta motora</label>
                    <select name="respuestaMotora" id="respuestaMotora">
                        <option value="">Seleccione una opción</option>
                        <?php foreach ($motorRes as $type) { ?>
                            <option value="<?php echo $type['id']; ?>" ${Number(<?php echo $type['id']; ?>) === motor ? 'selected' : ''}>
                                <?php echo $type['name']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form__field">
                    <label for="escalaDeGlaslow">Escala de Glaslow</label>
                    <input type="text" name="escalaDeGlaslow" id="escalaDeGlaslow" placeholder="10 = Estupor profundo" value="${glasgow}">
                </div>
    
                <div class="form__field">
                    <button type="button" class="button button--primary" onclick="actualizarGlasgow()">
                        Guardar
                    </button>
                </div>
            </form>`
        button.parentNode.appendChild(modalGlasgow)
    }

    const closeModalGlasgow = (button) => {
        button.parentNode.parentNode.remove();
    }

    const actualizarGlasgow = () => {
        const id = document.getElementById('id').value;
        const eyes_open_id = $('#aperturaDeOjos').val();
        const verbal_response_id = $('#respuestaVerbal').val();
        const motor_response_id = $('#respuestaMotora').val();
        const glasgow_scale = $('#escalaDeGlaslow').val();

        if (
            id === '' ||
            eyes_open_id === '' ||
            verbal_response_id === '' ||
            motor_response_id === '' ||
            glasgow_scale === ''
        ) {
            alert('Todos los campos son obligatorios');
            return;
        }

        $.ajax({
            url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=update_scale_glasgow",
            data: {
                id,
                eyes_open_id,
                verbal_response_id,
                motor_response_id,
                glasgow_scale
            },
            success: function(res){
                alert("Información guardada con éxito");
                location.reload();
            }
        });

    }
</script>