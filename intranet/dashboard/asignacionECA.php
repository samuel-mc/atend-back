<main class="main">
    <div>
        <section class="main__content main__add--cotainer">
            <header class="main__header--servicios">
                <h1>Info del paciente</h1>
            </header>
            <div>
                <form action="" class="form__info-paciente">
                    <div>
                        <div class="form__field">
                            <label for="fechaDeInicio">Fecha de inicio </label>
                            <input type="date" name="fechaDeInicio" id="fechaDeInicio">
                        </div>
                       
                        <div class="form__field">
                            <label for="fechaDeInicio">Fecha de terminación </label>
                            <input type="date" name="fechaDeInicio" id="fechaDeInicio">
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
                                <label for="apellidosCliente">Tipo de servicio</label>
                                <input type="text" value="Enfermería General">
                            </div>
                        </div>


                        <div class="form__field">
                            <label for="tipoDeCuidado">Tipo de cuidado </label>
                            <input type="text" value="Oncológico" name="tipoDeCuidado" id="tipoDeCuidado">
                        </div>

                        <div class="form__field form__field--doble">
                            <div>
                                <label for="duracion">Duracion</label>
                                <input type="text" value="12 horas" name="duracion" id="duracion">
                            </div>

                            <div>
                                <label for="entrada">Entrada</label>
                                <input type="time" name="entrada" id="entrada">
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="form__field">
                            <label for="comlexion">Complexión</label>
                            <input type="text" name="comlexion" id="comlexion" value="Indiferente">
                        </div>
                        <div class="form__field">
                            <label for="paraSeguro">Calificada para seguro</label>
                            <select name="paraSeguro" id="paraSeguro">
                                <option value="no">No</option>
                                <option value="si">Si</option>
                            </select>
                        </div>
                        <div class="form__field">
                            <label for="precioCliente">Precio Cliente</label>
                            <input type="number" name="precioCliente" id="precioCliente" value="1950">
                        </div>
                        <div class="form__field">
                            <label for="precioECA">Precio ECA</label>
                            <input type="number" name="precioECA" id="precioECA" value="750">
                        </div>
                        <div class="form__field">
                            <label for="adicionales">Adicionales</label>
                            <input type="text" name="adicionales" id="adicionales" value="Enfermería General">
                        </div>
                    </div>

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
                    </div>
                </form>
            </div>
        </section>
    </div>

</main>