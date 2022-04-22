<?php echo (isset($isEnfermera)
    ? ''
    : '<aside class="main__aside">
        <a href="'.__ROOT__.'">
            <h1 class="header__tittle"> Atend </h1>
        </a>
        <nav>
            <a
                class="button--aside '.(isset($asideActive)?" disable":" active").' "
                href="'.__ROOT__.'/"
            >
                Servicios
            </a>
            <a
                class="button--aside '.(isset($asideActive)?'active':'disable') .' "
                href="'.__ROOT__.'/prestadoras"
            >
                Enfermeras
            </a>
        </nav>
    </aside>'
    )
?>