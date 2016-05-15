<?php 
require_once 'php/dao/cliente_dao.php';
require_once 'php/dto/cliente.php';
require_once 'php/dao/novedad_dao.php';
require_once 'php/dto/novedad.php';


class control_novedades{

    public function cargarNovedadesAdmin(){

        $novedad_dao=new novedad_dao();

        $novedades=$novedad_dao->cargarNovedadesGeneral();

        $cadena="";

        foreach($novedades as $row){

            if(strcmp($row->_GET('estado'), "Sin respuesta") == 0){
                $cadena.='<tr bgcolor="#F6CECE">
                <td>'.$row->_GET("id_radicado").'</td>
                <td>'.$row->_GET("fecha").'</td>
                <td>'.$row->_GET("cliente")->_GET('nombre').'</td>
                <td>'.$row->_GET("asunto").'</td>
                <td>'.$row->_GET("estado").'</td>
                <td><a href="ver-mensajesAdmin.php?nombre='.$row->_GET("cliente")->_GET('nombre').'&id_novedad='.$row->_GET('id').'&asunto='.$row->_GET('asunto').'">Ver mensajes</a> </td>
                </tr>';
            }
            elseif(strcmp($row->_GET('estado'), "Atendida") == 0){
                $cadena.='<tr bgcolor="#E3F6CE">
                <td>'.$row->_GET("id_radicado").'</td>
                <td>'.$row->_GET("fecha").'</td>
                <td>'.$row->_GET("cliente")->_GET('nombre').'</td>
                <td>'.$row->_GET("asunto").'</td>
                <td>'.$row->_GET("estado").'</td>
               <td><a href="ver-mensajesAdmin.php?nombre='.$row->_GET("cliente")->_GET('nombre').'&id_novedad='.$row->_GET('id').'&asunto='.$row->_GET('asunto').'">Ver mensajes</a> </td>
               </tr>';
            }

        }

        if(empty($cadena)){
            return "No hay registros";
        }
        return $cadena;

    }

    public function cargarNovedades(){


        $cliente=new cliente();

        $cliente->_SET('id',$_SESSION['id_cliente']);

        $novedad_dao=new novedad_dao();

        $novedades=$novedad_dao->cargarNovedadesCliente($cliente);

        $cadena="";

        foreach($novedades as $row){

            if(strcmp($row->_GET('estado'), "Sin respuesta") == 0){
                $cadena.='<tr bgcolor="#F6CECE">
                <td>'.$row->_GET("id_radicado").'</td>
                <td>'.$row->_GET("fecha").'</td>
                <td>'.$row->_GET("asunto").'</td>
                <td>'.$row->_GET("estado").'</td>
                <td><a href="ver-mensajes.php?id_novedad='.$row->_GET('id').'&asunto='.$row->_GET('asunto').'">Ver mensajes</a> </td>
                </tr>';
            }
            elseif(strcmp($row->_GET('estado'), "Atendida") == 0){
                $cadena.='<tr bgcolor="#E3F6CE">
                <td>'.$row->_GET("id_radicado").'</td>
                <td>'.$row->_GET("fecha").'</td>
                <td>'.$row->_GET("asunto").'</td>
                <td>'.$row->_GET("estado").'</td>
                <td><a href="ver-mensajes.php?id_novedad='.$row->_GET('id').'&asunto='.$row->_GET('asunto').'">Ver mensajes</a> </td>
               </tr>';
            }

        }

        if(empty($cadena)){
            return "No hay registros";
        }
        return $cadena;

    }

    public function registrarNovedad($asunto, $mensaje){

        $novedad_dao=new novedad_dao();

        $cliente= new cliente();

        $cliente->_SET('id',$_SESSION['id_cliente']);

        $radicado= $novedad_dao->getUltimoRadicado($cliente)+1;

        $fecha =date("y")."-".date("m")."-".date("d");

        $estado="Sin respuesta";



        $novedad_dao->registrarNovedad($radicado,$asunto,$estado, $fecha, $cliente);

        $id_novedad= $novedad_dao->getIdNovedad($radicado, $cliente);

        return $this->registrarMensaje($mensaje, $fecha, $id_novedad, 0);


    }

    public function registrarMensaje($mensaje, $fecha, $novedad, $tipo){

        $novedad_dao=new novedad_dao();

        $val= $novedad_dao->registrarMensaje($mensaje, $fecha, $tipo, $novedad);

        if($val==1){
            return $novedad_dao->cambiarEstadoNovedad("Sin respuesta",$novedad);
        }
        else
            return "error";

    }
    public function registrarMensajeAdmin($mensaje, $fecha, $novedad, $tipo){

        $novedad_dao=new novedad_dao();

        $val= $novedad_dao->registrarMensaje($mensaje, $fecha, $tipo, $novedad);

        if($val==1){
            return $novedad_dao->cambiarEstadoNovedad("Atendida",$novedad);
        }
        else
            return "error";

    }

    public function cargarMensajes($id_novedad){

        $novedad_dao=new novedad_dao();

        $mensajes=$novedad_dao->cargarMensajesNovedad($id_novedad);

        $cadena="";
        $usuario="";
        $color="";

        $tamaño=count($mensajes);

        foreach($mensajes as $mensaje){

            if($mensaje->_GET('esAdmin')==1){
                $usuario="Administrador";
                $color="B7B7B7";
            }
            elseif($mensaje->_GET('esAdmin')==0){
                $usuario="Tu";
                $color="DE8B80";
            }
                $cadena.='<div class="example-modal">
                            <div class="modal">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background:#'.$color.';">
                                         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">Mensaje '.$tamaño--.'</span></button>

                                            <h4 class="modal-title">Emisor: '. $usuario.'</h4>
                                        </div>
                                        <div class="modal-header">
                                            <h4 class="modal-title">Fecha: '. $mensaje->_GET('fecha').'</h4>
                                        </div>
                                        <div class="modal-body">
                                            <h4>Mensaje: '. $mensaje->_GET('mensaje').'</h4>
                                        </div>

                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                        </div><!-- /.example-modal -->';


        }
        return $cadena;



    }
    public function cargarMensajesAdmin($id_novedad,$nombres){

        $novedad_dao=new novedad_dao();

        $mensajes=$novedad_dao->cargarMensajesNovedad($id_novedad);

        $cadena="";
        $usuario="";
        $color="";

        $tamaño=count($mensajes);

        foreach($mensajes as $mensaje){

            if($mensaje->_GET('esAdmin')==1){
                $usuario="Administrador";
                $color="B7B7B7";
            }
            elseif($mensaje->_GET('esAdmin')==0){
                $usuario=$nombres;
                $color="DE8B80";
            }
            $cadena.='<div class="example-modal">
                            <div class="modal">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background:#'.$color.';">
                                         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">Mensaje '.$tamaño--.'</span></button>

                                            <h4 class="modal-title">Emisor: '. $usuario.'</h4>
                                        </div>
                                        <div class="modal-header">
                                            <h4 class="modal-title">Fecha: '. $mensaje->_GET('fecha').'</h4>
                                        </div>
                                        <div class="modal-body">
                                            <h4>Mensaje: '. $mensaje->_GET('mensaje').'</h4>
                                        </div>

                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                        </div><!-- /.example-modal -->';


        }
        return $cadena;



    }


}	