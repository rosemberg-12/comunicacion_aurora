<header class="main-header">
                <!-- Logo -->
                <a href="index.php" class="logo" style="position: fixed;"><strong>Minas la Aurora </strong> </a>
                <!-- Header Navbar: style se encuentra en header.less -->
                <nav class="navbar navbar-fixed-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="img/user.png" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $_SESSION["nombre_cliente"];?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="img/user.png" class="img-circle" alt="User Image">
                    <p>
                      <?php echo $_SESSION["nombre_cliente"];?>
                    </p>
                  </li>
                  
                </ul>
              </li>
                         

                        </ul>
                    </div>
                </nav>
            </header>