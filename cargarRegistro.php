<?php
require_once 'php/facade/facade.php';

if( isset($_FILES['archivo']) && isset($_POST['cliente']) )
{

	 $facade = new facade();

    $cadena=$facade->registrarRegistrosCSV($_FILES["archivo"], $_POST['cliente']);

	if($cadena==1)
     header('Location: addRegistros.php?estado=exitoso');
    else{
        header('Location: addRegistros.php?estado='.$cadena);
    }
}


