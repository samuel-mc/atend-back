<main class="main">
    <section class="main__content" id="main">
        
        <?php include "botones.php"; ?>

        <table class="main__table" id="tablaBitacora">
            <thead>
                <tr>
                    <th>Hora</th>
                    <th>Tipo De Apoyo</th>
                    <th>Litros Por Hora</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $d) : ?>
                    <tr>
                        <td><?php echo explode(" ",$d['timestamp'])[1]; ?></td>
                        <td><?php echo $d['type']; ?></td>
                        <td><?php echo $d['liters_per_hour']; ?></td>
                        <td>
                            <button 
                                class="button"
                                onclick="handleEditApoyo(
                                    this,
                                    <?php echo $d['id']; ?>,
                                    <?php echo $d['type_id']; ?>,
                                    <?php echo $d['liters_per_hour']; ?>
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

    const handleEditApoyo = (button, id, tipo, litros) => {        
        const modalApoyo = document.createElement('div');
        modalApoyo.classList.add('main__modal', 'main__modal--filtrar');
        modalApoyo.id = 'modalFiltrado';
        modalApoyo.innerHTML = `
            <div>
                <button
                    class="button button--primary button--circle"
                    onclick="closeModalApoyo(this)"
                    >
                    <i class="fa-solid fa-x"></i>
                </button>
            </div>
            <form id="formFiltrado">
                <input type="hidden" name="id" id="id" value="${id}">
                <div class="form__field">
                    <label for="tipoApoyoResp">Tipo de apoyo</label>
                    <select name="tipoApoyoResp" id="tipoApoyoResp">
                        <option value="">Seleccione una opción</option>
                        <?php foreach ($breathTypes as $type) { ?>
                            <option value="<?php echo $type['id']; ?>"><?php echo $type['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form__field">
                    <label for="litrosPorHora">Litros por hora</label>
                    <input type="number" name="litrosPorHora" id="litrosPorHora" value="${litros}">
                </div>
    
                <div class="form__field">
                    <button type="button" class="button button--primary" onclick="actualizarApoyo()">
                        Guardar
                    </button>
                </div>
            </form>`
        button.parentNode.appendChild(modalApoyo)
        console.log("editar")
    }

    const closeModalApoyo = (button) => {
        button.parentNode.parentNode.remove();
    }

    const actualizarApoyo = () => {
        const id = document.getElementById('id').value;
        const type_id = $("#tipoApoyoResp").val();
        const liters_per_hour = $("#litrosPorHora").val();

        if (
            type_id === '' ||
            liters_per_hour === ''
        ) {
            alert('Todos los campos son obligatorios');
            return;
        }

        $.ajax({
            url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=update_binacle_help",
            data: {
                id,
                type_id,
                liters_per_hour
            },
            success: function(res){
                alert("Información guardada con éxito");
                location.reload();
            }
        });

    }
</script>