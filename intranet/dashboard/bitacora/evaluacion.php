<main class="main">
    <section class="main__content" id="main">
       
        <?php include "botones.php"; ?>

        <h1>Evaluación y reevaluación del dolor</h1>

        <table class="main__table" id="tablaBitacora">
            <thead>
                <tr>
                    <th>Hora</th>
                    <th>EVA/ENA</th>
                    <th>EVERA</th>
                    <th>Conductual</th>
                    <th>Tipo de Dolor</th>
                    <th>Tratamiento</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($data as $d) : ?>
                    <tr>
                        <td><?php echo explode(" ",$d['timestamp'])[1]; ?></td>
                        <td><?php echo $d['ena_eva']; ?></td>
                        <td><?php echo $d['evera']; ?></td>
                        <td><?php echo $d['conductual']; ?></td>
                        <td><?php echo $d['pain']; ?></td>
                        <td><?php echo $d['treatment']; ?></td>
                        <td>
                            <i class="fa-solid fa-pen-to-square"></i>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </section>
</main>