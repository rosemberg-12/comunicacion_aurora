
<aside class="main-sidebar" style="position:fixed;">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Panel usuario -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="img/user.png" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p><?php echo $_SESSION["nombre_cliente"];?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="header">MENU PRINCIPAL</li>
                        <li class=<?php echo $t." treeview" ;?> >
                            <a href="verRegistros.php">
                                <i class="fa fa-dashboard"></i> <span>Ver movimientos</span>
                            </a>                            
                        </li>

                        <li class=<?php echo $n." treeview" ;?> >
                            <a href="verNovedades.php">
                                <i class="fa fa-files-o"></i>
                                <span>Ver novedades</span>
                            </a>                            
                        </li>

                        <li class=<?php echo $r." treeview" ;?> >
                            <a href="reporte.php">
                                <i class="fa fa-files-o"></i>
                                <span>Reportes</span>
                            </a>
                        </li>

                        <li class="treeview" >
                            <a href="cambiarContrasena.php">
                                <i class="fa fa-files-o"></i>
                                <span>Cambiar contraseña</span>
                            </a>
                        </li>

                        <li class="treeview">
                            <a href="cerrarS.php">
                                <i class="fa fa-times"></i> <span>Cerrar Sesion</span>
                            </a>                            
                        </li>                      
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>
