<?php

session_start();
$t='';
$n='';

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

                    <div class="login-logo titulo" style="color: #fff;">
                        <a href="#" style="color: #dd4b39;">Registro manual</a>
                    </div><!-- /.login-logo -->
                    <!-- Incluir aqui el contenido-->
                    <div class="box" style="width: 70%; margin: 3% auto;">


                        <div class="box-header">

                        </div><!-- /.box-header -->
                        <div class="login-box-body">
                            <form role="form" action="cargarRegistroManual.php" method="post">

                                <!-- text input -->

                                <label>Seleccione el cliente al cual se asignará los registros</label>
                                <select class="form-control"  id="cliente" name="cliente" required>
                                    <?php echo $facade->cargarClientes();?>
                                </select>
                                <br>

                                <div class="form-group">
                                    <label>Numero de remision</label>
                                    <input type="number" class="form-control" placeholder="Numero de remision" id="remision" name="remision" required>
                                </div>


                                <div class="form-group">
                                    <label>Id del registro</label>
                                    <input type="number" class="form-control" placeholder="Id del registro" id="registro" name="registro" required>
                                </div>

                                <div class="form-group">
                                    <label>Numero de tiquete</label>
                                    <input type="number" class="form-control" placeholder="Numero de tiquete" id="tiquete" name="tiquete" required>
                                </div>

                                <div class="form-group">
                                    <label>Fecha de entrada</label>
                                    <input type="date" class="form-control" id="fecha" name="fecha" required>
                                </div>
                                <div class="form-group">
                                    <label>Placa</label>
                                    <input type="text" class="form-control" placeholder="Placa" id="placa" name="placa" required>
                                </div>

                                <div class="form-group">
                                    <label>Conductor</label>
                                    <input type="text" class="form-control" placeholder="Nombre del conductor" id="conductor" name="conductor" required>
                                </div>

                                <div class="form-group">
                                    <label>Peso de entrada</label>
                                    <input type="number" step="any" class="form-control" placeholder="Peso de entrada" id="pesoe" name="pesoe" required>
                                </div>

                                <div class="form-group">
                                    <label>Peso de salida</label>
                                    <input type="number" step="any" class="form-control" placeholder="Peso de salida" id="pesos" name="pesos" required>
                                </div>

                                <div class="form-group">
                                    <label>Peso Neto</label>
                                    <input type="number" step="any" class="form-control" placeholder="Peso neto" id="peson" name="peson" required>
                                </div>


                                <div class="form-group">
                                    <label>Observaciones</label>
                                    <input type="text" class="form-control" placeholder="Observaciones" id="observacion" name="observacion" required>
                                </div>

                                <div class="form-group">
                                    <label>Empresa transportadora</label>
                                    <input type="text" class="form-control" placeholder="Empresa transportadora" id="empresat" name="empresat" required>
                                </div>

                                <div class="form-group">
                                    <label>Valor del producto</label>
                                    <input type="text" class="form-control" placeholder="Valor del producto" id="valorp" name="valorp" required>
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