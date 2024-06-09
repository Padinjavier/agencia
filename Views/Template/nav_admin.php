<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="d-flex justify-content-end align-items-center" style="height: 50px;">
        <!-- <img class="w-25" src="<?= media(); ?>/tienda/images/logo.png" alt=""> -->
        <a class="app-sidebar__toggle text-dark" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"> <i
                class="fas fa-bars"></i> </a>
    </div>
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="<?= media(); ?>/images/avatar.png"
            alt="User Image">
        <div>
            <p class="app-sidebar__user-name">
            <strong>
            <?= $_SESSION['userData']['nombres']; ?>
            </strong>   
            </p>
            <p class="app-sidebar__user-designation">
                <?= $_SESSION['userData']['nombrerolusuario']; ?>
            </p>
        </div>
    </div>
    <ul class="app-menu">
        <!-- Mi sitioweb -->
        <!-- <li>
            <a class="app-menu__item" href="<?= base_url(); ?>/home" target="_blank">
                <i class="app-menu__icon fa fas fa-globe" aria-hidden="true"></i>
                <span class="app-menu__label">Ver sitio web</span>
            </a>
        </li> -->
        <?php if (!empty($_SESSION['permisos'][1]['r'])) { ?>
            <li>
                <a class="app-menu__item" href="<?= base_url(); ?>/dashboard">
                <i class="app-menu__icon bi bi-house-door-fill"></i>
                    <span class="app-menu__label">Dashboard</span>
                </a>
            </li>
        <?php } ?>
        <?php if (!empty($_SESSION['permisos'][2]['r'])) { ?>
            <li class="treeview">
                <a class="app-menu__item" href="#" data-toggle="treeview">
                    <i class="app-menu__icon bi bi-people-fill"></i>
                    <span class="app-menu__label">Empleados</span>
                    <i class="treeview-indicator fa fa-angle-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a class="treeview-item" href="<?= base_url(); ?>/empleados"><i class="icon fa fa-circle-o"></i>
                            Empleados</a></li>
                    <li><a class="treeview-item" href="<?= base_url(); ?>/rolesempleados"><i class="icon fa fa-circle-o"></i>
                            Roles</a></li>
                </ul>
            </li>
        <?php } ?>
        <?php if (!empty($_SESSION['permisos'][3]['r'])) { ?>
            <li>
                <a class="app-menu__item" href="<?= base_url(); ?>/clientes">
                    <i class="app-menu__icon bi bi-person-fill"></i>
                    <span class="app-menu__label">Clientes</span>
                </a>
            </li>
        <?php } ?>
        <?php if (!empty($_SESSION['permisos'][4]['r'])) { ?>
            <li class="treeview">
                <a class="app-menu__item" href="#" data-toggle="treeview">
                    <i class="app-menu__icon bi bi-mouse-fill"></i>
                    <span class="app-menu__label">Usuario</span>
                    <i class="treeview-indicator fa fa-angle-right"></i>
                </a>
                <ul class="treeview-menu">
                <li><a class="treeview-item" href="<?= base_url(); ?>/usuarios"><i class="icon fa fa-circle-o"></i>
                            Usuarios</a></li>
                    <li><a class="treeview-item" href="<?= base_url(); ?>/rolesusuarios"><i class="icon fa fa-circle-o"></i>
                            Permisos</a></li>
                </ul>
            </li>
        <?php } ?>
        <?php if (!empty($_SESSION['permisos'][5]['r']) || !empty($_SESSION['permisos'][6]['r'])) { ?>
            <li class="treeview">
                <a class="app-menu__item" href="#" data-toggle="treeview">
                    <i class="app-menu__icon bi bi-archive-fill"></i>
                    <span class="app-menu__label">Punto de venta</span>
                    <i class="treeview-indicator fa fa-angle-right"></i>
                </a>
                <ul class="treeview-menu">
                    <?php if (!empty($_SESSION['permisos'][6]['r'])) { ?>
                        <li><a class="treeview-item" href="<?= base_url(); ?>/pedidos"><i class="icon fa fa-circle-o"></i>
                                Venta</a></li>
                    <?php } ?>
                    <?php if (!empty($_SESSION['permisos'][7]['r'])) { ?>
                        <li><a class="treeview-item" href="<?= base_url(); ?>/productos"><i class="icon fa fa-circle-o"></i>
                                Salida</a></li>
                    <?php } ?>
                    <?php if (!empty($_SESSION['permisos'][8]['r'])) { ?>
                        <li><a class="treeview-item" href="<?= base_url(); ?>/servicios"><i class="icon fa fa-circle-o"></i>
                                Servicios</a></li>
                    <?php } ?>
                </ul>
            </li>
        <?php } ?>
        <!-- Pedidos  -->
        <!-- <?php if (!empty($_SESSION['permisos'][9]['r'])) { ?>
            <li>
                <a class="app-menu__item" href="<?= base_url(); ?>/pedidos">
                    <i class="app-menu__icon fa fa-shopping-cart" aria-hidden="true"></i>
                    <span class="app-menu__label">Pedidos</span>
                </a>
            </li>
        <?php } ?> -->

        <!-- Suscripciones -->
        <!-- <?php if (!empty($_SESSION['permisos'][MSUSCRIPTORES]['r'])) { ?>
            <li>
                <a class="app-menu__item" href="<?= base_url(); ?>/suscriptores">
                    <i class="app-menu__icon fas fa-user-tie" aria-hidden="true"></i>
                    <span class="app-menu__label">Suscriptores</span>
                </a>
            </li>
        <?php } ?> -->

        <!-- <?php if (!empty($_SESSION['permisos'][MDCONTACTOS]['r'])) { ?>
            <li>
                <a class="app-menu__item" href="<?= base_url(); ?>/contactos">
                    <i class="app-menu__icon fas fa-envelope" aria-hidden="true"></i>
                    <span class="app-menu__label">Mensajes</span>
                </a>
            </li>
        <?php } ?> -->

        <!-- <?php if (!empty($_SESSION['permisos'][MDPAGINAS]['r'])) { ?>
            <li>
                <a class="app-menu__item" href="<?= base_url(); ?>/paginas">
                    <i class="app-menu__icon fas fa-file-alt" aria-hidden="true"></i>
                    <span class="app-menu__label">Páginas</span>
                </a>
            </li>
        <?php } ?> -->

        <li>
            <a class="app-menu__item" href="<?= base_url(); ?>/logout">
                <i class="app-menu__icon bi bi-arrow-bar-right"></i>
                <span class="app-menu__label">Cerrar sesión</span>
            </a>
        </li>
    </ul>
</aside>