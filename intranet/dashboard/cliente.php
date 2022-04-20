<?php
    $botonEditar = '
    <button class="buttonEditar" >
        <i class="fa-solid fa-pencil"></i>
    </button>
    ';
?>

<main class="main">
    <section class="main__content" id="main">
        <header class="main__header--servicios">
            <section>
                <h2>Servicios</h2>
                <button class="button button--primary">Activos</button>
                <button class="button button--primary active">Futuros</button>
                <button class="button button--primary">Pasados</button>
            </section>

            <section>
                <button class="button button--primary button--filter" id="buttonFiltrar">
                    <i class="fa-solid fa-filter"></i>
                        Filtrar
                    <i class="fa-solid fa-chevron-down"></i>
                </button>
                <button class="button button--circle button--primary">
                    <i class="fa-solid fa-download"></i>
                </button>
            </section>
        </header>

        <table class="main__table">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>ID</th>
                    <th>Paciente</th>
                    <th>Servicio</th>
                    <th>Prestador(a)</th>
                    <th>Cliente</th>
                    <th>ECA</th>
                    <th>Extras</th>
                    <th>Estatus</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="table_data">
                <tr class="table__row--disable">
                    <td>21.03.2021</td>
                    <td>000 – 00</td>
                    <td>Enrique Fuentes F</td>
                    <td>Enf Gral –12hrs </td>
                    <td>
                        Jane Doe
                        <?php echo $botonEditar; ?>
                    </td>
                    <td>
                        $1,500
                        <?php echo $botonEditar; ?>
                    </td>
                    <td>
                        $ 500
                        <?php echo $botonEditar; ?>
                    </td>
                    <td>
                        $ 120
                        <?php echo $botonEditar; ?>
                    </td>
                    <td class="main__table--estatus">
                        <span class="disable"> ● </span> Sin registro 
                        <?php echo $botonEditar; ?>
                    </td>
                    <td>
                        <i class="fa-solid fa-trash-can"></i>
                    </td>
                </tr>
                
                <tr>
                    <td>21.03.2021</td>
                    <td>000 – 00</td>
                    <td>Enrique Fuentes F</td>
                    <td>Enf Gral –12hrs </td>
                    <td>
                        Jane Doe
                        <a>
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td>
                        $1,500
                        <a>    
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td>
                        $ 500
                        <a>
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td>
                        $ 120
                        <a>
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td class="main__table--estatus">
                        <span class="green"> ● </span> A tiempo 
                        <a>
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td>
                        <i class="fa-solid fa-trash-can"></i>
                    </td>
                </tr>
                
                <tr>
                    <td>21.03.2021</td>
                    <td>000 – 00</td>
                    <td>Enrique Fuentes F</td>
                    <td>Enf Gral –12hrs </td>
                    <td>
                        Jane Doe
                        <a>
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td>
                        $1,500
                        <a>    
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td>
                        $ 500
                        <a>
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td>
                        $ 120
                        <a>
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td class="main__table--estatus">
                        <span class="red"> ● </span> No llegó 
                        <a>
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td>
                        <i class="fa-solid fa-trash-can"></i>
                    </td>
                </tr>
                
                <tr>
                    <td>21.03.2021</td>
                    <td>000 – 00</td>
                    <td>Enrique Fuentes F</td>
                    <td>Enf Gral –12hrs </td>
                    <td>
                        Jane Doe
                        <a>
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td>
                        $1,500
                        <a>    
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td>
                        $ 500
                        <a>
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td>
                        $ 120
                        <a>
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td class="main__table--estatus">
                        <span class="yellow"> ● </span> Llegó tarde 
                        <a>
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td>
                        <i class="fa-solid fa-trash-can"></i>
                    </td>
                </tr>

                <tr>
                    <td>21.03.2021</td>
                    <td>000 – 00</td>
                    <td>Enrique Fuentes F</td>
                    <td>Enf Gral –12hrs </td>
                    <td>
                        Jane Doe
                        <a>
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td>
                        $1,500
                        <a>    
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td>
                        $ 500
                        <a>
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td>
                        $ 120
                        <a>
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td class="main__table--estatus">
                        <span class="green"> ● </span> A tiempo 
                        <a>
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td>
                        <i class="fa-solid fa-trash-can"></i>
                    </td>
                </tr>

                <tr>
                    <td>21.03.2021</td>
                    <td>000 – 00</td>
                    <td>Enrique Fuentes F</td>
                    <td>Enf Gral –12hrs </td>
                    <td>
                        Jane Doe
                        <a>
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td>
                        $1,500
                        <a>    
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td>
                        $ 500
                        <a>
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td>
                        $ 120
                        <a>
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td class="main__table--estatus">
                        <span class="green"> ● </span> A tiempo 
                        <a>
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td>
                        <i class="fa-solid fa-trash-can"></i>
                    </td>
                </tr>

                <tr class="table__row--disable">
                    <td>21.03.2021</td>
                    <td>000 – 00</td>
                    <td>Enrique Fuentes F</td>
                    <td>Enf Gral –12hrs </td>
                    <td>
                        Jane Doe
                        <a>
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td>
                        $1,500
                        <a>    
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td>
                        $ 500
                        <a>
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td>
                        $ 120
                        <a>
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td class="main__table--estatus">
                        <span class="disable"> ● </span> Sin registro 
                        <a>
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td>
                        <i class="fa-solid fa-trash-can"></i>
                    </td>
                </tr>

                <tr>
                    <td>21.03.2021</td>
                    <td>000 – 00</td>
                    <td>Enrique Fuentes F</td>
                    <td>Enf Gral –12hrs </td>
                    <td>
                        Jane Doe
                        <a>
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td>
                        $1,500
                        <a>    
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td>
                        $ 500
                        <a>
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td>
                        $ 120
                        <a>
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td class="main__table--estatus">
                        <span class="green"> ● </span> A tiempo 
                        <a>
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td>
                        <i class="fa-solid fa-trash-can"></i>
                    </td>
                </tr>

            </tbody>
        </table>

        <!-- Modal que se genera al clickear en "edit"  -->
        <!-- <div class="main__modal main__modal--edit" id="modalEdit">
            <div>
                <button class="button button--primary button--circle">X</button>
            </div>
            <form action="">
                <div>
                    <label for="aplica">Aplica a</label>
                    <select name="aplica" id="aplica">
                        <option value="0">Cliente</option>
                        <option value="101011">Foo</option>
                        <option value="101012">Foo</option>
                    </select>
                </div>

                <div>
                    <label for="recurrencia">Recurrencia</label>
                    <select name="recurrencia" id="recurrencia">
                        <option value="0">De aquí en adelante</option>
                        <option value="101011">Foo</option>
                        <option value="101012">Foo</option>
                    </select>
                </div>

                <div>
                    <label for="estatus">Monto</label>
                    <input type="text" value="$250">
                </div>

                <div>
                    <label for="estatus">Comentario</label>
                    <input type="text" value="EPP y transporte de ECA">
                </div>

                <button type="button" class="button button--primary button--submit">Agregar</button>
            </form>
        </div> -->

        <footer class="main__footer">
            <div class="footer__progress--bar">
                <span></span>
            </div>
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
</main>


<script>
    $.ajax({
        url: '<?php echo __ROOT__; ?>/bridge/routes.php?action=get_services_by_client',
        type: 'GET',
        data:{
            client_id:<?php echo $client['id']; ?>
        },
        success: function(data) {
            console.log(JSON.parse(data));
            fillindexTable(JSON.parse(data));
        }
    });

    const fillindexTable = (data) => {
        let table = '';
        data.forEach(element => {

            table += `<tr>
                <td>
                    <button class="buttonEditarFecha">
                        ${element.date}
                    </button>
                </td>
                <td>${element.id}</td>
                <td>
                    <a href="<?php echo __ROOT__; ?>/paciente/${element.patient.id}">
                        ${element.patient.name}
                    </a>
                </td>
                <td>${element.service_type}</td>
                <td>
                    ${element.provider.name} ${element.provider.lastname}
                    <?php echo $botonEditar; ?>
                </td>
                <td>
                    ${element.costo_cliente ? element.costo_cliente : '$ 0'}
                    <button onclick="console.log('${element.date}')">    
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                </td>
                <td>
                    ${element.costo_total ? element.costo_total : '$0'}
                    <a>    
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                </td>
                <td>
                    ${element.costo_extras ? element.costo_extras : '$0'}
                    <a>    
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                </td>
                <td class="main__table--estatus">
                    <span class="disable"> ● </span> ${element.status.name} 
                    <?php echo $botonEditar; ?>
                </td>
                <td>
                    <i class="fa-solid fa-trash-can"></i>
                </td>
            </tr>`;
        });
        $("#table_data").html(table);
    }
</script>