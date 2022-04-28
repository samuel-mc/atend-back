<?php 
    $r = $_SERVER['REQUEST_URI'];  
    $r = explode("/", $r);
    $r = end($r);
?>

<header class="main__header--servicios">
    <section>
        <h2>Bitácora del 21.03.2021</h2>
    </section>

    <section>
        <button class="button button--primary button--filter" id="buttonFiltrar">
            Descargar Bitácora
            <i class="fa-solid fa-download"></i>
        </button>
        <button class="button button--circle button--primary">
            <i class="fa-solid fa-xmark"></i>
        </button>
    </section>
</header>
<section class="bitacora__navbar">
    <ul>
        <li>
            <a href="./ingresos" class="button button--primary <?php echo $r=='ingresos'?'active':''; ?>">Ingresos Y Egresos</a>
        </li>
        <li>
            <a href="./signos" class="button button--primary <?php echo $r=='signos'?'active':''; ?>">Signos Vitales</a>
        </li>
        <li>
            <a href="./movilizaciones" class="button button--primary <?php echo $r=='movilizaciones'?'active':''; ?>">Movilizaciones</a>
        </li>
        <li>
            <a href="./apoyo" class="button button--primary <?php echo $r=='apoyo'?'active':''; ?>">Apoyo Respiratorio</a>
        </li>
        <li class="escalas">
            <a href="#" class="button button--primary">
                Escalas <i class="fa-solid fa-angle-down"></i> 
            </a>
            <ul class="bitacora__navbar--escalas">
                <li>
                    <a class="button button--primary <?php echo $r=='evaluacion'?'active':''; ?>" href="./evaluacion">Evaluación y reevaluación del dolor</a>
                </li>
                <li>
                    <a class="button button--primary <?php echo $r=='pupilar'?'active':''; ?>" href="./pupilar">Pupilar</a>
                </li>
                <li>
                    <a class="button button--primary <?php echo $r=='glasgow'?'active':''; ?>" href="./glasgow">Glasgow</a>
                </li>
                <li>
                    <a class="button button--primary <?php echo $r=='perimetros'?'active':''; ?>" href="./perimetros">Perímetros</a>
                </li>
                <li>
                    <a class="button button--primary <?php echo $r=='norton'?'active':''; ?>" href="./norton">Norton</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="./medicamentos" class="button button--primary <?php echo $r=='medicamentos'?'active':''; ?>">
                Medicamentos
            </a>
        </li>
    </ul>
</section>