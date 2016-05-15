<?php 
require_once 'php/dao/cliente_dao.php';
require_once 'php/dto/cliente.php';
require_once 'php/dao/registro_dao.php';
require_once 'php/dto/registro.php';


class control_clientes{

    public function cargarClientes(){

        $cliente_dao=new cliente_dao();

        $clientes=$cliente_dao->cargarClientes();

        $cadena="";

        foreach($clientes as $row){

            $cadena.='<option value='.$row->_GET('id').'>'.$row->_GET('nombre').'</option>';

        }

        return $cadena;

    }

}	