<?php

session_start();
$t='';
$n='';
$r='active';


if (!isset($_SESSION['id_cliente']))
{
    header('Location: index.php');
    die();
}

require_once 'php/facade/facade.php';
$facade = new facade();
$tabla=$facade->getReporteFechas($_POST['fecha1'], $_POST['fecha2']);

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
                    <!-- Main content -->
        <section class="content">
            <br><br>
            <div class="login-logo titulo" style="color: #fff;">
                                    <a href="#" style="color: #dd4b39;">Reporte entre la
                                        fecha <?php echo $_POST['fecha1']." y ".$_POST['fecha2'] ;?></a>

                              </div><!-- /.login-logo -->
                              <br>
                              <br>
          <div class="row">
            <div class="col-xs-12">
              <div class="box">

                <div class="box-body">
                  <table id="registros" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Fecha</th>
                        <th>Toneladas de ese dia</th>
                        <th>Viajes despachados</th>

                    </thead>
                    <tbody>
<!-- aca va la carga de las labores de la persona en especifico -->
                       <?php echo $tabla;?>
                    </tbody>
                    <tfoot>
                    <th>Fecha</th>
                    <th>Toneladas de ese dia</th>
                    <th>Viajes despachados</th>


                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
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

        <!-- Cosas de la tabla -->
        <script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js" type="text/javascript"></script>

        <!-- Cosas de los botones -->
        <script src="https://cdn.datatables.net/buttons/1.1.2/js/dataTables.buttons.min.js" type="text/javascript"></script>
        <script src="https://cdn.datatables.net/buttons/1.1.2/js/buttons.colVis.min.js" type="text/javascript"></script>
        <script src="https://cdn.datatables.net/buttons/1.1.2/js/buttons.html5.min.js" type="text/javascript"></script>

        <script src="js/jszip.js" type="text/javascript"></script>
    </body>

</html>