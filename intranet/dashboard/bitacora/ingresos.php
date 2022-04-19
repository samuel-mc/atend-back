<main class="main">
    <section class="main__content" id="main">
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
                    <a href="./ingresosYEgresos" class="button button--primary active">Ingresos Y Egresos</a>
                </li>
                <li>
                    <a href="./signosVitales" class="button button--primary">Signos Vitales</a>
                </li>
                <li>
                    <a href="./movilizaciones" class="button button--primary">Movilizaciones</a>
                </li>
                <li>
                    <a href="./apoyoRespiratorio" class="button button--primary">Apoyo Respiratorio</a>
                </li>
                <li class="escalas">
                    <a href="#" class="button button--primary">
                        Escalas <i class="fa-solid fa-angle-down"></i> 
                    </a>
                    <ul class="bitacora__navbar--escalas">
                        <li>
                            <a class="button button--primary" href="./evaluacion">Evaluación y reevaluación del dolor</a>
                        </li>
                        <li>
                            <a class="button button--primary" href="./pupilar">Pupilar</a>
                        </li>
                        <li>
                            <a class="button button--primary" href="./glasgow">Glasgow</a>
                        </li>
                        <li>
                            <a class="button button--primary" href="./perimetros">Perímetros</a>
                        </li>
                        <li>
                            <a class="button button--primary" href="./norton">Norton</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="./medicamentos" class="button button--primary">
                        Medicamentos
                    </a>
                </li>
            </ul>
        </section>


        <table class="main__table">
            <thead>
                <tr>
                    <th>Hora</th>
                    <th>Categoría</th>
                    <th>Tipo</th>
                    <th>Solución</th>
                    <th>Cantidad</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>8:00 am</td>
                    <td>Ingreso</td>
                    <td>Soluciones</td>
                    <td>CVC</td>
                    <td>100 ml</td>
                    <td>
                        <i class="fa-solid fa-pen-to-square"></i>
                    </td>
                </tr>
                <tr>
                    <td>9:00 am</td>
                    <td>Egreso</td>
                    <td>Soluciones</td>
                    <td></td>
                    <td>100 ml</td>
                    <td>
                        <i class="fa-solid fa-pen-to-square"></i>
                    </td>
                </tr>
                <?php for ($i = 10; $i < 12; $i++) : ?>
                    <tr>
                        <td><?php echo $i; ?>:00 am</td>
                        <td>Ingreso</td>
                        <td>Soluciones</td>
                        <td>CVC</td>
                        <td>100 ml</td>
                        <td>
                            <i class="fa-solid fa-pen-to-square"></i>
                        </td>
                    </tr>
                <?php endfor; ?>
                <?php for ($i = 12; $i < 23; $i++) : ?>
                    <tr>
                        <td><?php echo $i; ?>:00 pm</td>
                        <td>Ingreso</td>
                        <td>Soluciones</td>
                        <td>CVC</td>
                        <td>100 ml</td>
                        <td>
                            <i class="fa-solid fa-pen-to-square"></i>
                        </td>
                    </tr>
                <?php endfor; ?>

            </tbody>
        </table>
    </section>
</main>