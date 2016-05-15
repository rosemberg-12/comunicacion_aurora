<?php

require_once 'php/dto/novedad.php';
require_once 'php/dto/mensaje.php';

class novedad_dao{

    public function cambiarEstadoNovedad($nuevo,$novedad){

            include('bases.php');

            $consulta="UPDATE novedad SET estado=? WHERE id=?";

            $resul = $base->prepare($consulta);

            return $resul->execute(array($nuevo, $novedad ));

    }

    public function getUltimoRadicado($cliente){

        include('bases.php');
        $consulta="SELECT max(id_radicado) FROM novedad where id_cliente=?";

        $resul = $base->prepare($consulta);

        $resul->execute(array($cliente->_GET('id')));

        $radicado="";

        foreach ($resul as $row) {

            $radicado=$row[0];

        }

        if(empty($radicado)){
            $radicado=0;
        }

        return $radicado;

    }



    public function getIdNovedad($radicado, $cliente){

        include('bases.php');

        $consulta="SELECT id FROM novedad where id_cliente=? and id_radicado=?";

        $resul = $base->prepare($consulta);

        $resul->execute(array($cliente->_GET('id'), $radicado));

        $radicado="";

        foreach ($resul as $row) {

            $radicado=$row[0];

        }

        return $radicado;

    }

    public function cargarNovedadesGeneral(){

        include('bases.php');

        $consulta= "SELECT novedad.id, novedad.id_radicado, novedad.asunto, novedad.estado, novedad.fecha, cliente.nombre
         FROM novedad, cliente WHERE novedad.id_cliente= cliente.id ";

        $resul = $base->prepare($consulta);

        $resul->execute(array());

        $novedades=array();

        foreach ($resul as $row) {

            $novedad=new novedad();
            $cliente=new cliente();

            $novedad->_SET('id',$row['id']);
            $novedad->_SET('id_radicado',$row['id_radicado']);
            $novedad->_SET('asunto',$row['asunto']);
            $novedad->_SET('estado',$row['estado']);
            $novedad->_SET('fecha',$row['fecha']);
            $cliente->_SET('nombre',$row['nombre']);

            $novedad->_SET('cliente', $cliente);
            $novedades[]=$novedad;

        }

        return $novedades;

    }

    public function cargarNovedadesCliente($cliente){

        include('bases.php');

        $consulta= "SELECT * FROM novedad WHERE id_cliente=? order by id ";

        $resul = $base->prepare($consulta);

        $resul->execute(array($cliente->_GET('id')));

        $novedades=array();

        foreach ($resul as $row) {

            $novedad=new novedad();

            $novedad->_SET('id',$row['id']);
            $novedad->_SET('id_radicado',$row['id_radicado']);
            $novedad->_SET('asunto',$row['asunto']);
            $novedad->_SET('estado',$row['estado']);
            $novedad->_SET('fecha',$row['fecha']);

            $novedades[]=$novedad;

        }

        return $novedades;

    }

    public function registrarNovedad($radicado, $asunto,$estado, $fecha, $cliente ){

        include('bases.php');

        $consulta="INSERT INTO novedad (id_radicado, asunto, estado, fecha, id_cliente) values(?,?,?,?,?)";

        $resul = $base->prepare($consulta);

         return $resul->execute(array(

            $radicado,
            $asunto,
            $estado,
            $fecha,
            $cliente->_GET("id")

        ));

    }

    public function registrarMensaje($mensaje, $fecha, $tipo, $novedad){

        include('bases.php');

        $consulta="INSERT INTO mensaje (mensaje, fecha, es_admin, id_novedad) values(?,?,?,?)";

        $resul = $base->prepare($consulta);

        return $resul->execute(array(  $mensaje,
            $fecha,
            $tipo,
            $novedad,

        ));

    }

    public function cargarMensajesNovedad($id_novedad){

        include('bases.php');

        $consulta= "SELECT * FROM mensaje WHERE id_novedad=? ORDER BY id DESC ";

        $resul = $base->prepare($consulta);

        $resul->execute(array($id_novedad));

        $mensajes=array();

        foreach ($resul as $row) {

            $mensaje=new mensaje();

            $mensaje->_SET('id',$row['id']);
            $mensaje->_SET('mensaje',$row['mensaje']);
            $mensaje->_SET('fecha',$row['fecha']);
            $mensaje->_SET('esAdmin',$row['es_admin']);

            $mensajes[]=$mensaje;

        }

        return $mensajes;

    }




}