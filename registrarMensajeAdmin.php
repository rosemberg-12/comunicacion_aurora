<?php
require_once 'php/facade/facade.php';

if( isset($_POST['mensaje']) && isset($_POST['id_novedad']) && isset($_POST['asunto']) )
{
    session_start();
	 $facade = new facade();

    $fecha=date("y")."-".date("m")."-".date("d");

    $cadena=$facade->registrarMensajeAdmin($_POST['mensaje'], $fecha, $_POST['id_novedad']);

    if($cadena==1)
        header('Location: ver-mensajesAdmin.php?estado=exitoso&id_novedad='.$_POST['id_novedad'].'&asunto='.$_POST['asunto'].'&nombre='.$_POST['nombre'].'');
    else{
        header('Location: verNovedadesAdmin.php?estado='.$cadena);
    }
}



