<?php 

    $ro = explode("/admin/", $_SERVER['REQUEST_URI']);
    $ro = explode("/",$ro[1])[0];
?>

<body id="page-top">
    <?php if (isset($options) && $options['navbar']==false){ ?>
    <div class="wrapper">
        <div id="content">
    <?php }else{ ?>
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <p class="text-white" style="font-size: 20px;line-height: 1.1;">
                    Atend
                    <br>
                    <span style="color: #a9b7d0;font-size: 11px;">Logística</span>
                </p>
            </div>

            <ul class="list-unstyled components">
                <li <?php echo $ro=="deliveries"?"class='active'":""; ?>>
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <img src="<?php echo __ROOT__; ?>/intranet/assets/img/invoices.png" width="20" style="margin-right: 5px;">
                        Pedidos
                    </a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="<?php echo __ROOT__; ?>/admin/deliveries">Activos</a>
                        </li>
                        <li>
                            <a href="<?php echo __ROOT__; ?>/admin/deliveries/all">Todos</a>
                        </li>
                    </ul>
                </li>
                <li <?php echo $ro=="patients"?"class='active'":""; ?>>
                    <a href="<?php echo __ROOT__; ?>/admin/patients">
                        <img src="<?php echo __ROOT__; ?>/intranet/assets/img/patients.png" width="20" style="margin-right: 5px;">
                        Pacientes
                    </a>
                </li>
                <li <?php echo $ro=="stock"?"class='active'":""; ?>>
                    <a href="<?php echo __ROOT__; ?>/admin/stock">
                        <img src="<?php echo __ROOT__; ?>/intranet/assets/img/stock.png" width="20" style="margin-right: 5px;">
                        Inventario
                    </a>
                </li>

                <?php if ($_SESSION['user']['company_id']==1){ ?>
                <li <?php echo $ro=="admin"?"class='active'":""; ?>>
                    <a href="<?php echo __ROOT__; ?>/admin/users">
                        <img src="<?php echo __ROOT__; ?>/intranet/assets/img/admin.png" width="20" style="margin-right: 5px;">
                        Admin
                    </a>
                </li>
                <?php } ?>
            </ul>

            <div class="sidebar-footer">
                <img src="<?php echo __ROOT__; ?>/intranet/assets/img/logout.png" width="23px"> 
                <a class="btn text-white" style="font-weight: 700;padding-left: 5px;opacity: .5;" href="logout">Logout</a>
                <br>
                <br>
                <p style="font-size:8px;font-weight: 500;">Roche-Atend todos los derechos reservados, 2022 ©</p>
            </div>
        </nav>


        <div class="wrapper">
            <nav id="sidebar-fixer"></nav>

            <!-- Page Content Holder -->
            <button type="button" id="sidebarCollapse" class="navbar-btn">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <div id="content">
    <?php } ?>