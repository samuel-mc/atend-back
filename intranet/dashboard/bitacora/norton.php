<main class="main">
    <section class="main__content" id="main">
        
        <?php include "botones.php"; ?>

        <h1>Norton</h1>

        <table class="main__table">
            <thead>
                <tr>
                    <th>Hora</th>
                    <th>Edo. Mental</th>
                    <th>Actividad</th>
                    <th>Movilidad</th>
                    <th>Incont</th>
                    <th>Edo. Gen</th>
                    <th>Zona</th>
                    <th>Tratamiento</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 8; $i < 12; $i++) : ?>
                    <tr>
                        <td><?php echo $i; ?>:00 am</td>
                        <td>Confuso</td>
                        <td>Sentado</td>
                        <td>Muy limitada</td>
                        <td>Urinaria</td>
                        <td>Malo</td>
                        <td>Cóxis</td>
                        <td>10 = Alto riesgo</td>
                        <td>
                            <i class="fa-solid fa-pen-to-square"></i>
                        </td>
                    </tr>
                <?php endfor; ?>

                <?php for ($i = 12; $i < 23; $i++) : ?>
                    <tr>
                        <td><?php echo $i; ?>:00 pm</td>
                        <td>Confuso</td>
                        <td>Sentado</td>
                        <td>Muy limitada</td>
                        <td>Urinaria</td>
                        <td>Malo</td>
                        <td>Cóxis</td>
                        <td>10 = Alto riesgo</td>
                        <td>
                            <i class="fa-solid fa-pen-to-square"></i>
                        </td>
                    </tr>
                <?php endfor; ?>

            </tbody>
        </table>
    </section>
</main>