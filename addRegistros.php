<?php

session_start();
$t='';
$n='';
$muestra="";
if (!isset($_SESSION['id_admin']))
{
    header('Location: admin.php');
    die();
}
if (isset($_SESSION['id_cliente']))
{
    header('Location: indexUser.php');
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
              include('html/headerIndex.php');
            ?>

            <!-- aca va la barra lateral -->
            <?php
              include('html/barraLateralAdmin.php');
            ?>

            <!-- Columna derecha. contiene navbar y la ruta de la pagina -->
            <div class="content-wrapper inicio">
                <!-- Encabezado -->
                

                <!-- Contenido Principal de la pagina -->
                <section class="content">
                    <!-- Incluir aqui el contenido-->
                     <br>
                     <div class="login-logo titulo"">
                                    <a href="#" style="color: #dd4b39;">Registro</a>
                              </div><!-- /.login-logo -->
                              <br>
                              <br>

                       <div class="row">


                           <div class="col-md-6">

                               <div class="box">

                                   <div class="box-body">

                                       <form role="form" action="cargarRegistro.php" enctype="multipart/form-data" method="post" >
                                           <center><h3>Añadir registros por archivo CSV</h3></center><br>
                                           <center><h4>El formato de la fecha (año-mes-dia), use (.) no (,)</h4></center>
                                         <!--  <center><h4>(# remisión, id registro, # tiquete, fecha ingreso(año-mes-dia),
                                                   placa, conductor, peso entrada, peso salida, peso neto, observacion, empresa transportadora, valor producto )</h4></center>
-->
                                           <label>Seleccione el cliente al cual se asignará los registros</label>
                                           <select class="form-control"  id="cliente" name="cliente" required>
                                               <?php echo $facade->cargarClientes();?>
                                           </select>
                                           <br><br>
                                           <label>Seleccione el archivo a cargar</label>
                                           <br><input name="archivo" type="file" id="archivo" accept=".csv" required><br>

                                           <button type="submit" class="btn btn-info btn-block btn-flat" name="csv" value="1">Importar</button>
                                       </form>
                                   </div><!-- /.box-body -->

                               </div><!-- /.box -->

                           </div><!-- /.col -->

                           <div class="col-md-6">
                               <div class="small-box bg-red">
                                   <div class="inner">
                                       <h2>Realizar registro manual</h2>
                                       <br>
                                   </div>
                                   <div class="icon">
                                       <i class="ion ion-ios-folder-outline"></i>
                                   </div>

                                   <a href="addRegistroManual.php" class="small-box-footer">
                                       Acceder <i class="fa fa-arrow-circle-right"></i>
                                   </a>
                               </div>
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