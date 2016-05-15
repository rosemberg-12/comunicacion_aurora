<?php

session_start();
$t='';
$n='active';
$r='';

if (!isset($_SESSION['id_cliente']))
{
    header('Location: index.php');
    die();
}
if (isset($_SESSION['id_admin']))
{
    header('Location: indexAdmin.php');
    die();
}

require_once 'php/facade/facade.php';
$facade = new facade();
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
              include('html/headerUser.php');
            ?>

            <!-- aca va la barra lateral -->
            <?php
              include('html/barraLateralUser.php');
            ?>

            <!-- Columna derecha. contiene navbar y la ruta de la pagina -->
            <div class="content-wrapper inicio">
                <!-- Encabezado -->


                <!-- Contenido Principal de la pagina -->
                <section class="content">
                    <br><br>
                    <div class="login-logo titulo" style="color: #fff;">
                        <a href="#" style="color: #dd4b39;">Registrar Novedad</a>
                    </div><!-- /.login-logo -->
                    <!-- Incluir aqui el contenido-->
                    <div class="box" style="width: 70%; margin: 3% auto;">


                        <div class="box-header">

                        </div><!-- /.box-header -->
                        <div class="login-box-body">
                            <form role="form" action="registrarNovedad.php" method="post">

                                <!-- text input -->

                                <div class="form-group">
                                    <label>Asunto de la novedad</label>
                                    <input type="text" class="form-control" placeholder="Digite el asunto de la novedad" id="asunto" name="asunto" required>
                                </div>

                                <div class="form-group">
                                    <label>Novedad</label>
                                    <textarea maxlength="200" class="form-control" id="novedad" name="novedad" required></textarea>
                                </div>



                                <button type="submit" class="btn btn-primary btn-block btn-flat">Registrar</button>

                            </form>

                        </div>
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
    </body>

</html>