<div class="main__header--enfermera">
    <h1><?php echo $servicio['patient']['name']; ?></h1>    
    <h2><?php echo explode(" ",$servicio['date'])[0]; ?> | <?php echo $servicio['schedule']; ?> (<?php echo $servicio['duration']; ?>)</h2>

</div>
<main class="main__content main__enfermera--acciones">
    <h1>Acciones del Servicio</h1>
    <ul>
        <li>
            <a 
                class="button button--primary" 
                href="<?php echo __ROOT__; ?>/enfermera/ingresosYEgresos/<?php echo $servicio['id'] ?>">
                Ingresos / Egresos
            </a>
        </li>
        <li>
            <a class="button button--primary" href="<?php echo __ROOT__; ?>/enfermera/signosVitales/<?php echo $servicio['id'] ?>">
                Signos Vitales
            </a>
        </li>
        <li>
            <a class="button button--primary" href="<?php echo __ROOT__; ?>/enfermera/movilizaciones">
                Movilizaciones
            </a>
        </li>
        <li>
            <a class="button button--primary" href="<?php echo __ROOT__; ?>/enfermera/apoyoRespiratorio">
                Apoyo Respiratorio
            </a>
        </li>
        <li>
            <a class="button button--primary" href="<?php echo __ROOT__; ?>/enfermera/escalas">
                Escalas
            </a>
        </li>
        <li>
            <a class="button button--primary" href="<?php echo __ROOT__; ?>/enfermera/medicamentos">
                Medicamentos
            </a>
        </li>
    </ul>
</main>
<footer class="enfermera__footer">
    <div>
        <a href="">
            <i class="fa-solid fa-phone"></i>
        </a>
        <a href="">
            <i class="fa-solid fa-circle-info"></i>
        </a>
    </div>
    <div>
        <a
            class="button button--primary"
            href="<?php echo __ROOT__; ?>/enfermera/terminar"
        >
            Terminar Servicio
        </a>
    </div>
</footer>

<main class="side__menu hidden" id="sideMenuEnfermera">
    <div class="side__menu--top">
        <button class="button button--transparent" id="buttonCloseSideMenu">
            <i class="fa-solid fa-x"></i>
        </button>
    </div>
    <div class="side__menu--content">
        <ul>
            <li><a href="">Ver bitácora</a></li>
            <li><a href="">Ver plan de cuidado</a></li>
        </ul>
    </div>
</main>



<script>
    const servicio = <?php echo json_encode($servicio); ?>;
    console.log("servicio", servicio);

    const sideMenuEnfermera = document.getElementById('sideMenuEnfermera');
    const buttonSideMenu = document.getElementById('buttonSideMenu');
    buttonSideMenu.addEventListener('click', () => {
        sideMenuEnfermera.classList.remove('hidden');
        console.log('click');
    });
    const buttonCloseSideMenu = document.getElementById('buttonCloseSideMenu');
    buttonCloseSideMenu.addEventListener('click', () => {
        sideMenuEnfermera.classList.add('hidden');
        console.log('click');
    });
</script>