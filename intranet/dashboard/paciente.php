<main class="main">
    <div>
        <section class="main__content main__add--cotainer">
            <header class="main__header--servicios">
                <h1>Información del paciente</h1>
                <button class="button button--primary button--filter" id="buttonFiltrar">
                    <i class="fa-solid fa-filter"></i>
                        Filtrar
                    <i class="fa-solid fa-chevron-down"></i>
                </button>
            </header>
            <div>
                <form action="" class="form__info-paciente">
                    <div>
                        <div class="form__field">
                            <label for="nombrePaciente">Nombre del paciente </label>
                            <input type="text" value="María Pérez Prieto" name="nombrePaciente" id="nombrePaciente">
                        </div>

                        <div class="form__field form__field--doble">
                            <div>
                                <label for="apellidosCliente">Fecha de Nacimmiento</label>
                                <input type="date">
                            </div>

                            <div>
                                <label for="sexo">Sexo</label>
                                <select name="sexo" id="sexo">
                                    <option value="femenino">Femenino</option>
                                    <option value="masculino">Masculino</option>
                                </select>
                            </div>
                        </div>

                        <div class="form__field form__field--doble">
                            <div>
                                <label for="peso">Peso</label>
                                <input type="text" value="92 kg" name="peso" id="peso">
                            </div>

                            <div>
                                <label for="estatura">Estatura</label>
                                <input type="text" value="170 cm" name="estatura" id="estatura">
                            </div>
                        </div>

                        <div class="form__field">
                            <label for="calle">Calle </label>
                            <input type="text" value="Río Rhín" name="calle" id="calle">
                        </div>

                        <div class="form__field form__field--doble">
                            <div>
                                <label for="numeroExterior">Número Ext</label>
                                <input type="number" value="1609" name="numeroExterior" id="numeroExterior">
                            </div>

                            <div>
                                <label for="numeroInterion">Número Int</label>
                                <input type="number" value="12" name="numeroInterion" id="numeroInterion">
                            </div>
                        </div>

                        <div class="form__field form__field--doble">
                            <div>
                                <label for="colonia">Colonia</label>
                                <input type="text" value="Cuauhtémoc" name="colonia" id="colonia">
                            </div>

                            <div>
                                <label for="delegacion">Delegación</label>
                                <input type="number" value="Cuauhtémoc" name="delegacion" id="delegacion">
                            </div>
                        </div>

                        <div class="form__field form__field--doble">
                            <div>
                                <label for="codigoPostal">CP</label>
                                <input type="number" value="06500" name="codigoPostal" id="codigoPostal">
                            </div>

                            <div>
                                <label for="estado">Estado</label>
                                <input type="text" value="CDMX" name="estado" id="estado">
                            </div>
                        </div>

                        <div class="form__field">
                            <label for="pais">País </label>
                            <input type="text" value="México" name="pais" id="pais">
                        </div>

                        <div class="form__field">
                            <label for="medicoTratante">Médico Tratante </label>
                            <input type="text" value="Mauricio López" name="medicoTratante" id="medicoTratante">
                        </div>

                        <div class="form__field">
                            <label for="contactoDeEmergencia">Contacto de Emergencia </label>
                            <input type="text" value="Laura Hernández" name="contactoDeEmergencia" id="contactoDeEmergencia">
                        </div>

                        <div class="form__field form__field--doble">
                            <div>
                                <label for="telEmergencia1">Tel emergencia 1</label>
                                <input type="tel" value="5530473340" name="telEmergencia1" id="telEmergencia1">
                            </div>

                            <div>
                                <label for="telEmergencia2">Tel emergencia 2</label>
                                <input type="tel" value="5539609402" name="telEmergencia2" id="telEmergencia2">
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="form__field">
                            <label for="diagnostico">Diagnóstico</label>
                            <input type="text" name="diagnostico" id="diagnostico">
                        </div>
                        <div class="form__field">
                            <label for="comentario">Comentarios</label>
                            <input type="text" name="comentario" id="comentario">
                        </div>
                        <div class="form__field">
                            <label for="alergia">Alergías</label>
                            <input type="text" name="alergia" id="alergia">
                        </div>
                        <div class="form__field">
                            <label for="ordenMedica">Orden Médica</label>
                            <input type="text" name="ordenMedica" id="ordenMedica">
                        </div>
                        <div class="form__field">
                            <label for="reanimacion">Reanimación </label>
                            <label for="requiere" class="form--checkbox">El paciente quiere reanimación
                                <input type="checkbox">
                            </label>
                        </div>
                    </div>

                    <div>
                        <div class="form__field">
                            <label for="padecimientos">Padecimientos</label>
                            <select name="padecimientos" id="padecimientos">
                                <option value="">Seleccionar Padecimientos</option>
                                <option value="1">Padecimiento 1</option>
                                <option value="2">Padecimiento 2</option>
                                <option value="3">Padecimiento 3</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </section>

        <section class="main__content">
            <header class="main__header--servicios">
                <h2>Servicios Activos</h2>
            </header>

            <table class="main__table">
                <thead>
                    <tr>
                        <th>Servicio</th>
                        <th>Duración</th>
                        <th>Horario</th>
                        <th>Días de Servicio</th>
                        <th>Inicio</th>
                        <th>Fin</th>
                        <th>Extras</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < 10; $i++) { ?>
                        <tr>
                            <td>Enfermería General</td>
                            <td>12:00:00</td>
                            <td>8:00 – 20:00</td>
                            <td>Lunes – Viernes</td>
                            <td>01.01.2021</td>
                            <td>01.04.2021</td>
                            <td>N/A</td>
                            <td>
                                <a>
                                    <i class="fa-solid fa-pencil"></i>
                                </a>
                            </td>
                            <td>
                                <a>
                                    <i class="fa-solid fa-pencil"></i>
                                </a>
                            </td>
                            <td>
                                <a>
                                    <i class="fa-solid fa-pencil"></i>
                                </a>
                            </td>
                        </tr>
                    <?php }; ?>
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

    </div>
</main>