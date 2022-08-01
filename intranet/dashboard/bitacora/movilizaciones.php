<main class="main">
    <section class="main__content" id="main">
       
       <?php include "botones.php"; ?>

       <table class="main__table" id="tablaBitacora">
            <thead>
                <tr>
                    <th>Hora</th>
                    <th>Tipo de Movilización</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $d) : ?>
                    <tr>
                        <td><?php echo explode(" ",$d['timestamp'])[1]; ?></td>
                        <td><?php echo $d['type']; ?></td>
                        <td>
                            <button 
                                class="button"
                                onclick="handleEditMovilizaciones(
                                    this,
                                    <?php echo $d['id']; ?>,
                                    '<?php echo $d['type_id']; ?>'
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

    const handleEditMovilizaciones = (button, id, movilizacion) => {
        const modalMovilizaciones = document.createElement('div');
        modalMovilizaciones.classList.add('main__modal', 'main__modal--filtrar');
        modalMovilizaciones.id = 'modalFiltrado';
        modalMovilizaciones.innerHTML = `
            <div>
                <button
                    class="button button--primary button--circle"
                    onclick="closeModalMovilizaciones(this)"
                    >
                    <i class="fa-solid fa-x"></i>
                </button>
            </div>
            <form id="formFiltrado">
                <input type="hidden" name="id" id="id" value="${id}">
                <div class="form__field">
                    <label for="tipoMovilizacion">Tipo de movilización</label>
                    <select name="tipoMovilizacion" id="tipoMovilizacion">
                        <option value="">Seleccione uno</option>
                        <?php foreach ($movTypes as $mov) { ?>
                            <option value="<?php echo $mov['id']; ?>">
                                <?php echo $mov['name']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
    
                <div class="form__field">
                    <button type="button" class="button button--primary" onclick="actualizarMovilizaciones()">
                        Guardar
                    </button>
                </div>
            </form>`
        button.parentNode.appendChild(modalMovilizaciones)
        console.log("editar")
    }

    const closeModalMovilizaciones = (button) => {
        button.parentNode.parentNode.remove();
    }

    const actualizarMovilizaciones = () => {
        const id = document.getElementById('id').value;
        const type_id = $("#tipoMovilizacion").val();

        if ( type_id === '' ) {
            window.alert("Falta información.");
            return;
        }

        $.ajax({
            url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=update_binacle_mov",
            data: {
                id,
                type_id
            },
            success: function(res){
                alert("Información guardada con éxito");
                location.reload();
            }
        });

    }
</script>