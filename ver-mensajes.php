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
$muestra="";
if(isset($_GET['estado'])){
    if(strcmp($_GET['estado'], "exitoso") == 0){
        $muestra= '<script type="text/javascript">alertify.success("Nuevo mensaje insertado correctamente");</script>';
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
            <div class="content-wrapper" >

                <!-- Content Header (Page header) -->
                <br><br><br>


                <!-- Main content -->
                <section class="content">

                    <div class="example-modal">
                        <div class="modal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header" style="background:#DE8B80">
                                        <button type="button"  class="close">
                                            <span>Nuevo Mensaje</span></button>

                                        <h4 class="modal-title">Emisor: Tu</h4>
                                    </div>
                                    <div class="modal-header">
                                        <h4 class="modal-title"><?php echo "Fecha: 20".date("y")."-".date("m")."-".date("d");?></h4>
                                    </div>
                                    <div class="modal-header">
                                        <h4 class="modal-title"><?php echo "Asunto: ".$_GET['asunto'];?></h4>
                                    </div>
                                    <div class="modal-body">

                                        <form action="registrarMensaje.php" method="post" id="registrarMensaje">

                                            <div class="form-group">
                                                <label>Ingrese el mensaje</label>
                                                <textarea maxlength="200" class="form-control" id="mensaje" name="mensaje" required></textarea>
                                            </div>

                                            <div class="row">
                                                <div class="col-xs-8">
                                                    <div class="checkbox icheck">
                                                        <label>
                                                        </label>
                                                    </div>
                                                </div><!-- /.col -->
                                                <div class="col-xs-4">
                                                    <input type="hidden" id="id_novedad" name="id_novedad" value=<?php echo $_GET['id_novedad'];?>>
                                                    <input type="hidden" id="asunto" name="asunto" value=<?php echo $_GET['asunto'];?>>
                                                    <button type="submit" class="btn btn-danger btn-block btn-flat">Enviar</button>
                                                </div><!-- /.col -->
                                            </div>

                                        </form>
                                    </div>

                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                    </div>

                    <?php echo $facade->cargarMensajes($_GET['id_novedad']); ?>


                </section><!-- /.content -->
            </div>

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
        <script src="js/app/app.min.js" type="text/javascript"></script>
        <script src="js/alertify.min.js"></script>
        <script src="js/app/main.js" type="text/javascript"></script>

        <?php echo $muestra;?>
    </body>

</html>