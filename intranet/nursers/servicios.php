<div class="main__header--enfermera">
    <h1><?php echo $service['patient']['name']; ?></h1>    
    <h2><?php echo explode(" ",$service['date'])[0]; ?> | <?php echo $service['schedule']; ?> (<?php echo $service['duration']; ?>)</h2>
</div>

<!-- Inicia: Menu Principal -->
<div id="serviceMain">
    <main class="main__content main__enfermera--acciones" >
        <h1>Acciones del Servicio</h1>
        <ul>
            <li>
                <button
                    class="button button--primary button--enfermeras" 
                    onclick="changeMenu('io')"
                >
                    Ingresos / Egresos
                </button>
            </li>
            <li>
                <button 
                    class="button button--primary button--enfermeras" 
                    onclick="changeMenu('signs')"
                >
                    Signos Vitales
                </button>
            </li>
            <li>
                <button 
                    class="button button--primary button--enfermeras" 
                    onclick="changeMenu('mov')"
                >
                    Movilizaciones
                </button>
            </li>
            <li>
                <button 
                    class="button button--primary button--enfermeras" 
                    onclick="changeMenu('help')"
                >
                    Apoyo Respiratorio
                </button>
            </li>
            <li>
                <button
                    class="button button--primary button--enfermeras" 
                    onclick="changeMenu('scales')"
                >
                    Escalas
                </button>
            </li>
            <li>
                <button 
                    class="button button--primary button--enfermeras" 
                    onclick="changeMenu('drugs')"
                >
                    Medicamentos
                </button>
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
            <button
                class="button button--primary"
                onclick="changeMenu('end')"
            >
                Terminar Servicio
            </button>
        </div>
    </footer>
</div>
<!-- Termina: Menu Principal -->

<!-- Inicia: Menu Lateral -->
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
<!-- Termina: Menu Lateral -->

<!-- Inicia: Menu Relacionado a Ingresos - Egresos -->
<main class="main__ingresos" id="serviceIO">
    <section class="ingresos__header">
        <button
            class="button button--transparent"
            onclick="changeMenu('main')"
        >
            <i class="fa-solid fa-angle-left"></i>
        </button>
        <h2>Ingresos / Egresos</h2>
    </section>

    <section class="ingresos__body">
        <form name="formIngresosEgresos" id="formIngresosEgresos" class="form__info-paciente" onsubmit="handleSubmitIO(event)">
            <div>
                <div class="form__field form__field--doble">
                    <div class="field__radio">
                        <label for="ingreso">Ingreso</label>
                        <input type="radio" name="ingresoEgreso" id="ingreso" value="ingreso" checked>
                    </div>
                    <div class="field__radio">
                        <label for="egreso">Egreso</label>
                        <input type="radio" name="ingresoEgreso" id="egreso" value="egreso">
                    </div>
                </div>

                <div class="form__field" id="fieldTipoIngreso">
                    <label for="tipoIngreso" id="labelTipodeIngreso">Tipo de ingreso</label>
                    <select name="tipoIngreso" id="tipoIngreso">
                        <option value="">Seleccione una opción</option>
                        <!-- 
                        <option value="2">Líquidos orales</option>
                        <option value="3">Dieta</option>
                        <option value="4">Diuresis</option> -->
                        <?php foreach ($ioTypes as $type) { ?>
                            <option value="<?php echo $type['id']; ?>"><?php echo $type['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form__field" id="solucion">
                    <label for="fieldSolucion">Solución</label>
                    <select name="fieldSolucion" id="fieldSolucion">
                        <option value="">Seleccione una opción</option>
                        <option value="CVC">CVC</option>
                        <option value="Otra">Otra</option>
                    </select>
                </div>
                
                <div class="form__field">
                    <label for="cantidad">Cantidad</label>
                    <input type="number" id="cantidad" name="cantidad">
                </div>

                <div>
                    <input type="submit" class="button button--primary button--submit" value="Confirmar">
                </div>

            </div>
        </form>
    </section>
</main>
<!-- Termina: Menu Relacionado a Ingresos - Egresos -->

<!-- Inicia: Menu Relacionado a signos vitales -->
<main class="main__ingresos" id="serviceSigns">
    <section class="ingresos__header">
        <button
            class="button button--transparent"
            onclick="changeMenu('main')"
        >
            <i class="fa-solid fa-angle-left"></i>
        </button>
        <h2>Signos vitales</h2>
    </section>

    <section class="ingresos__body">
        <form id="formSignosVitales" onsubmit="handleSignosVitales(event)">
            <div>
                <div class="form__field form__field--doble">
                    <div>
                        <label for="presionArterialMM">Presión arterial</label>
                        <input type="number" placeholder="mm" id="presionArterialMM" name="presionArterialMM">
                    </div>
                    <div>
                        <label for="presionArterialHG">.</label>
                        <input type="number" placeholder="hg" id="presionArterialHG" name="presionArterialHG">
                    </div>
                </div>
                <div class="form__field">
                    <label for="frecuenciaCardiaca">Frecuencia cardiaca</label>
                    <input type="number" placeholder="ppm" id="frecuenciaCardiaca" name="frecuenciaCardiaca">
                </div>
                <div class="form__field">
                    <label for="frecuenciaRespiratoria">Frecuencia respiratoria</label>
                    <input type="number" placeholder="rpm" id="frecuenciaRespiratoria" name="frecuenciaRespiratoria">
                </div>
                <div class="form__field">
                    <label for="temperatura">Temperatura</label>
                    <input type="number" placeholder="°C" id="temperatura" name="temperatura">
                </div>
                <div class="form__field">
                    <label for="saturacion">Saturación O2</label>
                    <input type="number" placeholder="%" id="saturacion" name="saturacion">
                </div>
                <div class="form__field">
                    <label for="glicemia">Glicemia capilar (sólo diabéticos)</label>
                    <input type="text" placeholder=" | " id="glicemia" name="glicemia">
                </div>

                <div>
                    <input type="submit" class="button button--primary button--submit" value="Confirmar">
                </div>

            </div>
        </form>
    </section>
</main>
<!-- Termina: Menu Relacionado a signos vitales  -->

<!-- Inicia: Menu Relacionado a movilizacion -->
<main class="main__ingresos" id="serviceMov">
    <section class="ingresos__header">
        <button
            class="button button--transparent"
            onclick="changeMenu('main')"
        >
            <i class="fa-solid fa-angle-left"></i>
        </button>
        <h2>Movilizaciones</h2>
    </section>

    <section class="ingresos__body">
        <form onsubmit="handleMovilizacion(event)">
            <div class="form__field">
                <label for="tipoMovilizacion">Tipo de movilización</label>
                <select name="tipoMovilizacion" id="tipoMovilizacion">
                    <option value="">Seleccione uno</option>
                    <?php foreach ($movTypes as $mov) { ?>
                        <option value="<?php echo $mov['id']; ?>"><?php echo $mov['name']; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div>
                <input type="submit" class="button button--primary button--submit" value="Confirmar">
            </div>
        </form>
    </section>
</main>
<!-- Termina: Menu Relacionado a movilizacion -->

<!-- Inicia: Menu Relacionado a apoyo respiratorio -->
<main class="main__ingresos" id="serviceHelp">
    <section class="ingresos__header">
        <button
            class="button button--transparent"
            onclick="changeMenu('main')"
        >
            <i class="fa-solid fa-angle-left"></i>
        </button>
        <h2>Apoyo Respiratorio</h2>
    </section>

    <section class="ingresos__body">
        <form onsubmit="handleSubmitHelp(event)">
            <div class="form__field">
                <label for="tipoApoyoResp">Tipo de apoyo</label>
                <select name="tipoApoyoResp" id="tipoApoyoResp">
                    <option value="">Seleccione una opción</option>
                    <?php foreach ($breathTypes as $type) { ?>
                        <option value="<?php echo $type['id']; ?>"><?php echo $type['name']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form__field">
                <label for="litrosPorHora">Litros por hora</label>
                <input type="number" name="litrosPorHora" id="litrosPorHora">
            </div>

            <div>
                <input type="submit" class="button button--primary button--submit" value="Confirmar">
            </div>
        </form>
    </section>
</main>
<!-- Termina: Menu Relacionado a apoyo respiratorio -->

<!-- Inicia: Menu Relacionado a medicamentos -->
<main class="main__ingresos" id="serviceDrugs">
    <section class="ingresos__header">
        <button
            class="button button--transparent"
            onclick="changeMenu('main')"
        >
            <i class="fa-solid fa-angle-left"></i>
        </button>
        <h2>Medicamentos</h2>
    </section>

    <section class="ingresos__body">
        <form onsubmit="handleSubmitDrugs(event)">
            <div class="form__field">
                <label for="nombreGenerico">Nombre genérico del medicamento</label>
                <input type="text" name="nombreGenerico" id="nombreGenerico" placeholder="Nombre genérico del medicamento">
            </div>
            <div class="form__field">
                <label for="dosis">Dósis</label>
                <input type="number" name="dosis" id="dosis" placeholder="ml">
            </div>
            <div class="form__field">
                <label for="via">Vía</label>
                <select name="via" id="via">
                    <option value="">Seleccione una opción</option>
                    <?php foreach ($drugWays as $type) { ?>
                        <option value="<?php echo $type['id']; ?>"><?php echo $type['name']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form__field">
                <label for="frecuencia">Frecuencia</label>
                <select name="frecuencia" id="frecuencia">
                    <option value="">Seleccione una opción</option>
                    <option value="2 hrs">2 hrs</option>
                    <option value="8 hrs">8 hrs</option>
                    <option value="12 hrs">12 hrs</option>
                </select>
            </div>
            <div class="form__field">
                <label for="observaciones">Observaciones</label>
                <input type="text" name="observaciones" id="observaciones" placeholder="Observaciones">
            </div>

            <div>
                <input type="submit" class="button button--primary button--submit" value="Confirmar">
            </div>
        </form>
    </section>
</main>
<!-- Termina: Menu Relacionado a medicamentos -->

<!-- Inicia: Menu Relacionado a escalas -->
<main class="main__ingresos" id="serviceScales">
    <section class="ingresos__header">
        <button
            class="button button--transparent"
            onclick="changeMenu('main')"
        >
            <i class="fa-solid fa-angle-left"></i>
        </button>
        <h2>Escalas</h2>
    </section>

    <section class="ingresos__body">
        <form onsubmit="handleSubmitScales(event)">
            <div class="form__field">
                <label for="tipodeEscala">Tipo de escala</label>
                <select name="tipodeEscala" id="tipodeEscala">
                    <option value="1" selected>Evaluación y reevaluación del dolor</option>
                    <option value="2">Pupilar</option>
                    <option value="3">Glasgow</option>
                    <option value="4">Perímetros</option>
                    <option value="5">Norton</option>
                </select>
            </div>

            <div id="formEvaluacion">
                <div class="form__field">
                    <label for="enaEva">ENA / EVA</label>
                    <input type="number" name="enaEva" id="enaEva" placeholder="ENA / EVA">
                </div>

                <div class="form__field">
                    <label for="evera">EVERA</label>
                    <input type="text" name="evera" id="evera" placeholder="EVERA">
                </div>

                <div class="form__field">
                    <label for="conductual">Conductual</label>
                    <div class="conductual__fields">
                        <div>
                            <label for="sinDolor">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7 9C7.19779 9 7.39113 8.94135 7.55557 8.83147C7.72002 8.72159 7.8482 8.56541 7.92388 8.38268C7.99957 8.19996 8.01937 7.99889 7.98079 7.80491C7.9422 7.61093 7.84696 7.43275 7.70711 7.29289C7.56726 7.15304 7.38908 7.0578 7.19509 7.01921C7.00111 6.98063 6.80005 7.00043 6.61732 7.07612C6.43459 7.15181 6.27842 7.27998 6.16853 7.44443C6.05865 7.60888 6 7.80222 6 8C6 8.26522 6.10536 8.51957 6.2929 8.70711C6.48043 8.89464 6.73479 9 7 9ZM10 0C8.02219 0 6.08879 0.58649 4.4443 1.6853C2.79981 2.78412 1.51809 4.3459 0.761209 6.17317C0.00433284 8.00043 -0.193701 10.0111 0.192152 11.9509C0.578004 13.8907 1.53041 15.6725 2.92894 17.0711C4.32746 18.4696 6.10929 19.422 8.0491 19.8079C9.98891 20.1937 11.9996 19.9957 13.8268 19.2388C15.6541 18.4819 17.2159 17.2002 18.3147 15.5557C19.4135 13.9112 20 11.9778 20 10C20 8.68678 19.7413 7.38642 19.2388 6.17317C18.7363 4.95991 17.9997 3.85752 17.0711 2.92893C16.1425 2.00035 15.0401 1.26375 13.8268 0.761205C12.6136 0.258658 11.3132 0 10 0ZM10 18C8.41775 18 6.87104 17.5308 5.55544 16.6518C4.23985 15.7727 3.21447 14.5233 2.60897 13.0615C2.00347 11.5997 1.84504 9.99113 2.15372 8.43928C2.4624 6.88743 3.22433 5.46197 4.34315 4.34315C5.46197 3.22433 6.88743 2.4624 8.43928 2.15372C9.99113 1.84504 11.5997 2.00346 13.0615 2.60896C14.5233 3.21447 15.7727 4.23984 16.6518 5.55544C17.5308 6.87103 18 8.41775 18 10C18 12.1217 17.1572 14.1566 15.6569 15.6569C14.1566 17.1571 12.1217 18 10 18ZM13 11H7C6.73479 11 6.48043 11.1054 6.2929 11.2929C6.10536 11.4804 6 11.7348 6 12C6 13.0609 6.42143 14.0783 7.17158 14.8284C7.92172 15.5786 8.93914 16 10 16C11.0609 16 12.0783 15.5786 12.8284 14.8284C13.5786 14.0783 14 13.0609 14 12C14 11.7348 13.8946 11.4804 13.7071 11.2929C13.5196 11.1054 13.2652 11 13 11ZM10 14C9.64928 13.9996 9.30481 13.9071 9.00117 13.7315C8.69752 13.556 8.44537 13.3037 8.27001 13H11.73C11.5546 13.3037 11.3025 13.556 10.9988 13.7315C10.6952 13.9071 10.3507 13.9996 10 14ZM13 7C12.8022 7 12.6089 7.05865 12.4444 7.16853C12.28 7.27841 12.1518 7.43459 12.0761 7.61732C12.0004 7.80004 11.9806 8.00111 12.0192 8.19509C12.0578 8.38907 12.153 8.56725 12.2929 8.70711C12.4328 8.84696 12.6109 8.9422 12.8049 8.98079C12.9989 9.01937 13.2 8.99957 13.3827 8.92388C13.5654 8.84819 13.7216 8.72002 13.8315 8.55557C13.9414 8.39112 14 8.19778 14 8C14 7.73478 13.8946 7.48043 13.7071 7.29289C13.5196 7.10536 13.2652 7 13 7Z" fill="#23D736"/>
                                </svg>
                                Sin dolor
                            </label>
                            <input type="radio" name="conductual" id="sinDolor" value="1">
                        </div>
                        <div>
                            <label for="dolorLeve">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.36 12.23C11.6915 12.769 10.8587 13.0629 10 13.0629C9.14131 13.0629 8.30849 12.769 7.64 12.23C7.43579 12.0603 7.17251 11.9786 6.90808 12.003C6.64365 12.0274 6.39974 12.1558 6.23 12.36C6.06027 12.5642 5.9786 12.8275 6.00298 13.0919C6.02736 13.3563 6.15579 13.6003 6.36 13.77C7.38134 14.6226 8.66957 15.0896 10 15.0896C11.3304 15.0896 12.6187 14.6226 13.64 13.77C13.8442 13.6003 13.9726 13.3563 13.997 13.0919C14.0214 12.8275 13.9397 12.5642 13.77 12.36C13.686 12.2589 13.5828 12.1753 13.4665 12.1141C13.3501 12.0528 13.2229 12.0151 13.0919 12.003C12.8275 11.9786 12.5642 12.0603 12.36 12.23ZM8.5 8C8.5 7.70333 8.41203 7.41332 8.24721 7.16665C8.08239 6.91997 7.84812 6.72771 7.57403 6.61418C7.29994 6.50065 6.99834 6.47094 6.70737 6.52882C6.4164 6.5867 6.14912 6.72956 5.93934 6.93934C5.72957 7.14912 5.5867 7.41639 5.52883 7.70736C5.47095 7.99834 5.50065 8.29994 5.61418 8.57403C5.72772 8.84811 5.91998 9.08238 6.16665 9.2472C6.41332 9.41203 6.70333 9.5 7 9.5C7.39783 9.5 7.77936 9.34196 8.06067 9.06066C8.34197 8.77936 8.5 8.39782 8.5 8ZM13 7H12C11.7348 7 11.4804 7.10536 11.2929 7.29289C11.1054 7.48043 11 7.73478 11 8C11 8.26522 11.1054 8.51957 11.2929 8.70711C11.4804 8.89464 11.7348 9 12 9H13C13.2652 9 13.5196 8.89464 13.7071 8.70711C13.8946 8.51957 14 8.26522 14 8C14 7.73478 13.8946 7.48043 13.7071 7.29289C13.5196 7.10536 13.2652 7 13 7ZM10 0C8.02219 0 6.08879 0.58649 4.4443 1.6853C2.79981 2.78412 1.51809 4.3459 0.761209 6.17317C0.00433284 8.00043 -0.193701 10.0111 0.192152 11.9509C0.578004 13.8907 1.53041 15.6725 2.92894 17.0711C4.32746 18.4696 6.10929 19.422 8.0491 19.8079C9.98891 20.1937 11.9996 19.9957 13.8268 19.2388C15.6541 18.4819 17.2159 17.2002 18.3147 15.5557C19.4135 13.9112 20 11.9778 20 10C20 8.68678 19.7413 7.38642 19.2388 6.17317C18.7363 4.95991 17.9997 3.85752 17.0711 2.92893C16.1425 2.00035 15.0401 1.26375 13.8268 0.761205C12.6136 0.258658 11.3132 0 10 0ZM10 18C8.41775 18 6.87104 17.5308 5.55544 16.6518C4.23985 15.7727 3.21447 14.5233 2.60897 13.0615C2.00347 11.5997 1.84504 9.99113 2.15372 8.43928C2.4624 6.88743 3.22433 5.46197 4.34315 4.34315C5.46197 3.22433 6.88743 2.4624 8.43928 2.15372C9.99113 1.84504 11.5997 2.00346 13.0615 2.60896C14.5233 3.21447 15.7727 4.23984 16.6518 5.55544C17.5308 6.87103 18 8.41775 18 10C18 12.1217 17.1572 14.1566 15.6569 15.6569C14.1566 17.1571 12.1217 18 10 18Z" fill="#A0E85C"/>
                                </svg>
                                Dolor leve
                            </label>
                            <input type="radio" name="conductual" id="dolorLeve" value="2">
                        </div>
                        <div>
                            <label for="dolorModerado">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7 9H8C8.26522 9 8.51958 8.89464 8.70711 8.70711C8.89465 8.51957 9 8.26522 9 8C9 7.73478 8.89465 7.48043 8.70711 7.29289C8.51958 7.10536 8.26522 7 8 7H7C6.73479 7 6.48043 7.10536 6.2929 7.29289C6.10536 7.48043 6 7.73478 6 8C6 8.26522 6.10536 8.51957 6.2929 8.70711C6.48043 8.89464 6.73479 9 7 9ZM13 12H7C6.73479 12 6.48043 12.1054 6.2929 12.2929C6.10536 12.4804 6 12.7348 6 13C6 13.2652 6.10536 13.5196 6.2929 13.7071C6.48043 13.8946 6.73479 14 7 14H13C13.2652 14 13.5196 13.8946 13.7071 13.7071C13.8946 13.5196 14 13.2652 14 13C14 12.7348 13.8946 12.4804 13.7071 12.2929C13.5196 12.1054 13.2652 12 13 12ZM13 7H12C11.7348 7 11.4804 7.10536 11.2929 7.29289C11.1054 7.48043 11 7.73478 11 8C11 8.26522 11.1054 8.51957 11.2929 8.70711C11.4804 8.89464 11.7348 9 12 9H13C13.2652 9 13.5196 8.89464 13.7071 8.70711C13.8946 8.51957 14 8.26522 14 8C14 7.73478 13.8946 7.48043 13.7071 7.29289C13.5196 7.10536 13.2652 7 13 7ZM10 0C8.02219 0 6.08879 0.58649 4.4443 1.6853C2.79981 2.78412 1.51809 4.3459 0.761209 6.17317C0.00433284 8.00043 -0.193701 10.0111 0.192152 11.9509C0.578004 13.8907 1.53041 15.6725 2.92894 17.0711C4.32746 18.4696 6.10929 19.422 8.0491 19.8079C9.98891 20.1937 11.9996 19.9957 13.8268 19.2388C15.6541 18.4819 17.2159 17.2002 18.3147 15.5557C19.4135 13.9112 20 11.9778 20 10C20 8.68678 19.7413 7.38642 19.2388 6.17317C18.7363 4.95991 17.9997 3.85752 17.0711 2.92893C16.1425 2.00035 15.0401 1.26375 13.8268 0.761205C12.6136 0.258658 11.3132 0 10 0ZM10 18C8.41775 18 6.87104 17.5308 5.55544 16.6518C4.23985 15.7727 3.21447 14.5233 2.60897 13.0615C2.00347 11.5997 1.84504 9.99113 2.15372 8.43928C2.4624 6.88743 3.22433 5.46197 4.34315 4.34315C5.46197 3.22433 6.88743 2.4624 8.43928 2.15372C9.99113 1.84504 11.5997 2.00346 13.0615 2.60896C14.5233 3.21447 15.7727 4.23984 16.6518 5.55544C17.5308 6.87103 18 8.41775 18 10C18 12.1217 17.1572 14.1566 15.6569 15.6569C14.1566 17.1571 12.1217 18 10 18Z" fill="#F9E924"/>
                            </svg>
                            Dolor moderado</label>
                            <input type="radio" name="conductual" id="dolorModerado" value="3">
                        </div>
                        <div>
                            <label for="dolorIntenso">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7 7C6.80222 7 6.60888 7.05865 6.44443 7.16853C6.27998 7.27841 6.15181 7.43459 6.07612 7.61732C6.00044 7.80004 5.98063 8.00111 6.01922 8.19509C6.0578 8.38907 6.15305 8.56725 6.2929 8.70711C6.43275 8.84696 6.61093 8.9422 6.80491 8.98079C6.9989 9.01937 7.19996 8.99957 7.38269 8.92388C7.56541 8.84819 7.72159 8.72002 7.83147 8.55557C7.94136 8.39112 8 8.19778 8 8C8 7.73478 7.89465 7.48043 7.70711 7.29289C7.51957 7.10536 7.26522 7 7 7ZM12.66 11.56L8.47001 13.06C8.2498 13.1399 8.06462 13.2945 7.94677 13.497C7.82893 13.6994 7.78589 13.9368 7.82517 14.1678C7.86446 14.3987 7.98356 14.6085 8.16172 14.7606C8.33987 14.9127 8.56577 14.9974 8.8 15C8.91596 14.9999 9.03101 14.9796 9.14001 14.94L13.34 13.44C13.467 13.3981 13.5842 13.3312 13.6849 13.2431C13.7855 13.1551 13.8675 13.0478 13.926 12.9276C13.9844 12.8073 14.0182 12.6766 14.0252 12.5431C14.0323 12.4095 14.0125 12.276 13.967 12.1502C13.9215 12.0245 13.8513 11.9092 13.7604 11.8111C13.6696 11.7129 13.56 11.634 13.4382 11.579C13.3163 11.524 13.1847 11.4939 13.051 11.4907C12.9174 11.4874 12.7844 11.511 12.66 11.56ZM13 7C12.8022 7 12.6089 7.05865 12.4444 7.16853C12.28 7.27841 12.1518 7.43459 12.0761 7.61732C12.0004 7.80004 11.9806 8.00111 12.0192 8.19509C12.0578 8.38907 12.153 8.56725 12.2929 8.70711C12.4328 8.84696 12.6109 8.9422 12.8049 8.98079C12.9989 9.01937 13.2 8.99957 13.3827 8.92388C13.5654 8.84819 13.7216 8.72002 13.8315 8.55557C13.9414 8.39112 14 8.19778 14 8C14 7.73478 13.8946 7.48043 13.7071 7.29289C13.5196 7.10536 13.2652 7 13 7ZM10 0C8.02219 0 6.08879 0.58649 4.4443 1.6853C2.79981 2.78412 1.51809 4.3459 0.761209 6.17317C0.00433284 8.00043 -0.193701 10.0111 0.192152 11.9509C0.578004 13.8907 1.53041 15.6725 2.92894 17.0711C4.32746 18.4696 6.10929 19.422 8.0491 19.8079C9.98891 20.1937 11.9996 19.9957 13.8268 19.2388C15.6541 18.4819 17.2159 17.2002 18.3147 15.5557C19.4135 13.9112 20 11.9778 20 10C20 8.68678 19.7413 7.38642 19.2388 6.17317C18.7363 4.95991 17.9997 3.85752 17.0711 2.92893C16.1425 2.00035 15.0401 1.26375 13.8268 0.761205C12.6136 0.258658 11.3132 0 10 0ZM10 18C8.41775 18 6.87104 17.5308 5.55544 16.6518C4.23985 15.7727 3.21447 14.5233 2.60897 13.0615C2.00347 11.5997 1.84504 9.99113 2.15372 8.43928C2.4624 6.88743 3.22433 5.46197 4.34315 4.34315C5.46197 3.22433 6.88743 2.4624 8.43928 2.15372C9.99113 1.84504 11.5997 2.00346 13.0615 2.60896C14.5233 3.21447 15.7727 4.23984 16.6518 5.55544C17.5308 6.87103 18 8.41775 18 10C18 12.1217 17.1572 14.1566 15.6569 15.6569C14.1566 17.1571 12.1217 18 10 18Z" fill="#F6AA01"/>
                                </svg>
                                Dolor intenso
                            </label>
                            <input type="radio" name="conductual" id="dolorIntenso" value="4">
                        </div>
                        <div>
                            <label for="dolorMuyIntenso">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6.36 13.33C6.15844 13.4993 6.03176 13.7412 6.00742 14.0033C5.98308 14.2654 6.06306 14.5265 6.23 14.73C6.31395 14.8313 6.41705 14.915 6.5334 14.9763C6.64975 15.0377 6.77706 15.0755 6.90803 15.0875C7.03901 15.0996 7.17108 15.0857 7.29669 15.0467C7.42229 15.0076 7.53896 14.9442 7.64 14.86C8.30849 14.321 9.14131 14.0271 10 14.0271C10.8587 14.0271 11.6915 14.321 12.36 14.86C12.5399 15.0091 12.7664 15.0905 13 15.09C13.2036 15.088 13.4017 15.0239 13.5679 14.9063C13.734 14.7887 13.8604 14.6231 13.9299 14.4318C13.9995 14.2405 14.009 14.0325 13.9572 13.8356C13.9054 13.6387 13.7947 13.4623 13.64 13.33C12.6081 12.5006 11.3239 12.0484 10 12.0484C8.67609 12.0484 7.39188 12.5006 6.36 13.33ZM7.21 8.54C7.39737 8.72625 7.65082 8.83079 7.915 8.83079C8.17919 8.83079 8.43264 8.72625 8.62 8.54C8.80626 8.35264 8.9108 8.09919 8.9108 7.835C8.9108 7.57081 8.80626 7.31736 8.62 7.13C8.04773 6.58699 7.2889 6.28428 6.5 6.28428C5.71111 6.28428 4.95228 6.58699 4.38 7.13C4.27532 7.21965 4.1903 7.32997 4.13028 7.45403C4.07026 7.57809 4.03653 7.71323 4.03121 7.85095C4.02589 7.98867 4.04909 8.126 4.09937 8.25432C4.14964 8.38265 4.2259 8.4992 4.32335 8.59665C4.42081 8.69411 4.53736 8.77036 4.66568 8.82064C4.79401 8.87091 4.93134 8.89412 5.06906 8.8888C5.20678 8.88348 5.34191 8.84975 5.46597 8.78973C5.59004 8.7297 5.70036 8.64468 5.79 8.54C5.88297 8.44627 5.99357 8.37188 6.11543 8.32111C6.23729 8.27034 6.36799 8.2442 6.5 8.2442C6.63202 8.2442 6.76272 8.27034 6.88458 8.32111C7.00644 8.37188 7.11704 8.44627 7.21 8.54ZM10 0C8.02219 0 6.08879 0.58649 4.4443 1.6853C2.79981 2.78412 1.51809 4.3459 0.761209 6.17317C0.00433284 8.00043 -0.193701 10.0111 0.192152 11.9509C0.578004 13.8907 1.53041 15.6725 2.92894 17.0711C4.32746 18.4696 6.10929 19.422 8.0491 19.8079C9.98891 20.1937 11.9996 19.9957 13.8268 19.2388C15.6541 18.4819 17.2159 17.2002 18.3147 15.5557C19.4135 13.9112 20 11.9778 20 10C20 8.68678 19.7413 7.38642 19.2388 6.17317C18.7363 4.95991 17.9997 3.85752 17.0711 2.92893C16.1425 2.00035 15.0401 1.26375 13.8268 0.761205C12.6136 0.258658 11.3132 0 10 0ZM10 18C8.41775 18 6.87104 17.5308 5.55544 16.6518C4.23985 15.7727 3.21447 14.5233 2.60897 13.0615C2.00347 11.5997 1.84504 9.99113 2.15372 8.43928C2.4624 6.88743 3.22433 5.46197 4.34315 4.34315C5.46197 3.22433 6.88743 2.4624 8.43928 2.15372C9.99113 1.84504 11.5997 2.00346 13.0615 2.60896C14.5233 3.21447 15.7727 4.23984 16.6518 5.55544C17.5308 6.87103 18 8.41775 18 10C18 12.1217 17.1572 14.1566 15.6569 15.6569C14.1566 17.1571 12.1217 18 10 18ZM15.62 7.13C15.0477 6.58699 14.2889 6.28428 13.5 6.28428C12.7111 6.28428 11.9523 6.58699 11.38 7.13C11.2162 7.3213 11.1306 7.56738 11.1403 7.81905C11.15 8.07073 11.2543 8.30947 11.4324 8.48756C11.6105 8.66566 11.8493 8.76999 12.101 8.77971C12.3526 8.78943 12.5987 8.70383 12.79 8.54C12.883 8.44627 12.9936 8.37188 13.1154 8.32111C13.2373 8.27034 13.368 8.2442 13.5 8.2442C13.632 8.2442 13.7627 8.27034 13.8846 8.32111C14.0064 8.37188 14.117 8.44627 14.21 8.54C14.3974 8.72625 14.6508 8.83079 14.915 8.83079C15.1792 8.83079 15.4326 8.72625 15.62 8.54C15.8063 8.35264 15.9108 8.09919 15.9108 7.835C15.9108 7.57081 15.8063 7.31736 15.62 7.13Z" fill="#FF8A16"/>
                                </svg>
                                Dolor muy intenso
                            </label>
                            <input type="radio" name="conductual" id="dolorMuyIntenso" value="5">
                        </div>
                        <div>
                            <label for="dolorInsoportable">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.08 10.21L8.58 8.71C8.67373 8.61704 8.74813 8.50644 8.7989 8.38458C8.84966 8.26272 8.8758 8.13201 8.8758 8C8.8758 7.86799 8.84966 7.73728 8.7989 7.61542C8.74813 7.49356 8.67373 7.38296 8.58 7.29L7.08 5.79C6.8917 5.6017 6.63631 5.49591 6.37 5.49591C6.1037 5.49591 5.84831 5.6017 5.66 5.79C5.4717 5.9783 5.36591 6.2337 5.36591 6.5C5.36591 6.7663 5.4717 7.0217 5.66 7.21L6.46 8L5.66 8.79C5.56628 8.88296 5.49188 8.99356 5.44111 9.11542C5.39034 9.23728 5.36421 9.36799 5.36421 9.5C5.36421 9.63201 5.39034 9.76272 5.44111 9.88458C5.49188 10.0064 5.56628 10.117 5.66 10.21C5.75344 10.3027 5.86426 10.376 5.9861 10.4258C6.10794 10.4755 6.2384 10.5008 6.37 10.5C6.50161 10.5008 6.63207 10.4755 6.75391 10.4258C6.87575 10.376 6.98656 10.3027 7.08 10.21ZM6.36 13.33C6.15844 13.4993 6.03176 13.7412 6.00742 14.0033C5.98308 14.2654 6.06306 14.5265 6.23 14.73C6.31395 14.8313 6.41705 14.915 6.5334 14.9763C6.64975 15.0377 6.77706 15.0755 6.90803 15.0875C7.03901 15.0996 7.17108 15.0857 7.29669 15.0467C7.42229 15.0076 7.53896 14.9442 7.64 14.86C8.30849 14.321 9.14131 14.0271 10 14.0271C10.8587 14.0271 11.6915 14.321 12.36 14.86C12.4611 14.9442 12.5777 15.0076 12.7033 15.0467C12.8289 15.0857 12.961 15.0996 13.092 15.0875C13.223 15.0755 13.3503 15.0377 13.4666 14.9763C13.583 14.915 13.6861 14.8313 13.77 14.73C13.9369 14.5265 14.0169 14.2654 13.9926 14.0033C13.9683 13.7412 13.8416 13.4993 13.64 13.33C12.6081 12.5006 11.3239 12.0484 10 12.0484C8.67609 12.0484 7.39188 12.5006 6.36 13.33ZM14.58 5.79C14.487 5.69627 14.3764 5.62188 14.2546 5.57111C14.1327 5.52034 14.002 5.4942 13.87 5.4942C13.738 5.4942 13.6073 5.52034 13.4854 5.57111C13.3636 5.62188 13.253 5.69627 13.16 5.79L11.66 7.29C11.5663 7.38296 11.4919 7.49356 11.4411 7.61542C11.3903 7.73728 11.3642 7.86799 11.3642 8C11.3642 8.13201 11.3903 8.26272 11.4411 8.38458C11.4919 8.50644 11.5663 8.61704 11.66 8.71L13.16 10.21C13.2534 10.3027 13.3643 10.376 13.4861 10.4258C13.6079 10.4755 13.7384 10.5008 13.87 10.5C14.0016 10.5008 14.1321 10.4755 14.2539 10.4258C14.3757 10.376 14.4866 10.3027 14.58 10.21C14.6737 10.117 14.7481 10.0064 14.7989 9.88458C14.8497 9.76272 14.8758 9.63201 14.8758 9.5C14.8758 9.36799 14.8497 9.23728 14.7989 9.11542C14.7481 8.99356 14.6737 8.88296 14.58 8.79L13.79 8L14.58 7.21C14.6737 7.11704 14.7481 7.00644 14.7989 6.88458C14.8497 6.76272 14.8758 6.63201 14.8758 6.5C14.8758 6.36799 14.8497 6.23728 14.7989 6.11542C14.7481 5.99356 14.6737 5.88296 14.58 5.79ZM10 0C8.02219 0 6.08879 0.58649 4.4443 1.6853C2.79981 2.78412 1.51809 4.3459 0.761209 6.17317C0.00433284 8.00043 -0.193701 10.0111 0.192152 11.9509C0.578004 13.8907 1.53041 15.6725 2.92894 17.0711C4.32746 18.4696 6.10929 19.422 8.0491 19.8079C9.98891 20.1937 11.9996 19.9957 13.8268 19.2388C15.6541 18.4819 17.2159 17.2002 18.3147 15.5557C19.4135 13.9112 20 11.9778 20 10C20 8.68678 19.7413 7.38642 19.2388 6.17317C18.7363 4.95991 17.9997 3.85752 17.0711 2.92893C16.1425 2.00035 15.0401 1.26375 13.8268 0.761205C12.6136 0.258658 11.3132 0 10 0ZM10 18C8.41775 18 6.87104 17.5308 5.55544 16.6518C4.23985 15.7727 3.21447 14.5233 2.60897 13.0615C2.00347 11.5997 1.84504 9.99113 2.15372 8.43928C2.4624 6.88743 3.22433 5.46197 4.34315 4.34315C5.46197 3.22433 6.88743 2.4624 8.43928 2.15372C9.99113 1.84504 11.5997 2.00346 13.0615 2.60896C14.5233 3.21447 15.7727 4.23984 16.6518 5.55544C17.5308 6.87103 18 8.41775 18 10C18 12.1217 17.1572 14.1566 15.6569 15.6569C14.1566 17.1571 12.1217 18 10 18Z" fill="#FF3626"/>
                                </svg>
                                Dolor insoportable
                            </label>
                            <input type="radio" name="conductual" id="dolorInsoportable" value="6">
                        </div>
                    </div>
                </div>               

                <div class="form__field">
                    <label for="tipoDeDolor">Tipo de dolor</label>
                    <select name="tipoDeDolor" id="tipoDeDolor">
                        <option value="1">Opresivo</option>
                        <option value="2">Otro</option>
                    </select>
                </div>
                <div class="form__field">
                    <label for="tratamiento">Tratamiento</label>
                    <select name="tratamiento" id="tratamiento" onchange="handleMedicamentosEscalas(event)">
                        <option value="1">Físico</option>
                        <option value="2">Químico</option>
                    </select>
                </div>
                <div id="formMedicamentoEscalas">
                    <div class="form__field">
                        <label for="nombreGenericoTr">Nombre genérico del medicamento</label>
                        <input type="text" name="nombreGenericoTr" id="nombreGenericoTr" placeholder="Nombre genérico del medicamento">
                    </div>
                    <div class="form__field">
                        <label for="dosisTr">Dósis</label>
                        <input type="number" name="dosisTr" id="dosisTr" placeholder="ml">
                    </div>
                    <div class="form__field">
                        <label for="viaTr">Vía</label>
                        <select name="viaTr" id="viaTr">
                            <option value="">Seleccione una opción</option>
                            <?php foreach ($drugWays as $type) { ?>
                                <option value="<?php echo $type['id']; ?>"><?php echo $type['name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form__field">
                        <label for="frecuenciaTr">Frecuencia</label>
                        <select name="frecuenciaTr" id="frecuenciaTr">
                            <option value="">Seleccione una opción</option>
                            <option value="2 hrs">2 hrs</option>
                            <option value="8 hrs">8 hrs</option>
                            <option value="12 hrs">12 hrs</option>
                        </select>
                    </div>
                    <div class="form__field">
                        <label for="observacionesTr">Observaciones</label>
                        <input type="text" name="observacionesTr" id="observacionesTr" placeholder="Observaciones">
                    </div>
                </div>
            </div>
            
            <div id="formPupilar">
                <div class="form__field">
                    <label for="pupilarIzquierda">Izquierda (0 – 10)</label>
                    <input type="number" name="pupilarIzquierda" id="pupilarIzquierda" placeholder="0" min="0" max="10">
                </div>
                
                <div class="form__field">
                    <label for="pupilarDerecha">Derecha (0 – 10)</label>
                    <input type="number" name="pupilarDerecha" id="pupilarDerecha" placeholder="0" min="0" max="10">
                </div>
            </div>

            <div id="formGlasgow">
                <div class="form__field">
                    <label for="aperturaDeOjos">Apertura de ojos</label>
                    <select name="aperturaDeOjos" id="aperturaDeOjos">
                        <option value="">Seleccione una opción</option>
                        <?php foreach ($catEyes as $type) { ?>
                            <option value="<?php echo $type['id']; ?>"><?php echo $type['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form__field">
                    <label for="respuestaVerbal">Respuesta verbal</label>
                    <select name="respuestaVerbal" id="respuestaVerbal">
                        <option value="">Seleccione una opción</option>
                        <?php foreach ($verbalRes as $type) { ?>
                            <option value="<?php echo $type['id']; ?>"><?php echo $type['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form__field">
                    <label for="respuestaMotora">Respuesta motora</label>
                    <select name="respuestaMotora" id="respuestaMotora">
                        <option value="">Seleccione una opción</option>
                        <?php foreach ($motorRes as $type) { ?>
                            <option value="<?php echo $type['id']; ?>"><?php echo $type['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form__field">
                    <label for="escalaDeGlaslow">Escala de Glaslow</label>
                    <input type="text" name="escalaDeGlaslow" id="escalaDeGlaslow" placeholder="10 = Estupor profundo">
                </div>
            </div>

            <div id="formPerimetros">
                <div class="form__field">
                    <label for="ubicacion">Ubicación</label>
                    <select name="ubicacion" id="ubicacion">
                        <option value="">Seleccione una opción</option>
                        <?php foreach ($locations as $type) { ?>
                            <option value="<?php echo $type['id']; ?>"><?php echo $type['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form__field">
                    <label for="perimetro">Perímetro</label>
                    <input type="text" name="perimetro" id="perimetro" placeholder="cm">
                </div>
            </div>
            
            <div id="formNorton">
                <div class="form__field">
                    <label for="estadoMental">Estado mental</label>
                    <select name="estadoMental" id="estadoMental">
                        <option value="">Seleccione una opción</option>
                        <?php foreach ($stateMinds as $type) { ?>
                            <option value="<?php echo $type['id']; ?>"><?php echo $type['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form__field">
                    <label for="actividad">Actividad</label>
                    <select name="actividad" id="actividad">
                        <option value="1">Sentado</option>
                        <option value="2">Otro</option>
                    </select>
                </div>
                <div class="form__field">
                    <label for="movilidad">Movilidad</label>
                    <select name="movilidad" id="movilidad">
                        <option value="">Seleccione una opción</option>
                        <?php foreach ($movilities as $type) { ?>
                            <option value="<?php echo $type['id']; ?>"><?php echo $type['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form__field">
                    <label for="incontiencia">Incontiencia</label>
                    <select name="incontiencia" id="incontiencia">
                        <option value="">Seleccione una opción</option>
                        <?php foreach ($incontinences as $type) { ?>
                            <option value="<?php echo $type['id']; ?>"><?php echo $type['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form__field">
                    <label for="estadoGeneral">Estado general</label>
                    <select name="estadoGeneral" id="estadoGeneral">
                        <option value="">Seleccione una opción</option>
                        <?php foreach ($generalStatus as $type) { ?>
                            <option value="<?php echo $type['id']; ?>"><?php echo $type['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form__field">
                    <label for="zonaAfectada">Zona afectada</label>
                    <select name="zonaAfectada" id="zonaAfectada">
                        <option value="">Seleccione una opción</option>
                        <?php foreach ($affectedZones as $type) { ?>
                            <option value="<?php echo $type['id']; ?>"><?php echo $type['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form__field">
                    <label for="escalaDeNorton">Escala de Norton</label>
                    <input type="text" name="escalaDeNorton" id="escalaDeNorton" placeholder="10 = Alto riesgo" min="0" max="10">
                </div>
            </div>

            <div>
                <input type="submit" class="button button--primary button--submit" value="Confirmar">
            </div>
        </form>
    </section>
</main>
<!-- Termina: Menu Relacionado a escalas -->

<!-- Inicia: Menu Relacionado a terminar -->
<main class="main__ingresos" id="serviceEnd" onsubmit="handleEndService(event)">
    <section class="ingresos__body">
        <form>
            <div class="form__field">
                <label for="notaDeEnfermeria">Nota de enfermería</label>
                <textarea name="notaDeEnfermeria" id="notaDeEnfermeria" cols="30" rows="10"></textarea>
            </div>
            <div class="form__field">
                <label for="riesgoDeCaida">Riesgo de caída (opcional)</label>
                <select name="riesgoDeCaida" id="riesgoDeCaida">
                    <option value="1">Otro</option>
                    <option value="2">Otro</option>
                </select>
            </div>
            <div class="form__field">
                <label for="valoracion">Valoración</label>
                <input type="text" name="valoracion" id="valoracion">
            </div>

            <div>
                <input type="submit" class="button button--primary button--submit" value="Confirmar">
            </div>
        </form>
    </section>
</main>
<!-- Termina: Menu Relacionado a terminar -->


<script> // Script para manejar el side bar
    const servicio = <?php echo json_encode($service); ?>;
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

<script> // Script para manejar el cambio de menu
    const serviceMain = document.getElementById('serviceMain');
    const serviceIO = document.getElementById('serviceIO');
    const serviceSigns = document.getElementById('serviceSigns');
    const serviceMov = document.getElementById('serviceMov');
    const serviceHelp = document.getElementById('serviceHelp');
    const serviceDrugs = document.getElementById('serviceDrugs');
    const serviceScales = document.getElementById('serviceScales');
    const serviceEnd = document.getElementById('serviceEnd');

    const options = [ 
        serviceMain, 
        serviceIO, 
        serviceSigns, 
        serviceMov, 
        serviceHelp, 
        serviceDrugs, 
        serviceScales, 
        serviceEnd
    ];

    const changeMenu = (optionSelected) => {
        options.forEach(option => {
            option.style.display = 'none';
        })
        switch (optionSelected) {
            case 'main':
                serviceMain.style.display = 'block';
                break;
            case 'io':
                console.log("fuie io");
                serviceIO.style.display = 'block';
                break;
            case 'signs':
                serviceSigns.style.display = 'block';
                break;
            case 'mov':
                serviceMov.style.display = 'block';
                break;
            case 'help':
                serviceHelp.style.display = 'block';
                break;
            case 'drugs':
                serviceDrugs.style.display = 'block';
                break;
            case 'scales':
                serviceScales.style.display = 'block';
                break;
            case 'end':
                serviceEnd.style.display = 'block';
                break;
        }
    }

    changeMenu('main');
</script>

<script> // Script para cambiar los inputs de ingresos - egresos
    const fieldSolucion = document.getElementById('fieldSolucion');
    const tipoIngreso = document.getElementById('tipoIngreso');
    tipoIngreso.addEventListener('change', (e) => {
        if (e.target.value == 1) {
            fieldSolucion.style.display = 'block';
        } else {
            fieldSolucion.style.display = 'none';
        }
    });

    const labelTipodeIngreso = document.getElementById('labelTipodeIngreso');
    const radioItems = document.formIngresosEgresos.ingresoEgreso;
    radioItems.forEach(radioItem => {
        radioItem.addEventListener('change', (e) => {
            if (e.target.value === 'ingreso') {
                labelTipodeIngreso.innerHTML = 'Tipo de ingreso';
            } else {
                labelTipodeIngreso.innerHTML = 'Tipo de egreso';
            }
        });
    });

</script>

<script> // Script para manejar el main de escalas
    const formEvaluacion = document.getElementById('formEvaluacion');
    const formPupilar = document.getElementById('formPupilar');
    formPupilar.style.display = 'none';
    const formGlasgow = document.getElementById('formGlasgow');
    formGlasgow.style.display = 'none';
    const formPerimetros = document.getElementById('formPerimetros');
    formPerimetros.style.display = 'none';
    const formNorton = document.getElementById('formNorton');
    formNorton.style.display = 'none';

    const tipodeEscala = document.getElementById('tipodeEscala');
    tipodeEscala.addEventListener('change', (e) => {
        if (e.target.value == 1) {
            formEvaluacion.style.display = 'block';
        } else {
            formEvaluacion.style.display = 'none';
        }
        if (e.target.value == 2) {
            formPupilar.style.display = 'block';
        } else {
            formPupilar.style.display = 'none';
        }
        if (e.target.value == 3) {
            formGlasgow.style.display = 'block';
        } else {
            formGlasgow.style.display = 'none';
        }
        if (e.target.value == 4) {
            formPerimetros.style.display = 'block';
        } else {
            formPerimetros.style.display = 'none';
        }
        if (e.target.value == 5) {
            formNorton.style.display = 'block';
        } else {
            formNorton.style.display = 'none';
        }
    });
</script>

<script> //Script para guardar la informacion de ingresos - egresos
    const handleSubmitIO = (event) => {
        event.preventDefault();

        const binnacle_id = 1;
        const category_id = $("#ingreso").is(":checked") ? 1 : 2;
        const type_id = $("#tipoIngreso").val();
        let solution = $("#fieldSolucion").val();
        const quantity = $("#cantidad").val();

        if (type_id !== 1) { solution = 'NA'; }

        if (
            category_id === '' ||
            type_id === '' ||
            solution === ''
        ) {
            window.alert("Falta información.");
            return;
        }

        $.ajax({
            url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=save_new_binnacle_io",
            data: {
                binnacle_id,
                category_id,
                type_id,
                solution,
                quantity,
            },
            success: function(res){
                alert("Información guardada con éxito");
                changeMenu('main');
            }
        });
    }
</script>

<script> //Script para guardar la información de signos vitales
    const handleSignosVitales = (event) => {
        event.preventDefault();
        const binnacle_id = 1;
        const pressure_mm = $("#presionArterialMM").val();
        const pressure_hg = $("#presionArterialHG").val();
        const heart_rate = $("#frecuenciaCardiaca").val();
        const breath_frequency = $("#frecuenciaRespiratoria").val();
        const temperature = $("#temperatura").val();
        const o2_saturation = $("#saturacion").val();
        const capillary = $("#glicemia").val();

         if (
            binnacle_id === '' ||
            pressure_mm === '' ||
            pressure_hg === '' ||
            heart_rate === '' ||
            breath_frequency === '' ||
            temperature === '' ||
            o2_saturation === '' ||
            capillary === ''
        ) {
            window.alert("Falta información.");
            return;
        }

        $.ajax({
            url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=save_new_binnacle_vital_signs",
            data: {
                binnacle_id,
                pressure_mm,
                pressure_hg,
                heart_rate,
                breath_frequency,
                temperature,
                o2_saturation,
                capillary,
            },
            success: function(res){
                alert("Información guardada con éxito");
                changeMenu('main');
            }
        });
    }
</script>

<script> // Script para guardar la información de movilidad
    const handleMovilizacion = (event) => {
        event.preventDefault();
        const binnacle_id = 1;
        const type_id = $("#tipoMovilizacion").val();

        if ( type_id === '' ) {
            window.alert("Falta información.");
            return;
        }

        $.ajax({
            url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=save_new_binnacle_mov",
            data: {
                binnacle_id,
                type_id
            },
            success: function(res){
                alert("Información guardada con éxito");
                changeMenu('main');
            }
        });
    }
</script>

<script> // Script para guardar la información de apoyo respiratorio
    const handleSubmitHelp = (event) => {
        event.preventDefault();
        const binnacle_id = 1;
        const type_id = $("#tipoApoyoResp").val();
        const liters_per_hour = $("#litrosPorHora").val();


        if ( type_id === '' || liters_per_hour === '') {
            window.alert("Falta información.");
            return;
        }

        $.ajax({
            url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=save_new_binnacle_help",
            data: {
                binnacle_id,
                type_id,
                liters_per_hour
            },
            success: function(res){
                alert("Información guardada con éxito");
                changeMenu('main');
            }
        });
    }
</script>

<script> // Script para guardar la información de medicamentos
    const handleSubmitDrugs = (event) => {
        event.preventDefault();
        const binnacle_id = 1;
        const name = $("#nombreGenerico").val();
        const dosis = $("#dosis").val();
        const way_id = $("#via").val();
        const frequency = $("#frecuencia").val();
        const observations = $("#observaciones").val();

        if ( 
            name === '' ||
            dosis === '' ||
            way_id === '' ||
            frequency === '' ||
            observations === ''
        ) {
            window.alert("Falta información.");
            return;
        }

        $.ajax({
            url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=save_new_binnacle_drugs",
            data: {
                binnacle_id,
                name,
                dosis,
                way_id,
                frequency,
                observations
            },
            success: function(res){
                alert("Información guardada con éxito");
                changeMenu('main');
            }
        });
    }
</script>

<script> // Script para guardar la información de escalas
    formMedicamentoEscalas.style.display = 'none';

    const handleMedicamentosEscalas = (event) => {
        const formMedicamentoEscalas = document.getElementById('formMedicamentoEscalas');
        if (event.target.value === '2') {
            formMedicamentoEscalas.style.display = 'block'
            console.log('es block');
        } else {
            formMedicamentoEscalas.style.display = 'none';
            console.log('no es block');
        }
    }
    const handleSubmitScales = async (event) => {
        event.preventDefault();
        const tipodeEscala = $('#tipodeEscala').val();
        const binnacle_id = 1;

        // Si la escala es evaluación del dolor
        if (tipodeEscala === '1') {
            const ena_eva = $('#enaEva').val();
            const evera = $('#evera').val();
            const conductual = $("input[type='radio'][name='conductual']:checked").val();
            const pain_type = $('#tipoDeDolor').val();
            const treatment = $('#tratamiento').val();
            let drug_id = 0;

            // Si el tratamiento elegido es quimico, se guarda en la db.
            if (treatment === '2') {
                drug_id = await saveDrug(binnacle_id);
            }

            await $.ajax({
                url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=save_new_scale_pain",
                data: {
                    binnacle_id,
                    ena_eva,
                    evera,
                    conductual,
                    pain_type,
                    treatment,
                    drug_id
                },
                success: function(res){
                    alert("Información guardada con éxito. ");
                    changeMenu('main');
                }
            });
        }

        // Si la escala es pupilar
        if (tipodeEscala === '2') {
            const pupilar_left = $('#pupilarIzquierda').val();
            const pupilar_right = $('#pupilarDerecha').val();

            if ( pupilar_left === '' || pupilar_right === '' ) {
                window.alert("Revisar la información ingresada.");
                return;
            }
            
            await $.ajax({
                url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=save_new_scale_pupilar",
                data: {
                    binnacle_id,
                    pupilar_left,
                    pupilar_right
                },
                success: function(res){
                    alert("Información guardada con éxito. ");
                    changeMenu('main');
                }
            });
        }
       
        // Si la escala es glasgow
        if (tipodeEscala === '3') {
            const eyes_open_id = $('#aperturaDeOjos').val();
            const verbal_response_id = $('#respuestaVerbal').val();
            const motor_response_id = $('#respuestaMotora').val();
            const glasgow_scale = $('#escalaDeGlaslow').val();

            if (
                eyes_open_id === '' ||
                verbal_response_id === '' ||
                motor_response_id === '' ||
                glasgow_scale === ''
            ) {
                window.alert("Revisar la información ingresada.");
                return;
            }

            await $.ajax({
                url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=save_new_scale_glasgow",
                data: {
                    binnacle_id,
                    eyes_open_id,
                    verbal_response_id,
                    motor_response_id,
                    glasgow_scale
                },
                success: function(res){
                    alert("Información guardada con éxito. ");
                    changeMenu('main');
                }
            });
        }

        // Si la escala es perimetros
        if (tipodeEscala === '4') {
            const locution_id = $('#ubicacion').val();
            const perimeter = $('#perimetro').val();

            if (
                locution_id === '' ||
                perimeter === ''
            ) {
                window.alert("Revisar la información ingresada.");
                return;
            }

            await $.ajax({
                url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=save_new_scale_perimeters",
                data: {
                    binnacle_id,
                    locution_id,
                    perimeter
                },
                success: function(res){
                    alert("Información guardada con éxito. ");
                    changeMenu('main');
                }
            });
        }

        // Si la escala es norton
        if (tipodeEscala === '5') {
            const state_of_mind_id = $('#estadoMental').val();
            const activity_id = $('#actividad').val();
            const movility_id = $('#movilidad').val();
            const incontinence_id = $('#incontiencia').val();
            const general_status_id = $('#estadoGeneral').val();
            const affected_zone_id = $('#zonaAfectada').val();
            const norton_scale = $('#escalaDeNorton').val();

            if (
                state_of_mind_id === '' ||
                activity_id === '' ||
                movility_id === '' ||
                incontinence_id === '' ||
                general_status_id === '' ||
                affected_zone_id === '' ||
                norton_scale === ''
            ) {
                window.alert("Revisar la información ingresada.");
                return;
            }

            await $.ajax({
                url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=save_new_scale_norton",
                data: {
                    binnacle_id,
                    state_of_mind_id,
                    activity_id,
                    movility_id,
                    incontinence_id,
                    general_status_id,
                    affected_zone_id,
                    norton_scale
                },
                success: function(res){
                    alert("Información guardada con éxito. ");
                    changeMenu('main');
                }
            });
        }
    }

    //Funcion para obtener la informacion del formulario
    const saveDrug = async (binnacle_id) => {
        const name = $("#nombreGenericoTr").val();
        const dosis = $("#dosisTr").val();
        const way_id = $("#viaTr").val();
        const frequency = $("#frecuenciaTr").val();
        const observations = $("#observacionesTr").val();

        if (
            name === '' ||
            dosis === '' ||
            way_id === '' ||
            frequency === '' ||
            observations === ''
        ) {
            window.alert("Falta información.");
            return;
        }

        const data = {
            binnacle_id,
            name,
            dosis,
            way_id,
            frequency,
            observations
        }
        return await postDrug(data);
    }

    // Información para guardar en la base de datos.
    const postDrug = async (data) => {
        let id;
        await $.ajax({
            url:"<?php echo __ROOT__; ?>/bridge/routes.php?action=save_new_binnacle_drugs",
            data: data,
            success: function(res){
                id = JSON.parse(res).id
            }
        });
        return id;
    }
</script>

<script> // Script para guardar la informacion tras terminar el service
    const handleEndService = (event) => {
        
    }
</script>