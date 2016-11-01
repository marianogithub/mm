<?php
defined('SYSPATH') OR die('No Direct Script Access');
require_once 'application/classes/Parametros.php';
require_once 'application/classes/controller/base/expedientesbase.php';
require_once 'application/classes/security/User.php';

/**
  * 
  */
class Controller_Expedientesadmin extends Controller_Expedientesbase {
	function __construct($request, $response) {
		parent::__construct($request, $response);

		$this->titulo			= "Administración de Expedientes";
		$this->encabezado		= "Administración de Expedientes";
		$this->nombreColumnas	= Array(    "Nº Expediente", "Titular",
                                            "Obras Solicitadas", "Adicionales de Obra",
                                            "Inspecciones Solicitadas",
											"Movimientos de Expediente", "Observaciones",
                                            "Factibilidad",
                                            "Aforo",
                                            "<br>", "<br>");
		//$this->nombreTabla		= "expedientes";
		//$this->formulario		= "forms/expedientesBase";
		$this->listado			= "lists/expedientesAdminList";
		$this->puedeGuardar = true;
		$this->puedeEliminar = true;
        $this->puedeModificarExpediente = true;
        $this->puedeEliminarExpediente = true;
	}

	function action_index($objeto = null) {
		$definitivo = isset($_POST[ "definitivo"]) ? $_POST[ "definitivo"] : "2";
		$titularFiltro = isset($_POST[ "titularFiltro"]) ? $_POST[ "titularFiltro"] : "";
		$expnumeroFiltro = isset($_POST[ "expnumeroFiltro"]) ? $_POST[ "expnumeroFiltro"] : "";
		$distritoFiltro = isset($_POST[ "distritoFiltro"]) ? $_POST[ "distritoFiltro"] : "";
		$this->listar(ORM::factory($this->nombreTabla)->getExpedientes($definitivo,$titularFiltro,$expnumeroFiltro,$distritoFiltro));

		$distritos = $this->getDistritos();
		$this->template->body
			->bind( "definitivo", $definitivo )
			->bind( "titularFiltro", $titularFiltro )
			->bind( "expnumeroFiltro", $expnumeroFiltro )
			->bind( "distritoFiltro", $distritoFiltro )
			->bind( "distritos", $distritos )
            ->bind( "puedeEliminarExpediente", $this->puedeEliminarExpediente );

		if($objeto != null) {
			$this->visor->setObjeto($objeto);
		}
	}

	protected function obtenerObjeto($id) {
		$objeto = null;

		if($id == null) {
			$objeto = ORM::factory( $this->nombreTabla );
			$usuario = User::getInstance()->getUsuario();
			$objeto->idusuario = $usuario->idusuario;
		} else {
			$objeto = ORM::factory($this->nombreTabla, $id);
		}

		return $objeto;
	}
}
?>