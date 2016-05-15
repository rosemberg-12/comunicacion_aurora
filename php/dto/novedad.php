<?php 
class novedad{

	private $id;
    private $id_radicado;
    private $asunto;
    private $estado;
	private $fecha;
    private $cliente;


    private $mina;
	

	public function _GET($k){ return $this->$k; }
	public function _SET($k, $v){ return $this->$k = $v; }

}