<main class="main">
    <section class="main__content" id="main">
        
        <?php include "botones.php"; ?>

        <h1>Perímetros</h1>

        <table class="main__table" id="tablaBitacora">
            <thead>
                <tr>
                    <th>Hora</th>
                    <th>Ubicación</th>
                    <th>Perímetro</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $d) : ?>
                    <tr>
                        <td><?php echo explode(" ",$d['timestamp'])[1]; ?></td>
                        <td><?php echo $d['location']; ?></td>
                        <td><?php echo $d['perimeter']; ?>cm</td>
                        <td>
                            <button
                                class="button"
                                onclick="handleEditPerimetro(
                                    this,
                                    <?php echo $d['id']; ?>,
                                    <?php echo $d['location_id']; ?>,
                                    <?php echo $d['perimeter']; ?>
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

    const handleEditPerimetro = (button, id, locacion, perimetro) => {
        if (modalOpened) {
            return;
        }
        const modalPerimetro = document.createElement('div');
        modalPerimetro.classList.add('main__modal', 'main__modal--filtrar');
        modalPerimetro.id = 'modalFiltrado';
        modalPerimetro.innerHTML = `
            <div>
                <button
                    class="button button--primary button--circle"
                    onclick="closeModalPerimetro(this)"
                    >
                    <i class="fa-solid fa-x"></i>
                </button>
            </div>
            <form id="formFiltrado">
                <input type="hidden" name="id" id="id" value="${id}">

                <div class="form__field">
                    <label for="ubicacion">Ubicación</label>
                    <select name="ubicacion" id="ubicacion">
                        <option value="">Seleccione una opción</option>
                        <?php foreach ($locations as $type) { ?>
                            <option value="<?php echo $type['id']; ?>" ${Number(<?php echo $type['id']; ?>) === locacion ? 'selected' : ''}>
                                <?php echo $type['name']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form__field">
                    <label for="perimetro">Perímetro</label>
                    <input type="text" name="perimetro" id="perimetro" placeholder="cm" value="${perimetro}">
                </div>
    
                <div class="form__field">
                    <button type="button" class="button button--primary" onclick="actualizarPerimetro()">
                        Guardar
                    </button>
                </div>
            </form>`
        button.parentNode.appendChild(modalPerimetro);
        modalOpened = true;
    }

    const closeModalPerimetro = (button) => {
        button.parentNode.parentNode.remove();
        modalOpened = false;
    }

    const actualizarPerimetro = () => {
        const id = document.getElementById('id').value;
        const location_id = $('#ubicacion').val();
        const perimeter = $('#perimetro').val();

        if (
            location_id === '' ||
            perimeter === ''
        ) {
            window.alert("Revisar la información ingresada.");
            return;
        }

        $.ajax({
            url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=update_scale_perimeters",
            data: {
                id,
                location_id,
                perimeter
            },
            success: function(res){
                alert("Información guardada con éxito");
                location.reload();
            }
        });

    }
</script>