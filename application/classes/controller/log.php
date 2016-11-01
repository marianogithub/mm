<?php
defined('SYSPATH') OR die('No Direct Script Access');
require_once 'application/classes/view/VistaGenerica.php';
require_once 'application/classes/controller/AppControllerTemplate.php';
require_once 'application/classes/security/User.php';
require_once 'application/classes/Parametros.php';

class Controller_Log extends Controller_Template
{
	public $template	= "log/login";	//vista asociada.-
	private $formulario = "log/login";	//vista asociada.-
	private $encabezado		= "Login";
	private $errorLogin		= "";

	function __construct($request, $response) {
		parent::__construct($request, $response);
	}

	function action_index()
	{
		// Load the user information
        try {
        	$user = Auth::instance()->get_user();
        } catch( Exception $e ) {
        	$user = false;
        }
        if($user) {
        	$paginaInicial = ORM::factory( "parametro" )->getPaginaInicial();
        	$paginaInicial = $paginaInicial != null ? $paginaInicial : 'Welcome/index';
            Request::current()->redirect($paginaInicial);
        } else {
			$this->template = new View( $this->formulario );
	
			$visor = new VistaGenerica();
			//titulo de la pagina.-
			//$visor->setTitulo( $this->titulo );
			//encabezado de la pagina.-
			$visor->setEncabezado( $this->encabezado );
			//nombre de este controlador.-
			$visor->setNombreControlador( get_class( $this ) );
	
			$this->template->visor = $visor;
			$this->template->errorLogin = "Fallo el Login";
        }
	}

	function action_loguear() {
		if (HTTP_Request::POST == $this->request->method()) {
            // Attempt to login user
            $remember = array_key_exists('remember', $this->request->post()) ? (bool) $this->request->post('remember') : FALSE;
            Auth::instance()->login($this->request->post('username'), $this->request->post('password'), $remember);
            User::createInstance();
        }

        $this->action_index();
	}

	function action_desloguear() {
		// Log user out

		Auth::instance()->logout();
        User::deleteInstance();
		// Redirect to login page
		$this->errorLogin = "Adios";
		$this->action_index();
	}
}
?>