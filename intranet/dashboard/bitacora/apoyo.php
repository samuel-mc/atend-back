<main class="main">
    <section class="main__content" id="main">
        
        <?php include "botones.php"; ?>

        <table class="main__table">
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
                            <i class="fa-solid fa-pen-to-square"></i>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</main>