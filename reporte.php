<?php

session_start();
$t='';
$n='';
$r='active';
$muestra="";
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
if(isset($_GET['estado'])){
    if(strcmp($_GET['estado'], "exitoso") == 0){
        $muestra= '<script type="text/javascript">alertify.success("Importación correcta");</script>';
    }
    else{
        $muestra= '<script type="text/javascript">alertify.error("'.$_GET['estado'].'");</script>';
    }
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
                    <!-- Incluir aqui el contenido-->
                     <br><br>
                     <div class="login-logo titulo"">
                                    <a href="#" style="color: #dd4b39;">Reportes</a>
                              </div><!-- /.login-logo -->
                              <br>
                              <br>

                       <div class="row">

                           <div class="col-xs-3">
                               <div class="checkbox icheck">
                                   <label>
                                   </label>
                               </div>
                           </div><!-- /.col -->
                           <div class="col-md-6">

                               <div class="box">

                                   <div class="box-body">

                                       <form role="form" action="getReporte.php" enctype="multipart/form-data" method="post" >
                                           <center><h3>Generar resumen de registros por intervalo de fechas</h3></center><br>

                                           <div class="form-group">
                                                <label>Seleccione la fecha inicial</label>
                                                <input type="date" id="fecha1" name="fecha1" class="form-control" required>
                                           </div>

                                           <br>

                                           <div class="form-group">
                                               <label>Seleccione la fecha final</label>
                                               <input type="date" id="fecha2" name="fecha2" class="form-control" required>
                                           </div>

                                           <br>

                                           <button type="submit" class="btn btn-danger btn-block btn-flat" name="csv" value="1">Importar</button>
                                       </form>
                                   </div><!-- /.box-body -->

                               </div><!-- /.box -->

                           </div><!-- /.col -->


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
        <script src="js/plugins/jQuery/jQuery-2.1.3.min.js"></script>
        <!-- jQuery UI 1.11.2 -->
        <script src="js/plugins/jQueryUI/jquery-ui.min.js" type="text/javascript"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button);
        </script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src="js/bootstrap/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App Oculta el menu-->
        <script src="js/app/app.min.js" type="text/javascript"></script>

        <script src="js/alertify.min.js"></script>
        <script src="js/app/main.js" type="text/javascript"></script>

        <?php echo $muestra;?>
    </body>

</html>