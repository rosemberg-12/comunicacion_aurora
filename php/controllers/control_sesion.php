<?php
require_once 'php/dao/cliente_dao.php';
require_once 'php/dto/cliente.php';
class control_sesion{

    public function cambiarContrasena($codigo_cliente, $contrasena, $nueva_contrasena){

        $cliente_dao=new cliente_dao();

        $cliente=new cliente();

        $cliente->_SET("codigo",$codigo_cliente);
        $cliente->_SET("contrasena", $contrasena);

        $cliente=$cliente_dao->validarSesionCliente($cliente);


        if($cliente!=null){

           return $cliente_dao->cambiarContrasena($cliente, $nueva_contrasena);


        }
        return null;

    }

    public function iniciarSesionCliente($cliente){


        $cliente_dao=new cliente_dao();

        $cliente=$cliente_dao->validarSesionCliente($cliente);

        if($cliente!=null){
           session_start();
            $_SESSION['id_cliente']=$cliente->_GET('id');
            $_SESSION['codigo_cliente']=$cliente->_GET('codigo');
            $_SESSION['nombre_cliente']=$cliente->_GET('nombre');

            return true;
        }

        else{
            return null;
        }


    }


    public function iniciarSesionAdmin($cliente){


        $cliente_dao=new cliente_dao();

        $cliente=$cliente_dao->validarSesionAdmin($cliente);

        if($cliente!=null){
            session_start();
            $_SESSION['id_admin']=$cliente->_GET('id');
            $_SESSION['codigo_admin']=$cliente->_GET('codigo');
            $_SESSION['nombre_admin']=$cliente->_GET('nombre');

            return true;
        }

        else{
            return null;
        }


    }

}	