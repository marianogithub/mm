<?php
defined('SYSPATH') OR die('No Direct Script Access');
require_once 'application/classes/Parametros.php';
require_once 'application/classes/view/VistaGenerica.php';
require_once 'application/classes/view/VistaHead.php';
require_once 'application/classes/controller/AppControllerTemplate.php';

/**
  * 
  */
class Controller_Permiso extends App_Controller_Template
{
	private $idusuario = null;

	function __construct($request, $response)
	{
		parent::__construct($request, $response);

		$this->titulo		= "Permisos para ";
		$this->encabezado	= "Permiso";
		$this->nombreTabla	= "permiso";
		$this->formulario	= "forms/permisoForm";
	}

	function action_index()
	{
		$this->template = View::factory( 'templates/template' );

		$parametros = $this->request->param( Parametros::$params );
		if( $this->idusuario == null )
		{
			$id = Parametros::getValueFromParam( $parametros, Parametros::$params );
		}
		else
		{
			$id = $this->idusuario;
		}

		$usuario = ORM::factory( "usuario", $id );

		$permisos = $usuario->obtenerPermisos();
		$menus = $usuario->obtenerMenuesNoAsignados();

		$visor = new VistaGenerica();
		$visorHead = new VistaHead();
		//título de la página.-
		$visorHead->setTitulo( $this->titulo . $usuario->nombre );
		//encabezado de la página.-
		$visor->setEncabezado( $this->encabezado );
		//columnas de la tabla.-
		$visor->setNombreColumnas( "" );
		//nombre de este controlador.-
		$visor->setNombreControlador( get_class( $this ) );

		$this->template->head = View::factory( $this->head )->bind( "visor", $visorHead );
		$this->template->body = View::factory( $this->formulario )->bind( "visor", $visor )->bind( "permisos", $permisos )->bind( "usuario", $usuario )->bind( "menus", $menus );
	}

	function action_save()
	{
		$permiso = ORM::factory( $this->nombreTabla );

		if( isset( $_POST[ "idmenu" ] ) ) {
			$permiso->idusuario = $_POST[ "idusuario" ];
			$permiso->idmenu = $_POST[ "idmenu" ];
			$permiso->orden = strcmp( "", $_POST[ "orden" ] ) == 0 ? 1 : $_POST[ "orden" ];

			$permiso->save();
		}

		$this->idusuario = $_POST[ "idusuario" ];
		$this->action_index();
	}

    function action_delete( $objeto = null, $listar = true, $listadoFiltrado = null ) {
		$parametros = $this->request->param( Parametros::$params );
		$id = Parametros::getValueFromParam( $parametros, Parametros::$params );

		$objeto = ORM::factory( $this->nombreTabla, $id );
		$this->idusuario = $objeto->idusuario;
		$objeto->delete();

		$this->action_index();
	}
}
?>