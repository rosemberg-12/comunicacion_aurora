<?php
require_once 'php/facade/facade.php';


if( isset($_POST['cliente']) && isset($_POST['remision'])&& isset($_POST['registro']) && isset($_POST['tiquete'])&&
    isset($_POST['fecha']) && isset($_POST['placa'])&& isset($_POST['conductor']) && isset($_POST['pesoe'])&&
    isset($_POST['pesos']) && isset($_POST['peson'])&& isset($_POST['observacion']) && isset($_POST['empresat'])&&
    isset($_POST['valorp'])) {

    $facade = new facade();
    echo "entra";
    $cadena=$facade->registrarRegistrosManual($_POST['cliente'],$_POST['remision'], $_POST['registro'], $_POST['tiquete'],
    $_POST['fecha'], $_POST['placa'], $_POST['conductor'], $_POST['pesoe'], $_POST['pesos'], $_POST['peson'], $_POST['observacion'],
    $_POST['empresat'], $_POST['valorp']);

    echo $cadena;

    if($cadena==1)
        header('Location: addRegistros.php?estado=exitoso');
    else{
        header('Location: addRegistros.php?estado='.$cadena);
    }

}

