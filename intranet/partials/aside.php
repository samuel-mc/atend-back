<?php if (!isset($isEnfermera) && !$isClienteSideBar){ ?>
    <aside class="main__aside">
            <a href="<?php echo __ROOT__; ?>">
                <h1 class="header__tittle"> Atend </h1>
            </a>
            <nav>
                <?php if (isset($asideActive) && $asideActive == 'cliente'){ ?>
                    <a class="button--aside <?php echo (isset($asideActive) && $asideActive=='dashboard' ? 'active' : 'disable'); ?>" href="#">
                        Dashboard
                    </a>
                <?php }else{ ?>
                    <a class="button--aside <?php echo (isset($asideActive) && $asideActive=='servicios' ? 'active' : ''); ?>" href="<?php echo __ROOT__; ?>">
                        Servicios
                    </a>
                    <a class="button--aside <?php echo (isset($asideActive) && $asideActive=='clientes' ? 'active' : ''); ?>" href="<?php echo __ROOT__; ?>/clientes">
                        Clientes
                    </a>
                    <a class="button--aside <?php echo (isset($asideActive) && $asideActive=='enfermeras' ? 'active' : ''); ?>" href="<?php echo __ROOT__; ?>/prestadoras">
                        Enfermeras
                    </a>
                <?php } ?>
            </nav>
        </aside>
<?php } ?>

<?php if (isset($isClienteSideBar)){ ?>
    <aside class="main__aside">
            <a href="<?php echo __ROOT__; ?>">
                <h1 class="header__tittle"> Atend </h1>
            </a>
            <nav>
                <a class="button--aside active">
                    Dashboard
                </a>
            </nav>
        </aside>
<?php } ?>