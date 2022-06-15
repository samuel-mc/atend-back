<?php
    $buttonEditar = '
    <a
        class="button button--primary button--circle"
        href="'.__ROOT__.'/add/servicio/'.(isset($idClient)?$idClient:"").'"
    >
        <i class="fa-solid fa-pencil"></i>
    </a>';
?>

<?php
    $headerIndex =
        '<header class="header" id="header">
            <section class="header--top-container">
                <div class="header__side--left">
                    <div class="header__search-bar">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <input type="text" id="searchInput" name="searchInput">
                        <button
                            id="searchButton"
                            onclick="clearSearch()"
                            class="button button--clear-search button--transparent"
                        >
                            <i class="fa-solid fa-x"></i>
                        </button>
                    </div>
                    <a
                        class="button button--primary button--circle"
                        href="'.__ROOT__.'/add/nuevo-cliente"
                    >
                        <i class="fa-solid fa-plus"></i>
                    </a>
                    <h3>Nuevo cliente</h3>
                </div>
                <div class="header__side--right">
                    <button class="button--transparent">
                        <i class="fa-solid fa-bell"></i>
                    </button>
                    <img class="header__photo" src="'.__ROOT__.'/intranet/assets/images/profilePhoto.jpg" alt="Imagen de perfil">
                    <button class="button--transparent">
                        <i class="fa-solid fa-angle-down"></i>
                    </button>
                </div>
            </section>
        </header>'; //Ya quedó

    $headerLogin = ''; 


    $headerCliente =
        '<header class="header" id="header">
            <section class="header--top-container">
                <div class="header__side--left header__side--vertical ">
                    <div>
                        <h2>'.(isset($headerName)?$headerName:"Agregar Cliente").'</h2>
                        '.$buttonEditar.'
                    </div>
                    <h3> ID CLIENTE: '.(isset($idClient)?$idClient:"ID CLIENTE").'</h3>
                </div>
                <div class="header__side--right">
                    <button class="button--transparent">
                        <i class="fa-solid fa-bell"></i>
                    </button>
                    <img class="header__photo" src="'.__ROOT__.'/intranet/assets/images/profilePhoto.jpg" alt="Imagen de perfil">
                    <button class="button--transparent">
                        <i class="fa-solid fa-angle-down"></i>
                    </button>
                </div>
            </section>
            <section class="header--bottom-container">
                <section class="header__side--left">
                    <div class="header__search-bar">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <input type="text">
                    </div>
                    <a class="button button--primary button--circle" 
                        href="'.__ROOT__.'/add/paciente/'.(isset($idClient)?$idClient:"").'"
                    >
                        <i class="fa-solid fa-plus"></i>
                    </a>
                    <h3>Nuevo paciente</h3>
                </section>
                <section class="header__side--right">
                    <h3 class="button button--primary active">
                        Saldo: <span id="saldoCliente" style="margin-left: 4px;"></span>
                    </h3>
                    <nav>
                        <ul>
                            <li><a href="'.__ROOT__.'/pagos-cliente/'.(isset($client)?$client['id']:0).'">Pagos</a></li>
                            <li><a href="'.__ROOT__.'/facturas/'.(isset($client)?$client['id']:0).'">Facturas</a></li>
                        </ul>
                    </nav>
                </section>
            </section>
        </header>'; //Ya quedó

    $headerPagos =
        '<header id="header" class="header">
            <section class="header--top-container">
                <div class="header__side--left header__side--vertical ">
                    <h2>'.(isset($headerName)?$headerName:"Nombre").'</h2>
                    <h3>HISTORIAL DE PAGOS</h3>
                </div>
                <div class="header__side--right">
                    <button class="button--transparent">
                        <i class="fa-solid fa-bell"></i>
                    </button>
                    <img class="header__photo" src="'.__ROOT__.'/intranet/assets/images/profilePhoto.jpg" alt="Imagen de perfil">
                    <button class="button--transparent">
                        <i class="fa-solid fa-angle-down"></i>
                    </button>
                </div>
            </section>

            <section class="header--bottom-container"
                <div class="header__side--left">.</div>

                <div class="header__side--right">
                    <h3 class="button button--primary active">Saldo: $'.(isset($balance)?$balance:00).'</h2>
                    <button class="button button--primary" onclick="showModalAcreditarPago(this)"> Acreditar Pago</button>
                </div>
            </section>
        </header>'; // Ya quedó
    $headerPagosPaciente = 
        '<header class="header" id="header">
            <section class="header--top-container">
                <div class="header__side--left header__side--vertical">
                    <div>
                        <h2>'.(isset($headerName)?$headerName:"Nombre").'</h2>
                    </div>
                    <h3>HISTORIAL DE PAGOS PACIENTE</h3>
                </div>
                <div class="header__side--right">
                    <button class="button--transparent">
                        <i class="fa-solid fa-bell"></i>
                    </button>
                    <img class="header__photo" src="'.__ROOT__.'/intranet/assets/images/profilePhoto.jpg" alt="Imagen de perfil">
                    <button class="button--transparent">
                        <i class="fa-solid fa-angle-down"></i>
                    </button>
                </div>
            </section>
            <section class="header--bottom-container">
                <section class="header__side--left"></section>
                <section class="header__side--right">
                    <h3 class="button button--primary active">Saldo: $'.(isset($balance)?$balance:00).'</h3>
                    <nav>
                        <ul>
                            <li><a href="#">Acreditar Pago</a></li>
                        </ul>
                    </nav>
                </section>
            </section>
        </header>';

    $headerServicios =
        '<header class="header" id="header">
            <section class="header--top-container">
                <div class="header__side--left header__side--vertical">
                    <div>
                        <h2>'.(isset($headerName)?$headerName:"").'</h2>
                        '.$buttonEditar.'
                    </div>
                    <h3>ID PACIENTE: '.(isset($idClient)?$idClient:"").' </h3>
                </div>
                <div class="header__side--right">
                    <button class="button--transparent">
                        <i class="fa-solid fa-bell"></i>
                    </button>
                    <img class="header__photo" src="'.__ROOT__.'/intranet/assets/images/profilePhoto.jpg" alt="Imagen de perfil">
                    <button class="button--transparent">
                        <i class="fa-solid fa-angle-down"></i>
                    </button>
                </div>
            </section>
            <section class="header--bottom-container">
                <section class="header__side--left">
                    <div class="header__search-bar">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <input type="text">
                    </div>
                    <a
                        class="button button--primary button--circle"
                        href="'.__ROOT__.'/add/servicio-paciente/'.(isset($idClient)?$idClient:"").'"
                    >
                        <i class="fa-solid fa-plus"></i>
                    </a>
                    <h3>Nuevo servicio</h3>
                </section>
                <section class="header__side--right">
                    <h3 class="button button--primary active">
                        Saldo: <span id="saldoPaciente" style="margin-left: 4px;"></span>
                    </h3>
                    <nav>
                        <ul>
                            <li><a href="'.__ROOT__.'/pagos">Pagos</a></li>
                            <li><a href="#">Facturas</a></li>
                        </ul>
                    </nav>
                </section>
            </section>
        </header>';

    $headerBitacora =
        '<header class="header">
            <section class="header--top-container">
                <div class="header__side--left header__side--vertical">
                    <h2>'.(isset($headerName)?$headerName:"Nombre").'</h2>
                    <h3>ID PACIENTE: 000</h3>
                </div>
                <div class="header__side--right">
                    <button class="button--transparent">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path
                                d="M256 32V51.2C329 66.03 384 130.6 384 208V226.8C384 273.9 401.3 319.2 432.5 354.4L439.9 362.7C448.3 372.2 450.4 385.6 445.2 397.1C440 408.6 428.6 416 416 416H32C19.4 416 7.971 408.6 2.809 397.1C-2.353 385.6-.2883 372.2 8.084 362.7L15.5 354.4C46.74 319.2 64 273.9 64 226.8V208C64 130.6 118.1 66.03 192 51.2V32C192 14.33 206.3 0 224 0C241.7 0 256 14.33 256 32H256zM224 512C207 512 190.7 505.3 178.7 493.3C166.7 481.3 160 464.1 160 448H288C288 464.1 281.3 481.3 269.3 493.3C257.3 505.3 240.1 512 224 512z" />
                        </svg>
                    </button>
                    <img class="header__photo" src="'.__ROOT__.'/intranet/assets/images/profilePhoto.jpg" alt="Imagen de perfil">
                    <button class="button--transparent">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                            <path
                            d="M192 384c-8.188 0-16.38-3.125-22.62-9.375l-160-160c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L192 306.8l137.4-137.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-160 160C208.4 380.9 200.2 384 192 384z" />
                        </svg>
                    </button>
                </div>
            </section>
        </header>';
    
    $headerAdd =
        '<header class="header">
            <section class="header--top-container">
                <div class="header__side--left header__side--vertical">
                    <h2>'.(isset($client)?$client['name'].' '.$client['lastname']:"Agregar Cliente").'</h2>
                    <h3>ID CLIENTE:'. (isset($client) ? $client['id'] : "") .'</h3>
                </div>
                <div class="header__side--right">
                    <button class="button--transparent">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path
                                d="M256 32V51.2C329 66.03 384 130.6 384 208V226.8C384 273.9 401.3 319.2 432.5 354.4L439.9 362.7C448.3 372.2 450.4 385.6 445.2 397.1C440 408.6 428.6 416 416 416H32C19.4 416 7.971 408.6 2.809 397.1C-2.353 385.6-.2883 372.2 8.084 362.7L15.5 354.4C46.74 319.2 64 273.9 64 226.8V208C64 130.6 118.1 66.03 192 51.2V32C192 14.33 206.3 0 224 0C241.7 0 256 14.33 256 32H256zM224 512C207 512 190.7 505.3 178.7 493.3C166.7 481.3 160 464.1 160 448H288C288 464.1 281.3 481.3 269.3 493.3C257.3 505.3 240.1 512 224 512z" />
                        </svg>
                    </button>
                    <img class="header__photo" src="'.__ROOT__.'/intranet/assets/images/profilePhoto.jpg" alt="Imagen de perfil">
                    <button class="button--transparent">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                            <path
                            d="M192 384c-8.188 0-16.38-3.125-22.62-9.375l-160-160c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L192 306.8l137.4-137.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-160 160C208.4 380.9 200.2 384 192 384z" />
                        </svg>
                    </button>
                </div>
            </section>
        </header>';

    $headerECA =
        '<header class="header">
            <section class="header--top-container">
                <div class="header__side--left header__side--vertical">
                    <h2>Asignación ECA</h2>
                    <h3>ID SERVICIO 00 | '.(isset($headerName)?$headerName:"Nombre").'</h3>
                </div>
                <div class="header__side--right">
                    <button class="button--transparent">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path
                                d="M256 32V51.2C329 66.03 384 130.6 384 208V226.8C384 273.9 401.3 319.2 432.5 354.4L439.9 362.7C448.3 372.2 450.4 385.6 445.2 397.1C440 408.6 428.6 416 416 416H32C19.4 416 7.971 408.6 2.809 397.1C-2.353 385.6-.2883 372.2 8.084 362.7L15.5 354.4C46.74 319.2 64 273.9 64 226.8V208C64 130.6 118.1 66.03 192 51.2V32C192 14.33 206.3 0 224 0C241.7 0 256 14.33 256 32H256zM224 512C207 512 190.7 505.3 178.7 493.3C166.7 481.3 160 464.1 160 448H288C288 464.1 281.3 481.3 269.3 493.3C257.3 505.3 240.1 512 224 512z" />
                        </svg>
                    </button>
                    <img class="header__photo" src="'.__ROOT__.'/intranet/assets/images/profilePhoto.jpg" alt="Imagen de perfil">
                    <button class="button--transparent">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                            <path
                            d="M192 384c-8.188 0-16.38-3.125-22.62-9.375l-160-160c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L192 306.8l137.4-137.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-160 160C208.4 380.9 200.2 384 192 384z" />
                        </svg>
                    </button>
                </div>
            </section>
        </header>';
    $headerPaciente =
        '<header class="header">
            <section class="header--top-container">
                <div class="header__side--left header__side--vertical">
                    <h2>'.(isset($headerName)?$headerName:"Nombre").'</h2>
                    <h3>ID PACIENTE 00</h3>
                </div>
                <div class="header__side--right">
                    <button class="button--transparent">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                    <path
                                d="M256 32V51.2C329 66.03 384 130.6 384 208V226.8C384 273.9 401.3 319.2 432.5 354.4L439.9 362.7C448.3 372.2 450.4 385.6 445.2 397.1C440 408.6 428.6 416 416 416H32C19.4 416 7.971 408.6 2.809 397.1C-2.353 385.6-.2883 372.2 8.084 362.7L15.5 354.4C46.74 319.2 64 273.9 64 226.8V208C64 130.6 118.1 66.03 192 51.2V32C192 14.33 206.3 0 224 0C241.7 0 256 14.33 256 32H256zM224 512C207 512 190.7 505.3 178.7 493.3C166.7 481.3 160 464.1 160 448H288C288 464.1 281.3 481.3 269.3 493.3C257.3 505.3 240.1 512 224 512z" />
                        </svg>
                    </button>
                    <img class="header__photo" src="'.__ROOT__.'/intranet/assets/images/profilePhoto.jpg" alt="Imagen de perfil">
                    <button class="button--transparent">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                            <path
                            d="M192 384c-8.188 0-16.38-3.125-22.62-9.375l-160-160c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L192 306.8l137.4-137.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-160 160C208.4 380.9 200.2 384 192 384z" />
                        </svg>
                    </button>
                </div>
            </section>
        </header>';
    $headerAddPrestadora =
        '<header class="header">
            <section class="header--top-container">
                <div class="header__side--left header__side--vertical">
                    <h2>Nueva Prestadora</h2>
                </div>
                <div class="header__side--right">
                    <button class="button--transparent">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                    <path
                                d="M256 32V51.2C329 66.03 384 130.6 384 208V226.8C384 273.9 401.3 319.2 432.5 354.4L439.9 362.7C448.3 372.2 450.4 385.6 445.2 397.1C440 408.6 428.6 416 416 416H32C19.4 416 7.971 408.6 2.809 397.1C-2.353 385.6-.2883 372.2 8.084 362.7L15.5 354.4C46.74 319.2 64 273.9 64 226.8V208C64 130.6 118.1 66.03 192 51.2V32C192 14.33 206.3 0 224 0C241.7 0 256 14.33 256 32H256zM224 512C207 512 190.7 505.3 178.7 493.3C166.7 481.3 160 464.1 160 448H288C288 464.1 281.3 481.3 269.3 493.3C257.3 505.3 240.1 512 224 512z" />
                        </svg>
                    </button>
                    <img class="header__photo" src="'.__ROOT__.'/intranet/assets/images/profilePhoto.jpg" alt="Imagen de perfil">
                    <button class="button--transparent">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                            <path
                            d="M192 384c-8.188 0-16.38-3.125-22.62-9.375l-160-160c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L192 306.8l137.4-137.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-160 160C208.4 380.9 200.2 384 192 384z" />
                        </svg>
                    </button>
                </div>
            </section>
        </header>';
    $headerPrestadoras =
        '<header class="header" id="header">
            <section class="header--top-container">
                <div class="header__side--left">
                    <div class="header__search-bar">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <input type="text">
                    </div>
                    <a 
                        class="button button--primary button--circle"
                        href="'.__ROOT__.'/add/prestadora"
                    >
                        <i class="fa-solid fa-plus"></i>
                    </a>
                    <h3>Nueva prestadora </h3>
                </div>        
                <div class="header__side--right">
                    <button class="button--transparent">
                        <i class="fa-solid fa-bell"></i>
                    </button>
                    <img class="header__photo" src="'.__ROOT__.'/intranet/assets/images/profilePhoto.jpg" alt="Imagen de perfil">
                    <button class="button--transparent">
                        <i class="fa-solid fa-angle-down"></i>
                    </button>
                </div>
            </section>
        </header>';
    $headerEnfermeras = 
        '<header class="header" id="header">
            <section class="header--top-container">
                <h2>ATEND</h2>
            </section>
            <section class="header--bottom-container header__enfermera">
                <div class="header__enfermera--links">
                    <a class="button button--primary active">Servicios</a>
                    <a class="button button--primary">Pagos</a>
                </div>
                <div class="header__enfermera--calendar">
                    <h3>Hoy</h3>
                    <span> </span>
                    <i class="fa-solid fa-calendar"></i>
                </div>
            </section>
            
        </header>';
    $headerEnfermeraServicios = 
        '<header class="header header__enfermera--servicios">
            <div></div>
            <div><h2>00:00:00</h3></div>
            <div>
                <button class="button button--transparent" id="buttonSideMenu">
                    <i class="fa-solid fa-ellipsis-vertical"></i>
                </button>        
            </div>
        </header>';
    $headerClienteDashboard = 
        '<header class="header">
            <section class="header--top-container">
                <div class="header__side--left header__side--vertical">
                    <h2>Paciente Primero</h2>
                    <h3>ID PACIENTE 00</h3>
                </div>
                <div class="header__side--right">
                    <button class="button--transparent">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path d="M256 32V51.2C329 66.03 384 130.6 384 208V226.8C384 273.9 401.3 319.2 432.5 354.4L439.9 362.7C448.3 372.2 450.4 385.6 445.2 397.1C440 408.6 428.6 416 416 416H32C19.4 416 7.971 408.6 2.809 397.1C-2.353 385.6-.2883 372.2 8.084 362.7L15.5 354.4C46.74 319.2 64 273.9 64 226.8V208C64 130.6 118.1 66.03 192 51.2V32C192 14.33 206.3 0 224 0C241.7 0 256 14.33 256 32H256zM224 512C207 512 190.7 505.3 178.7 493.3C166.7 481.3 160 464.1 160 448H288C288 464.1 281.3 481.3 269.3 493.3C257.3 505.3 240.1 512 224 512z"></path>
                        </svg>
                    </button>
                    <img class="header__photo" src="http://localhost/backend/intranet/assets/images/profilePhoto.jpg" alt="Imagen de perfil">
                    <button class="button--transparent">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                            <path d="M192 384c-8.188 0-16.38-3.125-22.62-9.375l-160-160c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L192 306.8l137.4-137.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-160 160C208.4 380.9 200.2 384 192 384z"></path>
                        </svg>
                    </button>
                </div>
            </section>
        </header>';
    $headerAbonos = 
        '<header class="header">
            <section class="header--top-container">
                <div class="header__side--left">
                    <a class="button button--transparent" href="../cliente">
                        <i class="fa-solid fa-angle-left"></i>
                    </a>
                    <h2>Hacer un bono</h2>
                </div>
                <div class="header__side--right">
                    <button class="button--transparent">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path d="M256 32V51.2C329 66.03 384 130.6 384 208V226.8C384 273.9 401.3 319.2 432.5 354.4L439.9 362.7C448.3 372.2 450.4 385.6 445.2 397.1C440 408.6 428.6 416 416 416H32C19.4 416 7.971 408.6 2.809 397.1C-2.353 385.6-.2883 372.2 8.084 362.7L15.5 354.4C46.74 319.2 64 273.9 64 226.8V208C64 130.6 118.1 66.03 192 51.2V32C192 14.33 206.3 0 224 0C241.7 0 256 14.33 256 32H256zM224 512C207 512 190.7 505.3 178.7 493.3C166.7 481.3 160 464.1 160 448H288C288 464.1 281.3 481.3 269.3 493.3C257.3 505.3 240.1 512 224 512z"></path>
                        </svg>
                    </button>
                    <img class="header__photo" src="http://localhost/backend/intranet/assets/images/profilePhoto.jpg" alt="Imagen de perfil">
                    <button class="button--transparent">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                            <path d="M192 384c-8.188 0-16.38-3.125-22.62-9.375l-160-160c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L192 306.8l137.4-137.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-160 160C208.4 380.9 200.2 384 192 384z"></path>
                        </svg>
                    </button>
                </div>
            </section>
        </header>';

    $headerAddServicioPaciente = 
        '<header class="header">
            <section class="header--top-container">
                <div class="header__side--left header__side--vertical">
                    <h2>'.(isset($patient) ? $patient['name'] .' - Agregar Servicio' : "").'</h2>
                    <h3>ID Paciente: '.(isset($patient) ? $patient['id'] : '') .'</h3>
                </div>
                <div class="header__side--right">
                    <button class="button--transparent">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path
                                d="M256 32V51.2C329 66.03 384 130.6 384 208V226.8C384 273.9 401.3 319.2 432.5 354.4L439.9 362.7C448.3 372.2 450.4 385.6 445.2 397.1C440 408.6 428.6 416 416 416H32C19.4 416 7.971 408.6 2.809 397.1C-2.353 385.6-.2883 372.2 8.084 362.7L15.5 354.4C46.74 319.2 64 273.9 64 226.8V208C64 130.6 118.1 66.03 192 51.2V32C192 14.33 206.3 0 224 0C241.7 0 256 14.33 256 32H256zM224 512C207 512 190.7 505.3 178.7 493.3C166.7 481.3 160 464.1 160 448H288C288 464.1 281.3 481.3 269.3 493.3C257.3 505.3 240.1 512 224 512z" />
                        </svg>
                    </button>
                    <img class="header__photo" src="'.__ROOT__.'/intranet/assets/images/profilePhoto.jpg" alt="Imagen de perfil">
                    <button class="button--transparent">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                            <path
                            d="M192 384c-8.188 0-16.38-3.125-22.62-9.375l-160-160c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L192 306.8l137.4-137.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-160 160C208.4 380.9 200.2 384 192 384z" />
                        </svg>
                    </button>
                </div>
            </section>
        </header>';

    switch ($header) {
        case 'headerIndex':
            echo $headerIndex;
            break;
        case 'headerLogin':
            echo $headerLogin;
            break;
        case 'headerCliente':
            echo $headerCliente;
            break;
        case 'headerPagos':
            echo $headerPagos;
            break;
        case 'headerServicios':
            echo $headerServicios;
            break;
        case 'headerBitacora':
            echo $headerBitacora;
            break;
        case 'headerAdd':
            echo $headerAdd;
            break;
        case 'headerPagosPaciente':
            echo $headerPagosPaciente;
            break;
        case 'headerECA':
            echo $headerECA;
            break;
        case 'headerPaciente':
            echo $headerPaciente;
            break;
        case 'headerPrestadoras':
            echo $headerPrestadoras;
            break;
        case 'headerAddPrestadora':
            echo $headerAddPrestadora;
            break;
        case 'headerEnfermeras':
            echo $headerEnfermeras;
            break;
        case 'headerEnfermeraServicios':
            echo $headerEnfermeraServicios;
            break;
        case 'headerClienteDashboard':
            echo $headerClienteDashboard;
            break;
        case 'headerAbonos':
            echo $headerAbonos;
            break;
        case 'headerAddServicioPaciente':
            echo $headerAddServicioPaciente;
            break;
        default:
            echo $headerIndex;
            break;
    }
?>