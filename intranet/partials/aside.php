<aside class="main__aside">
    <a href="<?php echo __ROOT__; ?>">
        <h1 class="header__tittle"> Atend </h1>
    </a>
    <nav>
        <a 
            class='button--aside <?php echo  (isset($asideActive)?'disable':'active')?>'
            href="<?php echo __ROOT__; ?>/"
        >
            servicios
        </a>
        <a 
            class='button--aside <?php echo  (isset($asideActive)?'active':'disable')?>'
            href="<?php echo __ROOT__; ?>/prestadoras"
        >
            enfermeras
        </a>
    </nav>
</aside>