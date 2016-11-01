<?php
defined('SYSPATH') OR die('No Direct Script Access');
require_once 'application/classes/Parametros.php';
require_once 'application/classes/controller/AppControllerTemplate.php';
require_once 'application/classes/util/dateUtil.php';
require_once 'application/classes/security/User.php';

/**
  * 
  */
class Controller_Cargarexpediente extends App_Controller_Template {
	function __construct($request, $response) {
		parent::__construct($request, $response);

		$this->titulo			= "";
		$this->encabezado		= "";
		$this->nombreColumnas	= Array();
	}

	function action_index() {
		$parametros = $this->request->param( Parametros::$params );
		$id = Parametros::getValueFromParam( $parametros, Parametros::$params );
		$tipo = Parametros::getValueFromParam( $parametros, "tipo" );

		User::getInstance()->addExpedienteAdmin($id);

		if( !is_null($tipo) && strcmp("2", $tipo) == 0 ) {
			//Request::current()->redirect("Expedientes");
		} else {
			//Request::current()->redirect("Temporales");
		}
	}

	function action_edit() {
	}
	function action_save() {
	}
    function action_delete( $objeto = null, $listar = true, $listadoFiltrado = null ) {
	}
	function action_new() {
	}
}
?>