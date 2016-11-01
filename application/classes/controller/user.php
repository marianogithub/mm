<?php
defined('SYSPATH') OR die('No Direct Script Access');
require_once 'application/classes/Parametros.php';
require_once 'application/classes/controller/AppControllerTemplate.php';

/**
  * 
  */
class Controller_User extends App_Controller_Template
{
	private $iduser = null;

	function __construct($request, $response)
	{
		parent::__construct($request, $response);

		$this->titulo			= "Usuarios";
		$this->encabezado		= "Usuario";
		$this->nombreColumnas = Array( "Nombre Usuario", "e-mail", "Ultimo Login", "Roles", "Persona", "Editar", "Inhabilitar" );
		$this->nombreTabla	= "user";
		$this->nombreTablaAsociada = "role";
		$this->formulario		= "forms/userForm";
		$this->listado		= "lists/userList";
		$this->iduser			= null;
	}

	function action_index(){
		$this->listar();
	}
	function action_save() {
		$user = null;
		if( $_POST[ "id" ] == null ) {
			// Create the user using form values
			$user = ORM::factory($this->nombreTabla);
		} else {
			$user = ORM::factory($this->nombreTabla, $_POST[ "id" ]);
		}
		$password = trim($_POST[ "password" ]);
		$password_confirm = trim($_POST[ "password_confirm" ]);
		$user->username = trim($_POST[ "username" ]);
		$user->password = $password;
		$user->email = trim($_POST[ "email" ]);

		$this->validarUser($user, $password, $password_confirm);

		try {
			if( sizeof( $user->getErrores() ) == 0 ) {
				$user->save();
				$user->ok();
			} else {
				$user->noOk();
			}
		} catch (Exception $e) {
			$user->addError( $e->getMessage() );
			$user->noOk();
		}

		if( $user->esOk() ) {
			$this->listar();
		} else {
			$this->irAlFormulario( $user );
		}

		/*try {
			if( $_POST[ "id" ] == null ) {
				// Create the user using form values
				$user->create_user($this->request->post(), array( 'username', 'password', 'email' ));
			} else {
				$user->update_user($this->request->post(), array( 'username', 'password', 'email' ));
			}
			$user->ok();
		}
		catch( ORM_Validation_Exception $e ){
			$user->addError( "Falló al guardar el usuario: $user->username" );
            $user->addError( $e->getMessage() );
			$user->noOk();
		}*/


	}

	function action_edit()
	{
		$parametros = $this->request->param( Parametros::$params );
		$id = Parametros::getValueFromParam( $parametros, Parametros::$params );

		$this->irAlFormulario( ORM::factory( $this->nombreTabla, $id ) );
	}
	function action_new() {
		$this->irAlFormulario( null );
	}

    function action_delete( $objeto = null, $listar = true, $listadoFiltrado = null ) {
        $parametros = $this->request->param( Parametros::$params );
        $id = Parametros::getValueFromParam( $parametros, Parametros::$params );
        if($id != null && $id > 1){
            $user = ORM::factory( $this->nombreTabla, $id );
            if($user->pk() != null) {
                $roles = ORM::factory($this->nombreTablaAsociada)->find_all();
                foreach( $roles as $rol ) {
                    $user->remove( 'roles', $rol );
                }
            }
        }
        $this->action_index();
    }

	private function irAlFormulario( $objeto ) {
		$this->iniciarVistas( $this );
		$this->template = View::factory( 'templates/template' );

		if( $objeto == null )
		{
			$objeto = ORM::factory( $this->nombreTabla );
		}

		$this->visor->setObjeto( $objeto );

		$this->template->head = View::factory( $this->head )->bind( "visor", $this->visorHead );
		$this->template->body = View::factory( $this->formulario )->bind( "visor", $this->visor );
	}

	function action_mostrarrol()
	{
		//PARTE GENÉRICA
		$this->template = View::factory( 'templates/template' );
		if( $this->iduser == null )
		{
			$parametros = $this->request->param( Parametros::$params );
			$id = Parametros::getValueFromParam( $parametros, Parametros::$params );
		}
		else
		{
			$id = $this->iduser;
		}
		$objeto = ORM::factory( $this->nombreTabla, $id );

		$this->visor = new VistaGenerica();
		$this->visorHead = new VistaHead();
		//tÃ­tulo de la pagina.-
		$this->visorHead->setTitulo( "Roles" );
		//encabezado de la pagina.-
		$this->visor->setEncabezado( $objeto->username );
		//columnas de la tabla.-
		$this->visor->setNombreColumnas( $this->nombreColumnas );
		//nombre de este controlador.-
		$this->visor->setNombreControlador( get_class( $this ) );

		$rolesAsignados = $objeto->roles->find_all();
		$roles = ORM::factory( $this->nombreTablaAsociada );
		$primero = true;
		foreach( $rolesAsignados as $value )
		{
			if( $primero )
			{
				$roles->where( "id", "!=", $value->id );
			}
			else
			{
				$roles->and_where( "id", "!=", $value->id );
			}
			$primero = false;
		}
		$roles = $roles->find_all();
		$this->visor->setObjeto( $objeto );

		$this->template->head = View::factory( $this->head )->bind( "visor", $this->visorHead );
		$this->template->body = View::factory( "forms/agregarrol" )->bind( "visor", $this->visor )->bind( "rolesAsignados", $rolesAsignados )->bind( "roles", $roles );
	}

	public function action_agregarrol()
	{
		$id = $_POST[ "id" ];
		$user = ORM::factory( $this->nombreTabla, $id );

		$idRol = $_POST[ "idrol" ];
		$rol = ORM::factory( $this->nombreTablaAsociada, $idRol );

		$user->add( 'roles', $rol );

		$this->iduser = $id;
		$this->action_mostrarrol();
	}

	public function action_quitarrol()
	{
		$id = $_POST[ "id" ];
		$user = ORM::factory( $this->nombreTabla, $id );

		$idRol = $_POST[ "idrol" ];
		$rol = ORM::factory( $this->nombreTablaAsociada, $idRol );

		$user->remove( 'roles', $rol );

		$this->iduser = $id;
		$this->action_mostrarrol();
	}

	/**
	 * @param $user
	 */
	private function validarUser($user, $password, $password_confirm)
	{
		if(strcmp('', $user->username) == 0) {
			$user->addError( 'El nombre de usuario es obligatorio.' );
		}

		if(strcmp('', $user->email) == 0) {
			$user->addError( 'El email es obligatorio.' );
		}

		if(strcmp('', $password) == 0) {
			$user->addError( 'Password obligatoria.' );
		} else if(strcmp('', $password_confirm) == 0) {
			$user->addError( 'Confirmar Password obligatoria.' );
		} else {
			if(strcmp($password, $password_confirm) != 0) {
				$user->addError( 'Password y Confirmar son distintas.' );
			}
		}
	}
}
?>