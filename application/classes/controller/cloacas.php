<?php
defined('SYSPATH') OR die('No Direct Script Access');
require_once 'application/classes/Parametros.php';
require_once 'application/classes/controller/AppControllerTemplate.php';

/**
  * 
  */
class Controller_Cloacas extends App_Controller_Template {
	function __construct($request, $response) {
		parent::__construct($request, $response);

		$this->titulo			= "Cloacas";
		$this->encabezado		= "Cloacas";
		$this->nombreColumnas	= Array( "Descripción", "Editar", "Eliminar" );
		$this->nombreTabla		= "Cloacas";
		$this->formulario		= "forms/cloacasForm";
		$this->listado			= "lists/cloacasList";
	}

	function action_index() {
		$this->listar();
	}
	function action_save() {
		if( $_POST[ "id" ] == null ) {
			$objeto = ORM::factory( $this->nombreTabla );
		} else {
			$objeto = ORM::factory( $this->nombreTabla, $_POST[ "id" ] );
		}
		$objeto->descripcion = $_POST[ "descripcion" ];

		try {
			$objeto->save();
		} catch (Exception $e) {
			$objeto->addError( $e->getMessage() );
		}

		if( sizeof( $objeto->getErrores() ) == 0 ) {
			$this->listar();
		} else {
			$this->irAlFormulario( $objeto );
		}
	}

	function action_edit() {
		$parametros = $this->request->param( Parametros::$params );
		$id = Parametros::getValueFromParam( $parametros, Parametros::$params );

		$this->irAlFormulario( ORM::factory( $this->nombreTabla, $id ) );
	}
	function action_new() {
		$this->irAlFormulario( null );
	}

	private function irAlFormulario( $objeto ) {
		$this->iniciarVistas( $this );
		$this->template = View::factory( 'templates/template' );

		if( $objeto == null ) {
			$objeto = ORM::factory( $this->nombreTabla );
		}

		$this->visor->setObjeto( $objeto );

		$this->template->head = View::factory( $this->head )->bind( "visor", $this->visorHead );
		$this->template->body = View::factory( $this->formulario )->bind( "visor", $this->visor );
	}
}
?>