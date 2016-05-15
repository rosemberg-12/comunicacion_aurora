<?php
require_once 'php/facade/facade.php';

if( isset($_POST['asunto']) && isset($_POST['novedad']) )
{
    session_start();
	 $facade = new facade();

    $cadena=$facade->registrarNovedad($_POST['asunto'], $_POST['novedad']);

	if($cadena==1)
     header('Location: verNovedades.php?estado=exitoso');
    else{
        header('Location: verNovedades.php?estado='.$cadena);
    }
}


