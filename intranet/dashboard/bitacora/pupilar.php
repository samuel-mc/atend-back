<main class="main">
    <section class="main__content" id="main">
       
        <?php include "botones.php"; ?>

        <h1>Pupilar</h1>

        <table class="main__table" id="tablaBitacora">
            <thead>
                <tr>
                    <th>Hora</th>
                    <th>Izquierda</th>
                    <th>Derecha</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $d) : ?>
                    <tr>
                        <td><?php echo explode(" ",$d['timestamp'])[1]; ?></td>
                        <td><?php echo $d['pupilar_left']; ?></td>
                        <td><?php echo $d['pupilar_right']; ?></td>
                        <td>
                            <button 
                                class="button"
                                onclick="handleEditPupilar(
                                    this,
                                    <?php echo $d['id']; ?>,
                                    <?php echo $d['pupilar_left']; ?>,
                                    <?php echo $d['pupilar_right']; ?>
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

    const handleEditPupilar = (button, id, izquierda, derecha) => {        
        const modalPupilar = document.createElement('div');
        modalPupilar.classList.add('main__modal', 'main__modal--filtrar');
        modalPupilar.id = 'modalFiltrado';
        modalPupilar.innerHTML = `
            <div>
                <button
                    class="button button--primary button--circle"
                    onclick="closeModalPupilar(this)"
                    >
                    <i class="fa-solid fa-x"></i>
                </button>
            </div>
            <form id="formFiltrado">
                <input type="hidden" name="id" id="id" value="${id}">
                <div class="form__field">
                    <label for="pupilarIzquierda">Izquierda (0 – 10)</label>
                    <input type="number" name="pupilarIzquierda" id="pupilarIzquierda" placeholder="0" min="0" max="10" value="${izquierda}">
                </div>
                <div class="form__field">
                    <label for="pupilarDerecha">Derecha (0 – 10)</label>
                    <input type="number" name="pupilarDerecha" id="pupilarDerecha" placeholder="0" min="0" max="10" value="${derecha}">
                </div>
                <div class="form__field">
                    <button type="button" class="button button--primary" onclick="actualizarPupilar()">
                        Guardar
                    </button>
                </div>
            </form>`
        button.parentNode.appendChild(modalPupilar)
        console.log("editar")
    }

    const closeModalPupilar = (button) => {
        button.parentNode.parentNode.remove();
    }

    const actualizarPupilar = () => {
        const id = document.getElementById('id').value;
        const pupilar_left = document.getElementById('pupilarIzquierda').value;
        const pupilar_right = document.getElementById('pupilarDerecha').value;

        
        if (
            pupilar_right === '' ||
            pupilar_left === '' ||
            pupilar_right > 10 ||
            pupilar_left > 10
        ) {
            alert('Revisar los campos');
            return;
        }
        
        $.ajax({
            url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=update_scale_pupilar",
            data: {
                id,
                pupilar_left,
                pupilar_right
            },
            success: function(res){
                alert("Información guardada con éxito");
                location.reload();
            }
        });

    }
</script>