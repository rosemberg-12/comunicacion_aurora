<?php

require_once 'php/dto/registro.php';

class registro_dao{

    public function cargarRegistrosCliente($cliente){

        include('bases.php');

        $consulta= "SELECT * FROM registro WHERE id_cliente=?";

        $resul = $base->prepare($consulta);

        $resul->execute(array($cliente->_GET('id')));

        $registros=array();

        foreach ($resul as $row) {

            $registro=new registro();

            $registro->_SET('id_remision',$row['id_remision']);
            $registro->_SET('id_registro',$row['id_registro']);
            $registro->_SET('id_tiquete',$row['id_tiquete']);
            $registro->_SET('fecha_ingreso',$row['fecha_ingreso']);
            $registro->_SET('placa',$row['placa']);
            $registro->_SET('conductor',$row['conductor']);
            $registro->_SET('peso_ingreso',$row['peso_ingreso']);
            $registro->_SET('peso_egreso',$row['peso_egreso']);
            $registro->_SET('peso_neto',$row['peso_neto']);
            $registro->_SET('observaciones',$row['observaciones']);
            $registro->_SET('emp_transporte',$row['emp_transporte']);
            $registro->_SET('valor_producto',$row['valor_producto']);

            $registros[]=$registro;

        }

        return $registros;

    }

    public function cargarRegistrosClienteIntervalo($f1,$f2,$cliente){

        include('bases.php');

        $consulta= "SELECT * FROM registro WHERE id_cliente=? and fecha_ingreso between ? and ? order by fecha_ingreso DESC";

        $resul = $base->prepare($consulta);


        $resul->execute(array($cliente->_GET('id'), $f1, $f2));

        $registros=array();

        foreach ($resul as $row) {

            $registro=new registro();

            $registro->_SET('id_remision',$row['id_remision']);
            $registro->_SET('id_registro',$row['id_registro']);
            $registro->_SET('id_tiquete',$row['id_tiquete']);
            $registro->_SET('fecha_ingreso',$row['fecha_ingreso']);
            $registro->_SET('placa',$row['placa']);
            $registro->_SET('conductor',$row['conductor']);
            $registro->_SET('peso_ingreso',$row['peso_ingreso']);
            $registro->_SET('peso_egreso',$row['peso_egreso']);
            $registro->_SET('peso_neto',$row['peso_neto']);
            $registro->_SET('observaciones',$row['observaciones']);
            $registro->_SET('emp_transporte',$row['emp_transporte']);
            $registro->_SET('valor_producto',$row['valor_producto']);

            $registros[]=$registro;

        }

        return $registros;

    }

    public function registrarRegistro($cliente, $remision, $registro, $tiquete, $fecha, $placa, $conductor
    , $pesoe, $pesos, $peson, $observacion, $empresat, $valorp ){

        include('bases.php');

        $consulta="INSERT INTO registro (id_remision ,id_registro, id_tiquete, fecha_ingreso, placa, conductor, peso_ingreso
        ,peso_egreso, peso_neto, observaciones, emp_transporte, valor_producto, id_cliente) values(?,?,?,?,?,?,?,?,?,?,?,?,?)";

        $resul = $base->prepare($consulta);

        $resul->execute(array(

            $remision,
            $registro,
            $tiquete,
            $fecha,
            $placa,
            $conductor,
            $pesoe,
            $pesos,
            $peson,
            $observacion,
            $empresat,
            $valorp,
            $cliente->_GET("id")

        ));

        return "Registro de registro exitoso";


    }




}