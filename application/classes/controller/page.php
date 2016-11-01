<?php
defined('SYSPATH') OR die('No Direct Script Access');
require_once 'application/classes/controller/AppControllerTemplate.php';

class Controller_Page extends App_Controller_Template
{

	function __construct($request, $response) {
		parent::__construct($request, $response);
		$this->titulo			= "No se encontro la pagina";
		$this->encabezado		= "No se encontro la pagina";
		$this->nombreColumnas	= Array();
		$this->nombreTabla		= "";
		$this->formulario = "log/notFound";
		$this->skipAuth = true;
	}

	function action_notFound() {
		$this->iniciarVistas( $this );
		$this->template = View::factory( 'templates/template' );

		$this->template->head = View::factory( $this->head )->bind( "visor", $this->visorHead );
		$this->template->body = View::factory( $this->formulario )->bind( "visor", $this->visor );
	}
}
?>