<?php 
class admin{

	private $id;
	private $nombre;
    private $codigo;
	private $contrasena;
    

    private $mina;
	

	public function _GET($k){ return $this->$k; }
	public function _SET($k, $v){ return $this->$k = $v; }

}