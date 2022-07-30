<main class="main">
    <section class="main__content" id="main">
      
        <?php include "botones.php"; ?>


        <table class="main__table" id="tablaBitacora">
            <thead>
                <tr>
                    <th>Hora</th>
                    <th>Nombre Gen</th>
                    <th>Dósis</th>
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
                            <i class="fa-solid fa-pen-to-square"></i>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</main>