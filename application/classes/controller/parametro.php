<?php
defined('SYSPATH') OR die('No Direct Script Access');
require_once 'application/classes/controller/AppControllerTemplate.php';

/**
  * 
  */
class Controller_Parametro extends App_Controller_Template {

	function __construct($request, $response) {
		parent::__construct($request, $response);

		$this->titulo			= "Parametros";
		$this->encabezado		= "Parametro";
		$this->nombreColumnas = Array( "Nombre", "Valor", "Descripcion", "Editar", "Eliminar" );
		$this->nombreTabla		= "parametro";
		$this->formulario		= "forms/parametroForm";
		$this->listado			= "lists/parametroList";
	}

	function action_index() {
		$this->listar();
	}

	function action_save()
	{
		if( $_POST[ "id" ] == null )
		{
			$objeto = ORM::factory( $this->nombreTabla );
		}
		else
		{
			$objeto = ORM::factory( $this->nombreTabla, $_POST[ "id" ] );
		}
		$objeto->nombre = $_POST[ "nombre" ];
		$objeto->valor = $_POST[ "valor" ];
		$objeto->descripcion = $_POST[ "descripcion" ];

		$objeto->save();

		$this->listar();
	}

	function action_edit()
	{
		$parametros = $this->request->param( Parametros::$params );
		$id = Parametros::getValueFromParam( $parametros, Parametros::$params );

		$this->irAlFormulario( $id );
	}

	function action_new() {
		$this->irAlFormulario( null );
	}

	private function irAlFormulario( $id )
	{
		$this->iniciarVistas( $this );
		$this->template = View::factory( 'templates/template' );

		if( $id == null )
		{
			$objeto = ORM::factory( $this->nombreTabla );
		}
		else
		{
			$objeto = ORM::factory( $this->nombreTabla, $id );
		}

		$this->visor->setObjeto( $objeto );

		$this->template->head = View::factory( $this->head )->bind( "visor", $this->visorHead );
		$this->template->body = View::factory( $this->formulario )->bind( "visor", $this->visor );
	}
}
?>