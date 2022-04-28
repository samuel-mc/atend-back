<main class="main">
    <section class="main__content" id="main">
        
        <?php include "botones.php"; ?>

        <table class="main__table">
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
                            <i class="fa-solid fa-pen-to-square"></i>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </section>
</main>