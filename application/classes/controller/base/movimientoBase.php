<?php
defined('SYSPATH') OR die('No Direct Script Access');
require_once 'application/classes/Parametros.php';
require_once 'application/classes/controller/AppControllerTemplate.php';

/**
  * 
  */
class Controller_MovimientoBase extends App_Controller_Template {
	private $idExpediente = null;
	protected $urlVolver = null;

	function __construct($request, $response) {
		parent::__construct($request, $response);

		$this->titulo			= "Movimientos de Expediente";
		$this->encabezado		= "Movimientos";
		$this->nombreColumnas	= Array(
				"Responsable",
				"Origen",
				"Fecha Ingreso",
				"Fecha Salida",
				"Destino",
				"Fecha Egreso",
				"Resultado",
				"Foja",
				"Comentarios");
		$this->ayudaColumnas	= Array(
				"Encargado de manejar el expediente",
				"Oficina donde ingresó el expediente",
				"Fecha en la que ingreso el expediente",
				"Fecha en la que se terminó de revisar el expediente",
				"Oficina donde se envió el expediente",
				"Fecha en la que el expediente pasó a otra oficina",
				null, null, null);
		$this->nombreTabla		= "movimiento";
		//$this->formulario		= "forms/inspeccionesForm";
		$this->listado			= "lists/movimientoList";
	}

	function action_index() {
		if( $this->idExpediente == null ) {
			$parametros = $this->request->param( Parametros::$params );
			$this->idExpediente = Parametros::getValueFromParam( $parametros, Parametros::$params );
		}
		$expediente = $this->obtenerExpediente($this->idExpediente);
		$this->listar(ORM::factory($this->nombreTabla)->getMovimientos($this->idExpediente));

		$this->template->body
			->bind( "expediente", $expediente )
			->bind( "idexpte", $this->idExpediente )
			->bind("ayudaColumnas", $this->ayudaColumnas)
			->bind( "controllerVolver", $this->urlVolver );
	}

	protected function obtenerExpediente($idExpediente) {
		return null;
	}

	function action_save() {
		$this->action_index();
	}
    function action_delete( $objeto = null, $listar = true, $listadoFiltrado = null ) {
		$this->action_index();
	}
	function action_edit() {
		$this->action_index();
	}
	function action_new() {
		$this->action_index();
	}
}
?>