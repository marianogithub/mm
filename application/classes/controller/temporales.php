<?php
defined('SYSPATH') OR die('No Direct Script Access');
require_once 'application/classes/Parametros.php';
require_once 'application/classes/controller/base/expedientesbase.php';
require_once 'application/classes/util/dateUtil.php';
require_once 'application/classes/security/User.php';

/**
  * 
  */
class Controller_Temporales extends Controller_Expedientesbase {
	function __construct($request, $response) {
		parent::__construct($request, $response);

		$this->titulo			= "Datos Cargados";
		$this->encabezado		= "Datos Cargados";
		$this->nombreColumnas	= Array(    "Titular",
                                            "Obras Solicitadas", "Adicionales de Obra",
                                            "Factibilidad", "Aforo",
                                            "<br>", "<br>", "<br>" );
		//$this->nombreTabla		= "expedientes";
		//$this->formulario		= "forms/expedientesBase";
		$this->listado			= "lists/temporalesList";
		$this->puedeGuardar = true;
		$this->puedeEliminar = true;
	}

	function action_index($objeto = null) {
		$titularFiltro = isset($_POST[ "titularFiltro"]) ? $_POST[ "titularFiltro"] : "";
		//$expnumeroFiltro = isset($_POST[ "expnumeroFiltro"]) ? $_POST[ "expnumeroFiltro"] : "";
		$distritoFiltro = isset($_POST[ "distritoFiltro"]) ? $_POST[ "distritoFiltro"] : "";
		$this->listar(ORM::factory($this->nombreTabla)->getTemporalesSolicitados(
				$titularFiltro, $distritoFiltro));

		$distritos = $this->getDistritos();
		$this->template->body
			->bind( "titularFiltro", $titularFiltro )
			//->bind( "expnumeroFiltro", $expnumeroFiltro )
			->bind( "distritoFiltro", $distritoFiltro )
			->bind( "distritos", $distritos );

		if($objeto != null) {
			$this->visor->setObjeto($objeto);
		}
	}

	protected function obtenerObjeto($id) {
		$objeto = null;

		if($id == null) {
			$objeto = ORM::factory( $this->nombreTabla );
			$objeto->definitivo = 0;
			$usuario = User::getInstance()->getUsuario();
			$objeto->idusuario = $usuario->idusuario;
			//$objeto->fecha = date( DateUtil::$formatoFechaBD );
		} else {
			$objeto = ORM::factory($this->nombreTabla, $id);
			if($objeto->definitivo == 1) {
				$objeto->addError("No se puede editar un expediente definitivo");
			}
		}

		return $objeto;
	}
}
?>