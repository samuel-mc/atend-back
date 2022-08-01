<main class="main">
    <section class="main__content" id="main">
        <header class="main__header--servicios">
            <section>
                <h2>Servicios</h2>
                <a href="<?php echo __ROOT__; ?>/prestadoras/active" class="button button--primary <?php echo $type=='active'?'active':''; ?>">Activos</a>
                <a href="<?php echo __ROOT__; ?>/prestadoras/inactive" class="button button--primary <?php echo $type=='inactive'?'active':''; ?>">Inactivos</a>
                <a href="<?php echo __ROOT__; ?>/prestadoras/unsuscribed" class="button button--primary <?php echo $type=='unsuscribed'?'active':''; ?>">Bajas</a>
            </section>

            <section>
                <button class="button button--primary button--filter" id="buttonFiltrar">
                    <i class="fa-solid fa-filter"></i>
                        Filtrar
                    <i class="fa-solid fa-chevron-down"></i>
                </button>
                <button class="button button--circle button--primary">
                    <i class="fa-solid fa-download"></i>
                </button>
            </section>
        </header>

        <table class="main__table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Perfil</th>
                    <th>Perfil Atend</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Zona</th>
                    <th>Disponibilidad</th>
                    <th>Servicio</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($providers as $pro): ?> 
                    <tr>
                        <td><?php echo $pro['id']; ?><!--<i class="fa-solid fa-circle-info"></i>--></td>
                        <td><?php echo $pro['name']." ".$pro['lastname']; ?></td>
                        <td><?php echo $pro['professional_profile']; ?></td>
                        <td><?php echo $pro['atend_profile']; ?></td>
                        <td><?php echo $pro['email']; ?></td>
                        <td><?php echo $pro['mobile']; ?></td>
                        <td><?php echo $pro['zone']; ?></td>
                        <td><?php echo $pro['availability']==1?"Disponible":"No disponible"; ?></td>
                        <td>No</td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

        <footer class="main__footer">
            <div class="footer__progress--number">
                1 de 16
            </div>
            <div class="footer__progress--buttons">
                <button class="button--transparent">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M224 480c-8.188 0-16.38-3.125-22.62-9.375l-192-192c-12.5-12.5-12.5-32.75 0-45.25l192-192c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25L77.25 256l169.4 169.4c12.5 12.5 12.5 32.75 0 45.25C240.4 476.9 232.2 480 224 480z"/></svg>
                </button>

                <button class="button--transparent">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M96 480c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L242.8 256L73.38 86.63c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l192 192c12.5 12.5 12.5 32.75 0 45.25l-192 192C112.4 476.9 104.2 480 96 480z"/></svg>
                </button>
            </div>
        </footer>
    </section>
</main>
<!-- <script src="<?php echo __ROOT__; ?>/intranet/assets/js/index.js"></script> -->