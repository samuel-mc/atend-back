<main class="main">
    <section class="main__content" id="main">
      
        <?php include "botones.php"; ?>


        <table class="main__table" id="tablaBitacora">
            <thead>
                <tr>
                    <th>Hora</th>
                    <th>Nombre Gen</th>
                    <th>Dósis (ml)</th>
                    <th>Vía</th>
                    <th>Frecuencia</th>
                    <th>Observaciones</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $d) : ?>
                    <tr>
                        <td><?php echo explode(" ",$d['timestamp'])[1]; ?></td>
                        <td><?php echo $d['name']; ?></td>
                        <td><?php echo $d['dosis']; ?></td>
                        <td><?php echo $d['way']; ?></td>
                        <td><?php echo $d['frequency']; ?></td>
                        <td><?php echo $d['observations']; ?></td>
                        <td>
                            <button 
                                class="button"
                                onclick = "handleEditMedicamentos(
                                    this,
                                    <?php echo $d['id']; ?>,
                                    '<?php echo $d['name']; ?>',
                                    '<?php echo $d['dosis']; ?>',
                                    '<?php echo $d['way']; ?>',
                                    '<?php echo $d['frequency']; ?>',
                                    '<?php echo $d['observations']; ?>'
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

    const handleEditMedicamentos = (button, id, nombre, dosis, via, frecuencia, observaciones) => {        
        const modalMedicamentos = document.createElement('div');
        modalMedicamentos.classList.add('main__modal', 'main__modal--filtrar');
        modalMedicamentos.id = 'modalFiltrado';
        modalMedicamentos.innerHTML = `
            <div>
                <button
                    class="button button--primary button--circle"
                    onclick="closeModalMedicamentos(this)"
                    >
                    <i class="fa-solid fa-x"></i>
                </button>
            </div>
            <form id="formFiltrado">
                <input type="hidden" name="id" id="id" value="${id}">
                <div class="form__field">
                    <label for="nombreGenerico">Nombre genérico del medicamento</label>
                    <input type="text" name="nombreGenerico" id="nombreGenerico" placeholder="Nombre genérico del medicamento" value="${nombre}">
                </div>
                <div class="form__field">
                    <label for="dosis">Dósis</label>
                    <input type="number" name="dosis" id="dosis" placeholder="ml" value="${dosis}">
                </div>
                <div class="form__field">
                    <label for="via">Vía</label>
                    <select name="via" id="via">
                        <option value="">Seleccione una opción</option>
                        <?php foreach ($drugWays as $type) { ?>
                            <option value="<?php echo $type['id']; ?>"><?php echo $type['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form__field">
                    <label for="frecuencia">Frecuencia</label>
                    <select name="frecuencia" id="frecuencia">
                        <option value="">Seleccione una opción</option>
                        <option value="2 hrs">2 hrs</option>
                        <option value="8 hrs">8 hrs</option>
                        <option value="12 hrs">12 hrs</option>
                    </select>
                </div>
                <div class="form__field">
                    <label for="observaciones">Observaciones</label>
                    <input type="text" name="observaciones" id="observaciones" placeholder="Observaciones" value="${observaciones}">
                </div>
    
                <div class="form__field">
                    <button type="button" class="button button--primary" onclick="actualizarMedicamentos()">
                        Guardar
                    </button>
                </div>
            </form>`
        button.parentNode.appendChild(modalMedicamentos)
        console.log("editar")
    }

    const closeModalMedicamentos = (button) => {
        button.parentNode.parentNode.remove();
    }

    const actualizarMedicamentos = () => {
        const id = document.getElementById('id').value;
        const name = $("#nombreGenerico").val();
        const dosis = $("#dosis").val();
        const way_id = $("#via").val();
        const frequency = $("#frecuencia").val();
        const observations = $("#observaciones").val();

        if (
            name == "" ||
            dosis == "" ||
            way_id == "" ||
            frequency == "" ||
            observations == ""
        ) {
            alert('Todos los campos son obligatorios');
            return;
        }

        $.ajax({
            url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=update_binacle_drugs",
            data: {
                id,
                name,
                dosis,
                way_id,
                frequency,
                observations
            },
            success: function(res){
                alert("Información guardada con éxito");
                location.reload();
            }
        });

    }
</script>