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
                <?php foreach ($data as $d) : ?>
                    <tr>
                        <td><?php echo explode(" ",$d['timestamp'])[1]; ?></td>
                        <td><?php echo $d['state_of_mind']; ?></td>
                        <td><?php echo $d['activity']; ?></td>
                        <td><?php echo $d['movility']; ?></td>
                        <td><?php echo $d['incontinence']; ?></td>
                        <td><?php echo $d['general_status']; ?></td>
                        <td><?php echo $d['affected_zone']; ?></td>
                        <td><?php echo $d['norton_scale']; ?></td>
                        <td>
                            <i class="fa-solid fa-pen-to-square"></i>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</main>