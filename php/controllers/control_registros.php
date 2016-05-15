<?php 
require_once 'php/dao/cliente_dao.php';
require_once 'php/dto/cliente.php';
require_once 'php/dao/registro_dao.php';
require_once 'php/dto/registro.php';


class control_registros{

    public function cargarRegistros(){


        $cliente=new cliente();

        $cliente->_SET('id',$_SESSION['id_cliente']);

        $registro_dao=new registro_dao();

        $registros=$registro_dao->cargarRegistrosCliente($cliente);

        $cadena="";

        foreach($registros as $row){

            $cadena.='<tr>
            <td>'.$row->_GET("id_remision").'</td>
            <td>'.$row->_GET("id_registro").'</td>
            <td>'.$row->_GET("id_tiquete").'</td>
            <td>'.$row->_GET("fecha_ingreso").'</td>
            <td>'.$row->_GET("placa").'</td>
            <td>'.$row->_GET("conductor").'</td>
            <td>'.$row->_GET("peso_ingreso").'</td>
            <td>'.$row->_GET("peso_egreso").'</td>
             <td>'.$row->_GET("peso_neto").'</td>
            <td>'.$row->_GET("observaciones").'</td>
            <td>'.$row->_GET("emp_transporte").'</td>
            <td>'.$row->_GET("valor_producto").'</td>
            </tr>';

        }

        if(empty($cadena)){
            return "No hay registros";
        }
        return $cadena;

    }

    public function registrarRegistrosManual($id_cliente, $remision, $registro, $tiquete, $fecha, $placa, $conductor
        , $pesoe, $pesos, $peson, $observacion, $empresat, $valorp ){

        $cliente=new cliente();

        $cliente->_SET('id',$id_cliente);

        $registro_dao= new registro_dao();

        try{ $registro_dao->registrarRegistro($cliente, $remision, $registro, $tiquete, $fecha, $placa, $conductor
            , $pesoe, $pesos, $peson, $observacion, $empresat, $valorp );

            return true;
        }catch (Exception $e){
              return "Se presentó un error y no se pudo cargar el registro";
        }


    }


    public function registrarRegistrosCSV($archivo, $id_cliente){

        $contador=0;

        $cliente=new cliente();

        $cliente->_SET('id',$id_cliente);

        if (isset($archivo) && is_uploaded_file($archivo['tmp_name'])) {

            $fp = fopen($archivo['tmp_name'], "r");
            while (!feof($fp)){

                $data  = explode(";", fgets($fp));

                if( ( !isset($data[0]) || !isset($data[1]) || !isset($data[2]) || !isset($data[3]) || !isset($data[4]) || !isset($data[5]) || !isset($data[6]) || !isset($data[7]) ||
                    !isset($data[8]) || !isset($data[9]) || !isset($data[10]) || !isset($data[11]) || count($data)>12 ) ){

                    return "Ha ocurrido un error en el proceso, se procesó solo hasta la linea ".$contador." , revise el archivo CSV";

                }

                $registro_dao= new registro_dao();

                list($d,$m,$y) = explode('/',$data[3]);
                $fecha = "$y-$m-$d";

                    $registro_dao->registrarRegistro($cliente, $data[0],$data[1],$data[2], $fecha,
                        $data[4],$data[5],str_replace(',','.',$data[6]), str_replace(',','.',$data[7]),str_replace(',','.',$data[8]),$data[9],$data[10], $data[11]);

                    $contador+=1;


            }
            return true;

        } else
            return "El archivo no ha cargado correctamente, vuelva a intentarlo";

    }

}	