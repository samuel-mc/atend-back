<main class="main">
    <section class="main__content" id="main">
       
        <?php include "botones.php"; ?>

        <h1>Evaluación y reevaluación del dolor</h1>

        <table class="main__table">
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
                <?php for ($i = 8; $i < 12; $i++) : ?>
                    <tr>
                        <td><?php echo $i; ?>:00 am</td>
                        <td>4</td>
                        <td>Moderado</td>
                        <td>Dolor Moderado</td>
                        <td>Opresivo</td>
                        <td>Físico</td>
                        <td>
                            <i class="fa-solid fa-pen-to-square"></i>
                        </td>
                    </tr>
                <?php endfor; ?>

                <?php for ($i = 12; $i < 23; $i++) : ?>
                    <tr>
                        <td><?php echo $i; ?>:00 pm</td>
                        <td>4</td>
                        <td>Moderado</td>
                        <td>Dolor Moderado</td>
                        <td>Opresivo</td>
                        <td>Físico</td>
                        <td>
                            <i class="fa-solid fa-pen-to-square"></i>
                        </td>
                    </tr>
                <?php endfor; ?>

            </tbody>
        </table>
    </section>
</main>