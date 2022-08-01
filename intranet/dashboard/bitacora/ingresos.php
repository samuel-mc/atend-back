<main class="main">
    <section class="main__content" id="main">
        
        <?php include "botones.php"; ?>

        <table class="main__table" id="tablaBitacora">
            <thead>
                <tr>
                    <th>Hora</th>
                    <th>Categoría</th>
                    <th>Tipo</th>
                    <th>Solución</th>
                    <th>Cantidad</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                
                <?php foreach ($data as $d) : ?>
                    <tr>
                        <td><?php echo explode(" ",$d['timestamp'])[1]; ?></td>
                        <td><?php echo $d['category']; ?></td>
                        <td><?php echo $d['type']; ?></td>
                        <td><?php echo $d['solution']; ?></td>
                        <td><?php echo $d['quantity']; ?></td>
                        <td>
                            <button 
                                class="button"
                                onclick="handleEditIngresos(
                                    this,
                                    <?php echo $d['id']; ?>,
                                    <?php echo $d['category_id']; ?>,
                                    <?php echo $d['type_id']; ?>,
                                    '<?php echo $d['solution']; ?>',
                                    <?php echo $d['quantity']; ?>
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

    const handleEditIngresos = (button, id, categoria, tipo, solucion, cantidad) => {        
        const modalIngresos = document.createElement('div');
        modalIngresos.classList.add('main__modal', 'main__modal--filtrar');
        modalIngresos.id = 'modalFiltrado';
        modalIngresos.innerHTML = `
            <div>
                <button
                    class="button button--primary button--circle"
                    onclick="closeModalIngresos(this)"
                    >
                    <i class="fa-solid fa-x"></i>
                </button>
            </div>
            <form id="formFiltrado">
                <input type="hidden" name="id" id="id" value="${id}">
                <div class="form__field">
                    <label for="category_id">Categoría</label>
                    <select name="category_id" id="category_id">
                        <option value="1" ${categoria === 1 ? ' selected' : ''}>Ingreso</option>
                        <option value="2" ${categoria === 2 ? ' selected' : ''}>Egreso</option>
                    </select>
                </div>
                <div class="form__field">
                    <label for="type_id" id="labelTipodeIngreso">Tipo de ingreso</label>
                    <select name="type_id" id="type_id">
                        <?php foreach ($ioTypes as $type) { ?>
                            <option value="<?php echo $type['id']; ?>" ${ tipo === <?php echo $type['id']; ?> ? 'selected' : ''}>
                                <?php echo $type['name']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form__field" id="solucion">
                    <label for="solution">Solución</label>
                    <select name="solution" id="solution">
                        <option value="CVC" ${solucion === 'CVC' ? 'selected' : ''}>CVC</option>
                        <option value="NA" ${solucion === 'NA' ? 'selected' : ''}>NA</option>
                    </select>
                </div>
                <div class="form__field">
                    <label for="quantity">Cantidad</label>
                    <input type="number" id="quantity" name="quantity" value="${cantidad}">
                </div>
    
                <div class="form__field">
                    <button type="button" class="button button--primary" onclick="actualizarIngresos()">
                        Guardar
                    </button>
                </div>
            </form>`
        button.parentNode.appendChild(modalIngresos)
        console.log("editar")
    }

    const closeModalIngresos = (button) => {
        button.parentNode.parentNode.remove();
    }

    const actualizarIngresos = () => {
        const id = document.getElementById('id').value;
        const category_id = document.getElementById('category_id').value;
        const type_id = document.getElementById('type_id').value;
        const solution = document.getElementById('solution').value;
        const quantity = document.getElementById('quantity').value;

        if (
            category_id === '' ||
            type_id === '' ||
            solution === '' ||
            quantity === ''
        ) {
            alert('Todos los campos son obligatorios');
            return;
        }

        $.ajax({
            url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=update_binacle_io",
            data: {
                id,
                category_id,
                type_id,
                solution,
                quantity,
            },
            success: function(res){
                alert("Información guardada con éxito");
                location.reload();
            }
        });

    }
</script>