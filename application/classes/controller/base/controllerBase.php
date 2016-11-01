<?php defined('SYSPATH') or die('No direct script access.');

require_once 'application/classes/Parametros.php';
require_once 'application/classes/view/VistaGenerica.php';
require_once 'application/classes/view/VistaHead.php';
require_once 'application/classes/util/menuVista.php';

class ControllerBase extends Controller_Template {
	protected $skipAuth = false;
	protected $visorHead;
	protected $head				= "heads/head";
	protected $titulo;
	private $menus;

    public function __construct(Request $request, Response $response) {
        parent::__construct($request, $response);
    }

	public function before() {
		$permitir = false;
		$user = false;
        try {
        	$user = Auth::instance()->get_user();
        } catch( Exception $e ) {
        	$user = false;
        }

        //si esta logueado
        if( $user == true ) {
        	//buscamos el usuario asociado al user.-
        	$usuarios = ORM::factory( "usuario" )->where( "iduser", "=", $user->id )->and_where( "habilitado", "=", 1 )->find_all();
        	if( $usuarios != null ) {
        		if( sizeof( $usuarios ) == 1 ) {
	        		$usuario = $usuarios[0];
	        		if( !is_null( $usuario->idusuario ) ) {
	        			$usuarioFinal = ORM::factory( "usuario", $usuario->idusuario );
	        			$permisos = $usuarioFinal->obtenerPermisos();
	        			if( !is_null( $permisos ) && sizeof( $permisos ) > 0 ) {
		        			//$this->menus = array( sizeof( $permisos ) );
	        				$this->menus = array();
		        			for( $i = 0; $i < sizeof( $permisos ); $i++ ) {
		        				$this->menus[ $i ] = $permisos[ $i ]->menu;
		        				if( strcmp( $this->menus[ $i ]->codigo, $this->request->controller() ) == 0 ) {
		        					$permitir = true;
		        				}
		        			}
	        			}
	        		}
        		}
        	}
	        $menuVista = MenuVista::getInstance();
	        if( $permitir || $this->skipAuth ) {
	        	$menuVista->setMenus( $this->menus );
	        	return parent::before();
	        } else {
	        	$menuVista->setMenus( null );
	        	Request::current()->redirect( 'Page/notFound' );
	        }
        } else {
        	Request::current()->redirect( 'Log' );
        }
	}
}
?>