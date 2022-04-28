<main class="main">
    <section class="main__content" id="main">
        
        <?php include "botones.php"; ?>

        <h1>Perímetros</h1>

        <table class="main__table">
            <thead>
                <tr>
                    <th>Hora</th>
                    <th>Ubicación</th>
                    <th>Perímetro</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 8; $i < 12; $i++) : ?>
                    <tr>
                        <td><?php echo $i; ?>:00 am</td>
                        <td>Abdomen</td>
                        <td>60 cm</td>
                        <td>
                            <i class="fa-solid fa-pen-to-square"></i>
                        </td>
                    </tr>
                <?php endfor; ?>

                <?php for ($i = 12; $i < 23; $i++) : ?>
                    <tr>
                        <td><?php echo $i; ?>:00 pm</td>
                        <td>Abdomen</td>
                        <td>60 cm</td>
                        <td>
                            <i class="fa-solid fa-pen-to-square"></i>
                        </td>
                    </tr>
                <?php endfor; ?>

            </tbody>
        </table>
    </section>
</main>