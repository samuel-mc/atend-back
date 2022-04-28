<main class="main">
    <section class="main__content" id="main">
       
        <?php include "botones.php"; ?>

        <h1>Pupilar</h1>

        <table class="main__table">
            <thead>
                <tr>
                    <th>Hora</th>
                    <th>Izquierda</th>
                    <th>Derecha</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 8; $i < 12; $i++) : ?>
                    <tr>
                        <td><?php echo $i; ?>:00 am</td>
                        <td>2</td>
                        <td>4</td>
                        <td>
                            <i class="fa-solid fa-pen-to-square"></i>
                        </td>
                    </tr>
                <?php endfor; ?>

                <?php for ($i = 12; $i < 23; $i++) : ?>
                    <tr>
                        <td><?php echo $i; ?>:00 pm</td>
                        <td>2</td>
                        <td>4</td>
                        <td>
                            <i class="fa-solid fa-pen-to-square"></i>
                        </td>
                    </tr>
                <?php endfor; ?>

            </tbody>
        </table>
    </section>
</main>