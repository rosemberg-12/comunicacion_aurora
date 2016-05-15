<?php


class control_reportes{

    public function getReporteFechas($f1,$f2){

        $registro_dao=new registro_dao();

        $cliente=new cliente();

        $cliente->_SET('id',$_SESSION['id_cliente']);

        $registros=$registro_dao->cargarRegistrosClienteIntervalo($f1, $f2, $cliente);

        $vector=$this->getResumen($registros);

        $cadena="";

        foreach($vector as $row){

            list($f,$t,$v) = explode(';',$row);

            $cadena.='<tr>
            <td>'.$f.'</td>
            <td>'.$t.'</td>
            <td>'.$v.'</td>
            </tr>';

        }

        if(empty($cadena)){
            return "No hay registros";
        }
        return $cadena;
    }

    public function getResumen($registros){



        $resumen=array();
        $cantidad=0;
        $toneladas=0;

        $clave=$registros[0]->_GET('fecha_ingreso');


        foreach($registros as $row){

            if(strcmp($row->_GET('fecha_ingreso'), $clave) == 0){
                $toneladas+=$row->_GET('peso_neto');
                $cantidad++;
            }
            else{
                $resumen[]=$clave.";".$toneladas.";".$cantidad;
                $cantidad=1;
                $toneladas=$row->_GET('peso_neto');
                $clave=$row->_GET('fecha_ingreso');
            }

        }

        $resumen[]=$clave.";".$toneladas.";".$cantidad;

        return $resumen;

    }



}	