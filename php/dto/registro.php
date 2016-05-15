<?php 
class registro{

	private $id;
    private $id_remision;
    private $id_registro;
    private $id_tiquete;
    private $fecha_ingreso;
    private $placa;
    private $conductor;
    private $peso_ingreso;
    private $peso_egreso;
    private $peso_neto;
    private $observaciones;
    private $emp_transporte;
    private $valor_producto;
    private $cliente;

	public function _GET($k){ return $this->$k; }
	public function _SET($k, $v){ return $this->$k = $v; }

}