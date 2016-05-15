<?php 
class mensaje{

	private $id;
    private $mensaje;
	private $fecha;
    private $esAdmin;
    private $novedad;


    private $mina;
	

	public function _GET($k){ return $this->$k; }
	public function _SET($k, $v){ return $this->$k = $v; }

}