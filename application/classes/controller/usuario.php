<?php
defined('SYSPATH') OR die('No Direct Script Access');
require_once 'application/classes/Parametros.php';
require_once 'application/classes/controller/AppControllerTemplate.php';

/**
  * 
  */
class Controller_Usuario extends App_Controller_Template{
	function __construct($request, $response){
		parent::__construct($request, $response);

		$this->titulo			= "Personas";
		$this->encabezado		= "Persona";
		$this->nombreColumnas	= Array( "Apellido, Nombre", "e-mail", "Habilitado", "Agregar/Quitar Permisos", "Nombre Usuario", "Editar", "Inhabilitar" );
		$this->nombreTabla		= "usuario";
		$this->nombreTablaAsociada	= "user";
		$this->formulario		= "forms/usuarioForm";
		$this->listado			= "lists/usuarioList";
	}

	function action_index(){
		$this->listar( ORM::factory( $this->nombreTabla )->obtenerUsuarios() );
	}

	function action_save(){
		if( $_POST[ "id" ] == null ){
			$objeto = ORM::factory( $this->nombreTabla );
		} else {
			$objeto = ORM::factory( $this->nombreTabla, $_POST[ "id" ] );
		}

		$objeto->nombre = $_POST[ "nombre" ];
		$objeto->apellido = $_POST[ "apellido" ];
		$objeto->domicilio = $_POST[ "domicilio" ];
		$objeto->telefono = $_POST[ "telefono" ];
		$objeto->celular = $_POST[ "celular" ];
		$objeto->email = $_POST[ "email" ];

		$objeto->tipousuario = $objeto->esUsuario;
		$objeto->habilitado = isset( $_POST[ "habilitado" ] ) ? 1 : 0;
		$objeto->idrol = $_POST[ "idrol" ] == 0 ? null : $_POST[ "idrol" ];
        if($_POST[ "iduser" ] == 0){
		    $objeto->iduser = null;
        } else {
            $objeto->iduser = $_POST[ "iduser" ];
            $usuarios = ORM::factory( $this->nombreTabla )->where("iduser", "=", $objeto->iduser);
            if($_POST[ "id" ] != null){
                $usuarios->and_where("idusuario", "!=", $_POST[ "id" ]);
            }
            $enUso = $usuarios->count_all();
            if($enUso > 0) {
                $objeto->addError("El usuario ya está siendo usado en otra persona");
            }
        }

		try {
            if( sizeof( $objeto->getErrores() ) == 0 ) {
                $objeto->save();
            }
		} catch (Exception $e) {
			$objeto->addError( $e->getMessage() );
		}

		if( sizeof( $objeto->getErrores() ) == 0 ) {
			$this->action_index();
		} else {
			$this->irAlFormulario( $objeto, null );
		}
	}

	function action_edit() {
		$parametros = $this->request->param( Parametros::$params );
		$id = Parametros::getValueFromParam( $parametros, Parametros::$params );

		$this->irAlFormulario( ORM::factory( $this->nombreTabla, $id ), null );
	}

	function action_new() {
        $parametros = $this->request->param( Parametros::$params );
        $userid = Parametros::getValueFromParam( $parametros, "userid" );

        $this->irAlFormulario( null, $userid );
	}

    function action_delete( $objeto = null, $listar = true, $listadoFiltrado = null ) {
		parent::action_delete(null, false, null );
		$this->action_index();
	}

	private function irAlFormulario( $objeto, $userid )
	{
		$this->iniciarVistas( $this );
		$this->template = View::factory( 'templates/template' );
		$rol = null;
		$user = null;

		if( $objeto == null ) {
			$objeto = ORM::factory( $this->nombreTabla );
            $user = $userid != null ? ORM::factory($this->nombreTablaAsociada, $userid) : null;
		}
		else
		{
			$rol = $objeto->rol;
			$user = $objeto->user;
		}

		$roles = ORM::factory( $this->nombreTabla )->obtenerRolesHabilitados();
		$users = ORM::factory( $this->nombreTablaAsociada )->find_all();

		$this->visor->setObjeto( $objeto );

		$body = View::factory( $this->formulario )->bind( "visor", $this->visor )->bind( "roles", $roles )->bind( "rol", $rol )->bind( "users", $users )->bind( "user", $user );
		$this->template->head = View::factory( $this->head )->bind( "visor", $this->visorHead );
		$this->template->body = $body;
	}
}
?>