<main class="main">
    <section class="main__content" id="main">
        
        <?php include "botones.php"; ?>

        <table class="main__table" id="tablaBitacora">
            <thead>
                <tr>
                    <th>Hora</th>
                    <th>Presión Art.</th>
                    <th>Frecuencia Card.</th>
                    <th>Frecuencia Resp.</th>
                    <th>Temp</th>
                    <th>Saturción</th>
                    <th>Glicemia C.</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $d) : ?>
                    <tr>
                        <td><?php echo explode(" ",$d['timestamp'])[1]; ?></td>
                        <td><?php echo $d['pressure_mm']; ?>/<?php echo $d['pressure_hg']; ?></td>
                        <td><?php echo $d['heart_rate']; ?></td>
                        <td><?php echo $d['breath_frequency']; ?></td>
                        <td><?php echo $d['temperature']; ?></td>
                        <td><?php echo $d['o2_saturation']; ?></td>
                        <td><?php echo $d['capillary']; ?></td>
                        <td>
                            <button onclick="handleEditSignos(
                                this,
                                <?php echo $d['id']; ?>,
                                <?php echo $d['pressure_mm']; ?>,
                                <?php echo $d['pressure_hg']; ?>,
                                <?php echo $d['heart_rate']; ?>,
                                <?php echo $d['breath_frequency']; ?>,
                                <?php echo $d['temperature']; ?>,
                                <?php echo $d['o2_saturation']; ?>,
                                '<?php echo $d['capillary']; ?>'
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

    const handleEditSignos = (button, id, presionMM, presionHg, frecuenciaCardiaca, frecuenciaRespiratoria, temperatura, saturacion, glicemia) => {        
        
        const modalSignos = document.createElement('div');
        modalSignos.classList.add('main__modal', 'main__modal--filtrar');
        modalSignos.id = 'modalFiltrado';
        modalSignos.innerHTML = `
            <div>
                <button
                    class="button button--primary button--circle"
                    onclick="closeModalSignos(this)"
                    >
                    <i class="fa-solid fa-x"></i>
                </button>
            </div>
            <form id="formFiltrado">
                <input type="hidden" name="id" id="id" value="${id}">
                <div class="form__field form__field--doble">
                    <div>
                        <label for="presionArterialMM">Presión arterial</label>
                        <input type="number" placeholder="mm" id="presionArterialMM" name="presionArterialMM" value="${presionMM}">
                    </div>
                    <div>
                        <label for="presionArterialHG">-</label>
                        <input type="number" placeholder="hg" id="presionArterialHG" name="presionArterialHG" value="${presionHg}">
                    </div>
                </div>
                <div class="form__field">
                    <label for="frecuenciaCardiaca">Frecuencia cardiaca</label>
                    <input type="number" placeholder="ppm" id="frecuenciaCardiaca" name="frecuenciaCardiaca" value="${frecuenciaCardiaca}">
                </div>
                <div class="form__field">
                    <label for="frecuenciaRespiratoria">Frecuencia respiratoria</label>
                    <input type="number" placeholder="rpm" id="frecuenciaRespiratoria" name="frecuenciaRespiratoria" value="${frecuenciaRespiratoria}">
                </div>
                <div class="form__field">
                    <label for="temperatura">Temperatura</label>
                    <input type="number" placeholder="°C" id="temperatura" name="temperatura" value="${temperatura}">
                </div>
                <div class="form__field">
                    <label for="saturacion">Saturación O2</label>
                    <input type="number" placeholder="%" id="saturacion" name="saturacion" value="${saturacion}">
                </div>
                <div class="form__field">
                    <label for="glicemia">Glicemia capilar (sólo diabéticos)</label>
                    <input type="text" placeholder=" | " id="glicemia" name="glicemia" value="${glicemia}">
                </div>
    
                <div class="form__field">
                    <button type="button" class="button button--primary" onclick="actualizarSignos()">
                        Guardar
                    </button>
                </div>
            </form>`
        button.parentNode.appendChild(modalSignos)
    }

    const closeModalSignos = (button) => {
        button.parentNode.parentNode.remove();
    }

    const actualizarSignos = () => {
        event.preventDefault();

        const id = 1;
        const pressure_mm = $("#presionArterialMM").val();
        const pressure_hg = $("#presionArterialHG").val();
        const heart_rate = $("#frecuenciaCardiaca").val();
        const breath_frequency = $("#frecuenciaRespiratoria").val();
        const temperature = $("#temperatura").val();
        const o2_saturation = $("#saturacion").val();
        const capillary = $("#glicemia").val();

        $.ajax({
            url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=update_binacle_vital_signs",
            data: {
                id,
                pressure_mm,
                pressure_hg,
                heart_rate,
                breath_frequency,
                temperature,
                o2_saturation,
                capillary
            },
            success: function(res){
                alert("Información guardada con éxito");
                location.reload();
            }
        });

    }
</script>
