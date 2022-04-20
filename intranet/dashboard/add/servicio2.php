<main class="main">
    <div>
        <section class="main__form--top" id="main">
            <div class="main__content">
                <header class="main__header--servicios">
                    <h1>Info del cliente</h1>
                </header>

                <form action="" class="form__info-cliente">
                    <div class="form__field">
                        <label for="tipoDeCliente">Tipo de cliente *</label>
                        <label for="empresa" class="form--checkbox">Empresa
                            <input type="checkbox" id="client_business">
                        </label>
                    </div>
                    <div class="form__field">
                        <label for="nombreCliente">Nombre *</label>
                        <input type="text" id="client_name">
                    </div>
                    <div class="form__field">
                        <label for="apellidosCliente">Apellido(s) *</label>
                        <input type="text" id="client_lasname">
                    </div>
                    <div class="form__field">
                        <label for="telefonoCliente">Teléfono *</label>
                        <input type="number" id="client_phone">
                    </div>
                    <div class="form__field">
                        <label for="mailCliente">Mail *</label>
                        <input type="mail" id="client_email">
                    </div>
                    <div class="form__field">
                        <label for="factura">Requiere Factura*</label>
                        <select name="" id="require_billing">
                            <option value="1">Si</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form__field">
                        <label for="factura">Comentarios *</label>
                        <input type="text" id="comments">
                    </div>
                </form>
            </div>


            <div class="main__content collapse" id="billing_container">
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
                <section>
                    <h2>Servicios Activos</h2>
                </section>

                <section>
                    <button class="button button--primary button--filter" id="buttonFiltrar">
                        <i class="fa-solid fa-filter"></i>
                            Filtrar
                        <i class="fa-solid fa-chevron-down"></i>
                    </button>
                </section>
            </header>
            <table class="main__table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Paciente</th>
                        <th>Sexo</th>
                        <th>Edad</th>
                        <th>Delegación</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for($i = 0; $i<5; $i++){ ?>
                    <tr>
                        <td>000 – 00</td>
                        <td>María Pérez Prieto</td>
                        <td>Femenino</td>
                        <td>75 años</td>
                        <td>Cuauhtémoc</td>
                    </tr>
    
                    <?php } ?>
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

        <section class="main__content">
            <header class="main__header--servicios">
                <section>
                    <h2>Facturación</h2>
                </section>

                <section id="sectionHeader">
                    <button class="button button--primary button--filter" id="buttonNuevaFactura">
                        Nueva factura
                        <i class="fa-solid fa-upload"></i>
                    </button>
                </section>
            </header>
            <table class="main__table">
                <thead>
                    <tr>
                        <th>Periodo</th>
                        <th>Emisor</th>
                        <th>Monto</th>
                        <th>Archivos</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php for($i = 0; $i<5; $i++){ ?>
                    <tr>
                        <td>19.02.22 – 25.02.22</td>
                        <td>Juana Pérez</td>
                        <td>$4,500.00</td>
                        <td>
                            <i class="fa-solid fa-download"></i>
                        </td>
                        <td>
                            <i class="fa-solid fa-pencil"></i>
                        </td>
                        <td>
                            <i class="far fa-trash-alt"></i>
                        </td>
                    </tr>
    
                    <?php } ?>
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
<!-- <script src="<?php echo __ROOT__; ?>/intranet/assets/js/index.js"></script> -->


<script type="text/javascript">
    $("#require_billing").on("change",function() {
        $("#billing_container").toggle();
    });
</script>