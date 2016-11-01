<?php
defined('SYSPATH') OR die('No Direct Script Access');
require_once 'application/classes/Parametros.php';
require_once 'application/classes/controller/AppControllerTemplate.php';
require_once 'application/classes/util/dateUtil.php';

/**
  * 
  */
class Controller_Consultaobservaciones extends App_Controller_Template {

	function __construct($request, $response) {
		parent::__construct($request, $response);

		$this->titulo			= "Consulta de Observaciones";
		$this->encabezado		= "Consulta de Observaciones";
		$this->nombreColumnas	= Array();
		$this->nombreTabla		= "";
		//$this->formulario		= "forms/inspeccionesForm";
		$this->listado			= "lists/consultaObservacionesList";
	}

	function action_index() {
		$this->template = View::factory( 'templates/template' );
		$this->iniciarVistas( $this );
		$this->template->head = View::factory( $this->head )->bind( "visor", $this->visorHead );
		$this->template->body = View::factory( $this->listado )->bind( "visor", $this->visor );

		$idgremioobs = isset($_POST[ "idgremioobs"]) && $_POST[ "idgremioobs"] != 0 ? $_POST[ "idgremioobs"] : null;
		$idsectoroficial = isset($_POST[ "idsectoroficial"]) && $_POST[ "idsectoroficial"] != 0 ? $_POST[ "idsectoroficial"] : null;
		$idobservacionoficial = isset($_POST[ "idobservacionoficial"]) && $_POST[ "idobservacionoficial"] != 0 ? $_POST[ "idobservacionoficial"] : null;
		$iddescripcion = isset($_POST[ "iddescripcion"]) && $_POST[ "iddescripcion"] != 0 ? $_POST[ "iddescripcion"] : null;
		$iddetalle = isset($_POST[ "iddetalle"]) && $_POST[ "iddetalle"] != 0 ? $_POST[ "iddetalle"] : null;

		$gremioObservaciones = ORM::factory( "Gremioobservacion" )->find_all();
		$sectoroficial = array();
		$observacionoficial = array();
		$descripcionoficial = array();
		$detalle = array();

		if($idgremioobs != null) {
			$sectoroficial = $this->consultar("idsector", "nombre", "sectoroficial", "idgremioobs", $idgremioobs);
			if($idsectoroficial != null) {
				$observacionoficial = $this->consultar("idobservacion", "nombre", "observacionoficial", "idsectoroficial", $idsectoroficial);
				if($idobservacionoficial != null) {
					$descripcionoficial = $this->consultar("iddescripcion", "nombre", "descripcionoficial", "idobservacionoficial", $idobservacionoficial);
					if($iddescripcion != null) {
						$detalle = $this->consultar("iddetalle", "nombre", "detalle", "iddescripcion", $iddescripcion);
					}
				}
			}
		}

		$this->template->body
			->bind( "idgremioobs", $idgremioobs )
			->bind( "idsectoroficial", $idsectoroficial )
			->bind( "idobservacionoficial", $idobservacionoficial )
			->bind( "iddescripcion", $iddescripcion )
			->bind( "iddetalle", $iddetalle )
			->bind( "gremioObservaciones", $gremioObservaciones )
			->bind( "sectoroficial", $sectoroficial )
			->bind( "observacionoficial", $observacionoficial )
			->bind( "descripcionoficial", $descripcionoficial )
			->bind( "detalle", $detalle );
	}

	private function consultar($idColumna, $nombreColumna, $tabla, $fk, $idFk) {
		$resultado = array();

		if($idFk != null) {
			$resultado =  DB::select($idColumna,$nombreColumna)
				->from($tabla)
				->where($fk, '=', $idFk)
				->execute();
		}

		return $resultado;
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