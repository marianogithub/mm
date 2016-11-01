<?php defined('SYSPATH') or die('No direct script access.');
require_once 'application/classes/controller/AppControllerTemplate.php';

class Controller_Welcome extends App_Controller_Template {
	function __construct($request, $response) {
		parent::__construct($request, $response);

		$this->titulo = ORM::factory( "parametro" )->getNombreSistema();
		$this->formulario = "forms/dashboard";
	}

	public function action_index() {
		$this->iniciarVistas( $this );
		$this->template = View::factory( 'templates/template' );
		$this->template->head = View::factory( $this->head )->bind( "visor", $this->visorHead );
		$this->template->body = View::factory( $this->formulario );
	}
} // End Welcome
