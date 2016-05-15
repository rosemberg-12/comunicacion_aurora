<?php
require_once 'php/dto/cliente.php';

session_start();
$muestra="";
if( ( isset($_POST['documento']) && isset($_POST['password']) ) )
{

    require_once 'php/facade/facade.php';


    $facade = new facade();

    $var=$facade->iniciarSesionAdmin($_POST['documento'],$_POST['password']);

    if($var!=null)
        header("Location: indexAdmin.php");

    else{
        $muestra= '<script type="text/javascript">alertify.error("Contraseña incorrecta");</script>';
    }


}
else if( isset($_SESSION['id_admin']) ){

    header('Location: indexAdmin.php');

}
else if( isset($_SESSION['id_cliente']) ){

    header('Location: indexUser.php');

}

?>

<!DOCTYPE html>
<html>

     <?php
         include('html/head.html');
      ?>

    <body class="skin-red">
      
        <div class="wrapper">
            <!-- Encabezado -->
            
            <?php
              include('html/headerIndex.php');
            ?>

            <!-- aca va la barra lateral -->
            <?php

              include('html/barraLateralIndex-a.php');
            ?>

            <!-- Columna derecha. contiene navbar y la ruta de la pagina -->
            <div class="content-wrapper inicio">
                <!-- Encabezado -->
                

                <!-- Contenido Principal de la pagina -->
                <section class="content">
                    <!-- Incluir aqui el contenido-->
                        <div class="login-box">
                              <div class="login-logo" style="background-color: #fff; border-style: solid; border-width: 1px; border-color: black;">
                                    <img src="img/minas.png">
                              </div><!-- /.login-logo -->
                                      <div class="login-box-body" style="border-style: solid; border-width: 1px; border-color: black">
                                        <p class="login-box-msg">Logueate para iniciar sesión</p>
                                                <form action="admin.php" method="post" id="login">
                                                <div id="tok">

                                                  <div class="form-group has-feedback">
                                                    <input type="text" class="form-control" placeholder="Número de Documento" name="documento" id="documento" required="" title="Número de Documento">
                                                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                                  </div>

                                                  <div class="form-group has-feedback">
                                                    <input type="password" class="form-control" placeholder="Contraseña" name="password" id="password" required="" title="Contraseña">
                                                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                                  </div>


                                                  <div class="row">

                                                    <div class="col-xs-8">
                                                      <div class="checkbox icheck">
                                                        <label>

                                                        </label>
                                                      </div>
                                                    </div><!-- /.col -->

                                                    <div class="col-xs-4">
                                                      <button type="submit" class="btn btn-danger btn-block btn-flat">Entrar</button>
                                                    </div><!-- /.col -->
                                                  </div>

                                                </form>

                                        <br>

                                      </div><!-- /.login-box-body -->
                        </div>
                </section><!-- /.contenido principal-->
            </div><!-- /.content-wrapper -->
            
            <!-- Pie de pagina -->
            
        <?php
              include('html/footer.php');
            ?>
        </div><!-- wrapper-->


        <!-- Funciones js -->

        <!-- jQuery 2.1.3 -->
        <script src="./js/plugins/jQuery/jQuery-2.1.3.min.js"></script>
        <!-- jQuery UI 1.11.2 -->
        <script src="./js/plugins/jQueryUI/jquery-ui.min.js" type="text/javascript"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button);
        </script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src="./js/bootstrap/bootstrap.min.js" type="text/javascript"></script>   
        <!-- AdminLTE App Oculta el menu-->
        <script src="./js/app/app.min.js" type="text/javascript"></script>
        <script src="./js/alertify.min.js"></script>
        <?php echo $muestra;?>
    </body>

</html>
