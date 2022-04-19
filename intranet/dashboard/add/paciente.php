<main class="main">
    <div>
        <section class="main__form--top" id="main">
            <div class="main__content">
                <header class="main__header--servicios">
                    <h1>Info del cliente</h1>
                    <button class="button  button--primary button--circle ">
                        <i class="far fa-trash-alt"></i>
                    </button>
                </header>

                <form action="" class="form__info-cliente">
                    <div class="form__field">
                        <label for="tipoDeCliente">Tipo de cliente </label>
                        <label for="empresa" class="form--checkbox">Empresa
                            <input type="checkbox">
                        </label>
                    </div>
                    <div class="form__field">
                        <label for="nombreCliente">Nombre </label>
                        <input type="text" value="Mario">
                    </div>
                    <div class="form__field">
                        <label for="apellidosCliente">Apellido(s) </label>
                        <input type="text" value="Hernández Campuzano">
                    </div>
                    <div class="form__field">
                        <label for="telefonoCliente">Teléfono </label>
                        <input type="number" value="554905849">
                    </div>
                    <div class="form__field">
                        <label for="mailCliente">Mail </label>
                        <input type="mail" value="mariohc@gmail.com">
                    </div>
                    <div class="form__field">
                        <label for="factura">Requiere Factura</label>
                        <select name="" id="">
                            <option value="">Si</option>
                            <option value="">No</option>
                        </select>
                    </div>
                    <div class="form__field">
                        <label for="factura">Comentarios (opcional)</label>
                        <input type="text" value="None">
                    </div>
                </form>
            </div>
            <div class="main__content">
                <header class="main__header--servicios">
                    <h1>Info Financiera</h1>
                </header>

                <form action="" class="form__info-cliente form__doble-column">
                    <div>
                        <div class="form__field">
                            <label for="nombreCliente">Razón social</label>
                            <input type="text" value="Mario Hernández Campuzando">
                        </div>
                        <div class="form__field">
                            <label for="apellidosCliente">Esquema de facturación</label>
                            <select name="" id="">
                                <option value="">Nacional</option>
                                <option value="">Internacional</option>
                            </select>
                        </div>
                        <div class="form__field">
                            <label for="telefonoCliente">RFC</label>
                            <input type="text" value="MDHR349774F">
                        </div>
                        <div class="form__field">
                            <label for="mailCliente">Correo Electrónico</label>
                            <input type="mail" value="mariohc@gmail.com">
                        </div>
                        <div class="form__field">
                            <label for="uso">Uso</label>
                            <select name="" id="">
                                <option value="">Gastos en general</option>
                                <option value="">Otro</option>
                            </select>
                        </div>
                        <div class="form__field">
                            <label for="uso">Régimen de Facturación</label>
                            <select name="" id="">
                                <option value="">Personas morales</option>
                                <option value="">Otro</option>
                            </select>
                        </div>
                        <div class="form__field">
                            <label for="factura">Calle</label>
                            <input type="text" value="Río Rhin">
                        </div>
                    </div>

                    <div>
                        <div class="form__field">
                            <label for="nombreCliente">Razón social</label>
                            <input type="text" value="Mario Hernández Campuzando">
                        </div>
                        <div class="form__field">
                            <label for="apellidosCliente">Esquema de facturación</label>
                            <select name="" id="">
                                <option value="">Nacional</option>
                                <option value="">Internacional</option>
                            </select>
                        </div>
                        <div class="form__field">
                            <label for="telefonoCliente">RFC</label>
                            <input type="text" value="MDHR349774F">
                        </div>
                        <div class="form__field">
                            <label for="mailCliente">Correo Electrónico</label>
                            <input type="mail" value="mariohc@gmail.com">
                        </div>
                        <div class="form__field">
                            <label for="uso">Uso</label>
                            <select name="" id="">
                                <option value="">Gastos en general</option>
                                <option value="">Otro</option>
                            </select>
                        </div>
                        <div class="form__field">
                            <label for="uso">Régimen de Facturación</label>
                            <select name="" id="">
                                <option value="">Personas morales</option>
                                <option value="">Otro</option>
                            </select>
                        </div>
                        <div class="form__field">
                            <label for="factura">Calle</label>
                            <input type="text" value="Río Rhin">
                        </div>
                    </div>
                </form>
            </div>
        </section>

        <section class="main__content main__add--cotainer">
            <header class="main__header--servicios">
                <h1>Info del paciente</h1>
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

        <section class="main__content main__info-servicios">
            <header class="info-servicios__header">
                <div>
                    <h1>Información de Servicio</h1>
                    <h3 id="serviciosResume" class="servicios__header--text">Enfermería Gral. | Oncológico | 12 hrs | 8:00am</h3>
                </div>
                <div>
                    <button class="button button--transparent" id="buttonDisplayServicio">
                        <i class="fa-solid fa-angle-down"></i>
                    </button>
                </div>
            </header>
            <div class="info-servicios__body hidden" id="infoServicio">
                <form action="" class="form__info-paciente">
                    <div>
                        <div class="form__field">
                            <label for="apellidosCliente">Fecha de Inicio</label>
                            <input type="date" value="2020-05-01">
                        </div>

                        <div class="form__field">
                            <label for="apellidosCliente">Fecha de terminación (opcional)</label>
                            <input type="date">
                        </div>

                        <div class="form__field form__field--doble">
                            <div>
                                <label for="sexo">Sexo ECA</label>
                                <select name="sexo" id="sexo">
                                    <option value="femenino">Femenino</option>
                                    <option value="masculino">Masculino</option>
                                </select>
                            </div>
                            <div>
                                <label for="sexo">Tipo de Servcio</label>
                                <select name="tipoDeServicio" id="tipoDeServicio">
                                    <option value="enfermeriaGral">Enfermería Gral.</option>
                                    <option value="otro">Otro</option>
                                </select>
                            </div>
                        </div>

                        <div class="form__field">
                            <label for="tipoDeCuidado">Tipo de Cuidado</label>
                            <select name="tipoDeCuidado" id="tipoDeCuidado">
                                <option value="oncologico">Oncológico</option>
                                <option value="otro">Otro</option>
                            </select>
                        </div>

                        <div class="form__field form__field--doble">
                            <div>
                                <label for="duracion">Duración</label>
                                <input type="text" value="12 horas" name="duracion" id="duracion">
                            </div>

                            <div>
                                <label for="entrada">Entrada</label>
                                <input type="text" value="8:00 am" name="entrada" id="entrada">
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="form__field">
                            <label for="complexion">Complexión</label>
                            <select name="complexion" id="complexion">
                                <option value="indiferente">Indiferente</option>
                                <option value="otro">Otro</option>
                            </select>
                        </div>

                        <div class="form__field">
                            <label for="calParaSeguro">Calificada para seguro</label>
                            <select name="calParaSeguro" id="calParaSeguro">
                                <option value="si">Sí</option>
                                <option value="no">No</option>
                            </select>
                        </div>

                        <div class="form__field">
                            <label for="precioCliente">Precio Cliente</label>
                            <input type="number" value="1950" id="precioCliente" name="precioCliente">
                        </div>

                        <div class="form__field">
                            <label for="precioEca">Precio ECA</label>
                            <input type="number" value="750" id="precioEca" name="precioEca">
                        </div>
                    </div>

                    <div>
                        <div class="form__field">
                            <label for="frecDelServicio">Frecuencia del Servicio</label>
                            <select name="frecDelServicio" id="frecDelServicio">
                                <option value="">Otro</option>
                                <option value="1">Padecimiento 1</option>
                                <option value="2">Padecimiento 2</option>
                                <option value="3">Padecimiento 3</option>
                            </select>
                            <div class="field__checkbox">
                                <input type="checkbox" id="lunes" name="lunes" value="lunes">
                                <label for="lunes"> Lunes</label><br>
                            </div>
                            <div class="field__checkbox">
                                <input type="checkbox" id="martes" name="martes" value="martes">
                                <label for="martes"> Martes </label><br>
                            </div>
                            <div class="field__checkbox">
                                <input type="checkbox" id="miercoles" name="miercoles" value="miercoles">
                                <label for="miercoles"> Miércoles </label><br>
                            </div>
                            <div class="field__checkbox">
                                <input type="checkbox" id="jueves" name="jueves" value="jueves">
                                <label for="jueves"> Jueves </label><br>
                            </div>
                            <div class="field__checkbox">
                                <input type="checkbox" id="viernes" name="viernes" value="viernes">
                                <label for="viernes"> Viernes </label><br>
                            </div>
                            <div class="field__checkbox">
                                <input type="checkbox" id="sabado" name="sabado" value="sabado">
                                <label for="sabado"> Sábado </label><br>
                            </div>
                            <div class="field__checkbox">
                                <input type="checkbox" id="domingo" name="domingo" value="domingo">
                                <label for="domingo"> Domingo </label><br>
                            </div>
                        </div>
                    </divc>
                </form>
            </div>
        </section>

        <section class="main__content main__add--cotainer">
            <header class="main__header--servicios">
                <h1>Información de Servicio</h1>
            </header>
            <div>
                <form action="" class="form__info-paciente">
                    <div>
                        <div class="form__field">
                            <label for="apellidosCliente">Fecha de Inicio</label>
                            <input type="date" value="2020-05-01">
                        </div>

                        <div class="form__field">
                            <label for="apellidosCliente">Fecha de terminación (opcional)</label>
                            <input type="date">
                        </div>

                        <div class="form__field form__field--doble">
                            <div>
                                <label for="sexo">Sexo ECA</label>
                                <select name="sexo" id="sexo">
                                    <option value="femenino">Femenino</option>
                                    <option value="masculino">Masculino</option>
                                </select>
                            </div>
                            <div>
                                <label for="sexo">Tipo de Servcio</label>
                                <select name="tipoDeServicio" id="tipoDeServicio">
                                    <option value="enfermeriaGral">Enfermería Gral.</option>
                                    <option value="otro">Otro</option>
                                </select>
                            </div>
                        </div>

                        <div class="form__field">
                            <label for="tipoDeCuidado">Tipo de Cuidado</label>
                            <select name="tipoDeCuidado" id="tipoDeCuidado">
                                <option value="oncologico">Oncológico</option>
                                <option value="otro">Otro</option>
                            </select>
                        </div>

                        <div class="form__field form__field--doble">
                            <div>
                                <label for="duracion">Duración</label>
                                <input type="text" value="12 horas" name="duracion" id="duracion">
                            </div>

                            <div>
                                <label for="entrada">Entrada</label>
                                <input type="text" value="8:00 am" name="entrada" id="entrada">
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="form__field">
                            <label for="complexion">Complexión</label>
                            <select name="complexion" id="complexion">
                                <option value="indiferente">Indiferente</option>
                                <option value="otro">Otro</option>
                            </select>
                        </div>

                        <div class="form__field">
                            <label for="calParaSeguro">Calificada para seguro</label>
                            <select name="calParaSeguro" id="calParaSeguro">
                                <option value="si">Sí</option>
                                <option value="no">No</option>
                            </select>
                        </div>

                        <div class="form__field">
                            <label for="precioCliente">Precio Cliente</label>
                            <input type="number" value="1950" id="precioCliente" name="precioCliente">
                        </div>

                        <div class="form__field">
                            <label for="precioEca">Precio ECA</label>
                            <input type="number" value="750" id="precioEca" name="precioEca">
                        </div>
                    </div>

                    <div>
                        <div class="form__field">
                            <label for="frecDelServicio">Frecuencia del Servicio</label>
                            <select name="frecDelServicio" id="frecDelServicio">
                                <option value="">Otro</option>
                                <option value="1">Padecimiento 1</option>
                                <option value="2">Padecimiento 2</option>
                                <option value="3">Padecimiento 3</option>
                            </select>
                            <div class="field__checkbox">
                                <input type="checkbox" id="lunes" name="lunes" value="lunes">
                                <label for="lunes"> Lunes</label><br>
                            </div>
                            <div class="field__checkbox">
                                <input type="checkbox" id="martes" name="martes" value="martes">
                                <label for="martes"> Martes </label><br>
                            </div>
                            <div class="field__checkbox">
                                <input type="checkbox" id="miercoles" name="miercoles" value="miercoles">
                                <label for="miercoles"> Miércoles </label><br>
                            </div>
                            <div class="field__checkbox">
                                <input type="checkbox" id="jueves" name="jueves" value="jueves">
                                <label for="jueves"> Jueves </label><br>
                            </div>
                            <div class="field__checkbox">
                                <input type="checkbox" id="viernes" name="viernes" value="viernes">
                                <label for="viernes"> Viernes </label><br>
                            </div>
                            <div class="field__checkbox">
                                <input type="checkbox" id="sabado" name="sabado" value="sabado">
                                <label for="sabado"> Sábado </label><br>
                            </div>
                            <div class="field__checkbox">
                                <input type="checkbox" id="domingo" name="domingo" value="domingo">
                                <label for="domingo"> Domingo </label><br>
                            </div>
                        </div>
                    </divc>
                </form>
            </div>
        </section>

        <section class="main__buttons">
            <div>
                <button class="button button--primary button--circle">
                    <i class="fas fa-plus"></i>
                </button>
                <h3>Nuevo servicio</h3>
            </div>
            <div>
                <button class="button button--primary">Guardar Cambios</button>
            </div>
        </section>

    </div>

</main>