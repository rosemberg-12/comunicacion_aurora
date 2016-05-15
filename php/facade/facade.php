<?php
require_once 'php/controllers/control_sesion.php';
require_once 'php/controllers/control_registros.php';
require_once 'php/controllers/control_clientes.php';
require_once 'php/controllers/control_novedades.php';
require_once 'php/controllers/control_reportes.php';


class facade{

    public function getReporteFechas($f1, $f2){

        $control=new control_reportes();

        return $control->getReporteFechas($f1,$f2);


}

    public function iniciarSesionCliente($codigo, $pass){

        $cliente=new cliente();

        $cliente->_SET("codigo",$codigo);
        $cliente->_SET("contrasena",$pass);

        $control=new control_sesion();

        return $control->iniciarSesionCliente($cliente);

    }
    public function iniciarSesionAdmin($codigo, $pass){

        $cliente=new cliente();

        $cliente->_SET("codigo",$codigo);
        $cliente->_SET("contrasena",$pass);

        $control=new control_sesion();

        return $control->iniciarSesionAdmin($cliente);

    }

    public function cargarRegistros(){

        $contro=new control_registros();

        return $contro->cargarRegistros();
    }

    public function cargarClientes(){

        $contro=new control_clientes();

        return $contro->cargarClientes();
    }

    public function registrarRegistrosCSV($archivo, $cliente){
        $contro=new control_registros();

        return $contro->registrarRegistrosCSV($archivo, $cliente);
    }

    public function registrarRegistrosManual($cliente, $remision, $registro, $tiquete, $fecha, $placa, $conductor
        , $pesoe, $pesos, $peson, $observacion, $empresat, $valorp ){

        $contro=new control_registros();

        return $contro->registrarRegistrosManual($cliente, $remision, $registro, $tiquete, $fecha, $placa, $conductor
            , $pesoe, $pesos, $peson, $observacion, $empresat, $valorp );

    }

    public function cargarNovedades(){
        $contro=new control_novedades();

        return $contro->cargarNovedades();
    }
    public function cargarNovedadesAdmin(){
        $contro=new control_novedades();

        return $contro->cargarNovedadesAdmin();
    }

    public function registrarNovedad($asunto, $mensaje){
        $contro=new control_novedades();

        return $contro->registrarNovedad($asunto, $mensaje);

    }

    public function cargarMensajes($id_novedad){
        $contro=new control_novedades();

        return $contro->cargarMensajes($id_novedad);
    }

    public function cargarMensajesAdmin($id_novedad, $nombre){
        $contro=new control_novedades();

        return $contro->cargarMensajesAdmin($id_novedad, $nombre);
    }

    public function registrarMensajeCliente($mensaje, $fecha, $novedad){
        $contro=new control_novedades();

        return $contro->registrarMensaje($mensaje, $fecha, $novedad, 0);
}
    public function registrarMensajeAdmin($mensaje, $fecha, $novedad){
        $contro=new control_novedades();

        return $contro->registrarMensajeAdmin($mensaje, $fecha, $novedad, 1);
    }

    public function cambiarContrasena($codigo_cliente, $contrasena, $nueva_contrasena){

        $contra=new control_sesion();
        return $contra->cambiarContrasena($codigo_cliente, $contrasena, $nueva_contrasena);

    }


}