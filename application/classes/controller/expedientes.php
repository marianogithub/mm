<?php
defined('SYSPATH') OR die('No Direct Script Access');
require_once 'application/classes/Parametros.php';
require_once 'application/classes/controller/base/expedientesbase.php';
require_once 'application/classes/util/dateUtil.php';
require_once 'application/classes/security/User.php';

/**
  * 
  */
class Controller_Expedientes extends Controller_Expedientesbase {
	function __construct($request, $response) {
		parent::__construct($request, $response);

		$this->titulo			= "Expedientes";
		$this->encabezado		= "Expedientes";
        $this->nombreColumnas	= Array(    "Nº Expediente", "Titular",
                                            "Obras Solicitadas", "Adicionales de Obra",
                                            "Inspecciones Solicitadas",
                                            "Movimientos de Expediente", "Observaciones",
                                            "Factibilidad",
                                            "Aforo",
                                            "<br>");
		//$this->nombreTabla		= "expedientes";
		//$this->formulario		= "forms/expedientesBase";
		//$this->listado			= "lists/expedientesList";
		$this->puedeGuardar = false;
		$this->puedeEliminar = false;
	}

	function action_index($objeto = null) {
		$titularFiltro = isset($_POST[ "titularFiltro"]) ? $_POST[ "titularFiltro"] : "";
		$expnumeroFiltro = isset($_POST[ "expnumeroFiltro"]) ? $_POST[ "expnumeroFiltro"] : "";
		$distritoFiltro = isset($_POST[ "distritoFiltro"]) ? $_POST[ "distritoFiltro"] : "";
		$this->listar(ORM::factory($this->nombreTabla)->getExpedientesSolicitados($titularFiltro, $expnumeroFiltro, $distritoFiltro));

		$distritos = $this->getDistritos();
		$this->template->body
			->bind( "titularFiltro", $titularFiltro )
			->bind( "expnumeroFiltro", $expnumeroFiltro )
			->bind( "distritoFiltro", $distritoFiltro )
			->bind( "distritos", $distritos );

		if($objeto != null) {
			$this->visor->setObjeto($objeto);
		}
	}

	function action_edit() {
		$parametros = $this->request->param( Parametros::$params );
		$id = Parametros::getValueFromParam( $parametros, Parametros::$params );

		$this->irAlFormulario( ORM::factory( $this->nombreTabla, $id ) );
	}

    function action_delete( $objeto = null, $listar = true, $listadoFiltrado = null ) {
		$this->action_index($objeto);
	}
	function action_new() {
		$this->action_index(null);
	}
}
?>