<?php
defined('SYSPATH') OR die('No Direct Script Access');
require_once 'application/classes/Parametros.php';
require_once 'application/classes/controller/AppControllerTemplate.php';

/**
  * 
  */
class Controller_Menu extends App_Controller_Template
{
	function __construct($request, $response)
	{
		parent::__construct($request, $response);

		$this->titulo			= "Menu";
		$this->encabezado		= "Menu";
		$this->nombreColumnas	= Array( "Código", "Nombre", "URL", "Tipo Menu", "Visible", "URL Imagen", "Super Menu", "Editar", "Ocultar" );
		$this->nombreTabla		= "menu";
		$this->formulario		= "forms/menuForm";
		$this->listado			= "lists/menuList";
	}

	function action_index() {
		$tiposMenu = ORM::factory( "Tipomenu" )->find_all();
		$listadoMenu = null;
		if(isset($_POST["idTipoMenu"]) && $_POST["idTipoMenu"] != 0) {
			$listadoMenu = ORM::factory( $this->nombreTabla )->getMenusPorTipo($_POST["idTipoMenu"], null);
		}
		$this->listar($listadoMenu);
		$this->template->body->bind( "tiposMenu", $tiposMenu );
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
		$objeto->codigo = $_POST[ "codigo" ];
		$objeto->nombre = $_POST[ "nombre" ];
		$objeto->url = $_POST[ "url" ];
		$objeto->visible = isset( $_POST[ "visible" ] ) ? 1 : 0;
		$objeto->urlimagen = $_POST[ "urlimagen" ];
		$objeto->idtipomenu = isset( $_POST[ "idtipomenu" ] ) ? $_POST[ "idtipomenu" ] : null;
		if( $objeto->idtipomenu == ORM::factory( "Tipomenu" )->administrativo ) {
			$objeto->idpadre = $_POST[ "idpadre" ] == 0 ? null : $_POST[ "idpadre" ];
		} else {
			$objeto->idpadre = null;
		}

		try {
			$objeto->save();
		} catch (Exception $e) {
			$objeto->addError( $e->getMessage() );
		}

		if( sizeof( $objeto->getErrores() ) == 0 ) {
			$this->action_index();
		} else {
			$this->irAlFormulario( $objeto );
		}
	}

	function action_edit()
	{
		$parametros = $this->request->param( Parametros::$params );
		$id = Parametros::getValueFromParam( $parametros, Parametros::$params );

		$this->irAlFormulario( ORM::factory( $this->nombreTabla, $id ) );
	}
	function action_new()
	{
		$this->irAlFormulario( null );
	}

	private function irAlFormulario( $objeto )
	{
		$this->iniciarVistas( $this );
		$this->template = View::factory( 'templates/template' );
		$menu = null;

		if( $objeto == null )
		{
			$objeto = ORM::factory( $this->nombreTabla );
		}
		$menus = ORM::factory( "menu" )->where( "idpadre", "is", NULL )->and_where( "visible", "=", "1" )
			->and_where( "idtipomenu", "=", ORM::factory( "Tipomenu" )->administrativo )->find_all();

		$tiposMenu = ORM::factory( "Tipomenu" )->find_all();
		$this->visor->setObjeto( $objeto );

		$this->template->head = View::factory( $this->head )->bind( "visor", $this->visorHead );
		$this->template->body = View::factory( $this->formulario )->bind( "visor", $this->visor )
			->bind( "menus", $menus )->bind( "tiposMenu", $tiposMenu );
	}
}
?>