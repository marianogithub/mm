<?php
defined('SYSPATH') OR die('No Direct Script Access');
require_once 'application/classes/Parametros.php';
require_once 'application/classes/controller/AppControllerTemplate.php';
require_once 'application/classes/security/User.php';

/**
  * 
  */
class Controller_Administracion extends App_Controller_Template
{
	function __construct($request, $response)
	{
		parent::__construct($request, $response);

		$this->titulo			= "Administración";
		$this->encabezado		= "Administración";
		$this->nombreColumnas	= null;
		$this->nombreTabla		= "menu";
		$this->formulario		= "forms/administracionForm";
	}

	function action_index() {
		$this->iniciarVistas( $this );
		$this->template = View::factory( 'templates/template' );
		$tipoAdministrativo = ORM::factory( "Tipomenu" )->administrativo;

		$usuario = User::getInstance()->getUsuario();
		$idusuario = $usuario->idusuario;	//por defecto, busca los permisos del usuario.-
		//si tiene rol, buscamos los permisos del rol.-
		if( !is_null( $usuario->idrol ) ) {
			$idusuario = ( $usuario->rol->habilitado == 1 ) ? $usuario->idrol : null;
		}
		$menus = array();
		$superPermiso = array();
		$supermenus = ORM::factory( "menu" )->where( "idpadre", "is", NULL )->and_where( "visible", "=", "1" )
			->and_where( "idtipomenu", "=", $tipoAdministrativo )->find_all();

		if( sizeof($supermenus) > 0 ){
			$idsupermenus = array();
			for( $i = 0; $i < sizeof($supermenus); $i++ ) {
				$idsupermenus[ $i ] = $supermenus[ $i ]->idmenu;
			}

			$permisosSuperMenu = ORM::factory( "permiso" )->where( "idusuario", "=", $idusuario )
				->and_where( "idmenu", "IN", $idsupermenus )->order_by( "orden", "ASC" )->find_all();
			if( sizeof($permisosSuperMenu) > 0 ){
				for( $i = 0; $i < sizeof( $permisosSuperMenu ); $i++ ) {
					$superPermiso[ $i ] = $permisosSuperMenu[ $i ]->menu;
				}
			}
		}

		if( sizeof($superPermiso) > 0 ){
			for( $i = 0; $i < sizeof($superPermiso); $i++ ) {
				$supermenu = $superPermiso[ $i ];
				$menus[ $i ] = $supermenu;
				$submenus = ORM::factory( "menu" )->where( "idpadre", "=", $supermenu->idmenu )->and_where( "visible", "=", "1" )
					->and_where( "idtipomenu", "=", $tipoAdministrativo )->find_all();

				if( sizeof( $submenus ) > 0 ) {
					$idsubmenus = array();
					for( $j = 0; $j < sizeof($submenus); $j++ ) {
						$idsubmenus[ $j ] = $submenus[ $j ]->idmenu;
					}

					$permisos = ORM::factory( "permiso" )->where( "idusuario", "=", $idusuario )
						->and_where( "idmenu", "IN", $idsubmenus )->order_by( "orden", "ASC" )->find_all();

					$submenusFinal = array();
					for( $k = 0; $k < sizeof( $permisos ); $k++ ) {
						$submenusFinal[ $k ] = $permisos[ $k ]->menu;
					}
					$menus[ $i ]->setSubmenus( $submenusFinal );
				}
			}
		}
		$this->visor->setObjeto( $menus );

		$this->template->head = View::factory( $this->head )->bind( "visor", $this->visorHead );
		$this->template->body = View::factory( $this->formulario )->bind( "visor", $this->visor );
	}
}
?>