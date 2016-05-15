<?php 
class cliente_dao{

    public function cambiarContrasena($cliente, $n){

        include('bases.php');

        $consulta= "UPDATE cliente set contrasena=?  where codigo=? ";

        $resul = $base->prepare($consulta);

        $resul->execute(array( $n , $cliente->_GET('codigo') ));

       return true;
        }


    public function cargarClientes(){
        include('bases.php');

        $consulta= "SELECT * FROM cliente ";

        $resul = $base->prepare($consulta);

        $resul->execute();

        $clientes=array();

        foreach ($resul as $row) {

            $cliente=new cliente();

            $cliente->_SET('nombre',$row["nombre"]);
            $cliente->_SET('id',$row["id"]);
            $cliente->_SET('codigo',$row['codigo']);

            $clientes[]=$cliente;
        }

        return $clientes;
    }

    public function validarSesionCliente($cliente){
        include('bases.php');

        $consulta= "SELECT * FROM cliente WHERE cliente.codigo=? AND cliente.contrasena=?";

        $resul = $base->prepare($consulta);

        $resul->execute(array($cliente->_GET('codigo'), $cliente->_GET('contrasena')));

        $i=0;
            foreach ($resul as $row) {
                $cliente->_SET('nombre',$row["nombre"]);
                $cliente->_SET('id',$row["id"]);

                $i++;
            }

            if($i!=0)
            return $cliente;
            else return null;

        }


    public function validarSesionAdmin($cliente){
        include('bases.php');

        $consulta= "SELECT * FROM admin WHERE codigo=? AND contrasena=?";

        $resul = $base->prepare($consulta);

        $resul->execute(array($cliente->_GET('codigo'), $cliente->_GET('contrasena')));

        $i=0;
        foreach ($resul as $row) {
            $cliente->_SET('nombre',$row["nombre"]);
            $cliente->_SET('id',$row["id"]);


            $i++;
        }

        if($i!=0)
            return $cliente;
        else return null;

    }

}