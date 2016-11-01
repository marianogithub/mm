<?php
defined('SYSPATH') OR die('No Direct Script Access');
require_once 'application/classes/Parametros.php';
require_once 'application/classes/controller/AppControllerTemplate.php';

/**
  * 
  */
class Controller_Rol extends App_Controller_Template
{
	function __construct($request, $response)
	{
		parent::__construct($request, $response);

		$this->titulo			= "Roles";
		$this->encabezado		= "Rol";
		$this->nombreColumnas = Array( "Nombre", "Habilitado", "Agregar/Quitar Permiso", "Editar", "Inhabilitar" );
		$this->nombreTabla	= "usuario";
		$this->formulario		= "forms/rolForm";
		$this->listado		= "lists/rolList";
	}

	function action_index()
	{
		$this->listar( ORM::factory( $this->nombreTabla )->obtenerRoles() );
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
		$objeto->habilitado = isset( $_POST[ "habilitado" ] ) ? 1 : 0;
		$objeto->tipousuario = $objeto->esRol;

		$objeto->apellido = null;
		$objeto->domicilio = null;
		$objeto->telefono = null;
		$objeto->celular = null;
		$objeto->email = null;
		$objeto->idrol = null;
		$objeto->iduser = null;

		$objeto->save();

		$this->action_index();
	}

	function action_edit()
	{
		$parametros = $this->request->param( Parametros::$params );
		$id = Parametros::getValueFromParam( $parametros, Parametros::$params );

		$this->irAlFormulario( $id );
	}

	function action_new()
	{
		$this->irAlFormulario( null );
	}

    function action_delete( $objeto = null, $listar = true, $listadoFiltrado = null ) {
		parent::action_delete( null, false, null );
		$this->action_index();
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