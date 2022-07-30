<main class="main">
    <section class="main__content" id="main">
       
       <?php include "botones.php"; ?>

        <h1>Glasgow</h1>

        <table class="main__table" id="tablaBitacora">
            <thead>
                <tr>
                    <th>Hora</th>
                    <th>Apertura de ojos</th>
                    <th>Resp Verbal</th>
                    <th>Resp Motora</th>
                    <th>Escala de Glasgow</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $d) : ?>
                    <tr>
                        <td><?php echo explode(" ",$d['timestamp'])[1]; ?></td>
                        <td><?php echo $d['eyes_open']; ?></td>
                        <td><?php echo $d['verbal_response']; ?></td>
                        <td><?php echo $d['motor_response']; ?></td>
                        <td><?php echo $d['glasgow_scale']; ?></td>
                        <td>
                            <i class="fa-solid fa-pen-to-square"></i>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</main>