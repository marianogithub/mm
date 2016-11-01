<?php
defined('SYSPATH') OR die('No Direct Script Access');
require_once 'application/classes/Parametros.php';
require_once 'application/classes/controller/AppControllerTemplate.php';
require_once 'application/classes/util/dateUtil.php';

/**
  * 
  */
class Controller_Inspeccionesreporte extends App_Controller_Template {
	function __construct($request, $response) {
		parent::__construct($request, $response);

		$this->titulo			= "Inspecciones Solicitadas";
		$this->encabezado		= "Inspecciones Solicitadas";
		$this->nombreColumnas	= Array( "Fecha Solicitada", "Fecha Efectiva Insp.", "Gremio", "Tipo Inspección", "Nivel",
				"Cartel de Obra", "Sector", "Comentarios", "Total/Parcial", "Estado", "Inspector");
		$this->nombreTabla		= "inspecciones";
		$this->listado			= "reporte/inspeccionesHTML";
	}

	function action_index() {
		$fechaInicial = isset($_POST[ "fechaInicial"]) ? $_POST[ "fechaInicial"] : "";
		$fechaFinal = isset($_POST[ "fechaFinal"]) ? $_POST[ "fechaFinal"] : "";
		$distritoFiltro = isset($_POST[ "distritoFiltro"]) ? $_POST[ "distritoFiltro"] : "";
		$this->listar(ORM::factory($this->nombreTabla)->filtrarInspeccionesSolicitadas($fechaInicial, $fechaFinal, $distritoFiltro));

		$distritos = ORM::factory( "distritos" )->find_all();;
		$this->template->body
			->bind( "fechaInicial", $fechaInicial )
			->bind( "fechaFinal", $fechaFinal )
			->bind( "distritoFiltro", $distritoFiltro )
			->bind( "distritos", $distritos );
		/*if( $this->idExpediente == null ) {
			$parametros = $this->request->param( Parametros::$params );
			$this->idExpediente = Parametros::getValueFromParam( $parametros, Parametros::$params );
		}*/
	}

	protected function obtenerExpediente($idExpediente) {
		return null;
	}

	function action_save() {
		$this->action_index();
	}

	function action_edit() {
		$this->action_index();
	}

	function action_new() {
		$this->action_index();
	}

    function action_delete( $objeto = null, $listar = true, $listadoFiltrado = null ) {
		$this->action_index();
	}
}
?>