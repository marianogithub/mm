<?php
defined('SYSPATH') OR die('No Direct Script Access');
require_once 'application/classes/Parametros.php';
require_once 'application/classes/controller/AppControllerTemplate.php';
require_once 'application/classes/security/User.php';

/**
  * 
  */
class Controller_Expedientesbase extends App_Controller_Template {
	protected $puedeGuardar = false;
	protected $puedeEliminar = false;
    protected $puedeGuardarExpediente = false;
    protected $puedeEliminarExpediente = false;
	function __construct($request, $response) {
		parent::__construct($request, $response);

		$this->titulo			= "";
		$this->encabezado		= "";
		$this->nombreColumnas	= Array("");
		$this->nombreTabla		= "expedientes";
		$this->formulario		= "forms/expedientesBase";
		$this->listado			= "lists/expedientesList";
		$this->puedeGuardar = false;
		$this->puedeEliminar = false;
        $this->puedeModificarExpediente = false;
        $this->puedeEliminarExpediente = false;
	}

	function action_index($objeto = null) {
		if($objeto != null) {
			$this->visor->setObjeto($objeto);
		}
	}

    function action_delete( $objeto = null, $listar = true, $listadoFiltrado = null ) {
		if($this->puedeEliminar) {
			$parametros = $this->request->param( Parametros::$params );
			$id = Parametros::getValueFromParam( $parametros, Parametros::$params );

			$objeto = $this->obtenerObjeto($id);
            //si puede eliminar expediente o es un expediente temporal...
            if($this->puedeEliminarExpediente || $objeto->definitivo == 0) {
				$this->verificarRelaciones($objeto);
				if(sizeof( $objeto->getErrores() ) == 0) {
			    	$objeto->delete();
				}
            }
		}

		$this->action_index($objeto);
	}

	function action_save() {
        $idExpediente = $_POST["id"];
		$objeto = $this->obtenerObjeto($idExpediente);	//buscamos el objeto para guardar.-
        //si tiene permisos para guardar...
		if($this->puedeGuardar) {
            //si no tiene permisos para modificar un expediente, mostramos un msj de error...
            if (!$this->puedeModificarExpediente && $idExpediente != null && $objeto->definitivo == 1) {
                $objeto->addError("No tiene permisos para modificar un expediente definitivo");
            }
			if( sizeof( $objeto->getErrores() ) == 0 ) {
				$formulariosPermitidos = $this->buscarFormularios();	//buscamos los formularios para saber que datos guardar.-
				if(sizeof($formulariosPermitidos) > 0){
					foreach($formulariosPermitidos as $formularioPermitido) {
						$codigoActual = $formularioPermitido->codigo;
						try {
							include "application/classes/controller/entity/expediente/" . $codigoActual . ".php";
						} catch (Exception $e) {
							$objeto->addError("No existe el archivo para: " . $codigoActual . " - ". $e->getMessage());
						}
					}
				} else {
					$objeto->addError("No tiene permisos para ningun formulario de expediente");
				}
			}
		} else {
			$objeto->addError("No tiene permisos para guardar el expediente");
		}

		$this->guardarObjeto($objeto);		//guardar objeto
	}

	function action_edit() {
		$parametros = $this->request->param( Parametros::$params );
		$id = Parametros::getValueFromParam( $parametros, Parametros::$params );

		$this->irAlFormulario( ORM::factory( $this->nombreTabla, $id ) );
	}

	function action_new() {
		$this->irAlFormulario( null );
	}

	protected function obtenerObjeto($id) {
		$objeto = ORM::factory( $this->nombreTabla );
		return $objeto;
	}

	private function buscarFormularios() {
		$formulariosPermitidos = array();
		$usuario = User::getInstance()->getUsuario();
		if(!is_null($usuario)) {
			$idusuario = $usuario->getIdUsuarioParaPermisos();
				
			if(!is_null($idusuario)) {
				$formulariosCreados = ORM::factory( "menu" )->getMenusExpediente();
				if(sizeof($formulariosCreados) > 0) {
					$idFormularios = array();
					foreach ($formulariosCreados as $formularioCreado) {
						array_push($idFormularios, $formularioCreado->idmenu);
					}
						
					$permisosMenusExpedientes = ORM::factory( "permiso" )->where( "idusuario", "=", $idusuario )
					->and_where( "idmenu", "IN", $idFormularios )->order_by( "orden", "ASC" )->find_all();
					if(!is_null($permisosMenusExpedientes)) {
						foreach( $permisosMenusExpedientes as $permisoMenuExpediente ) {
							array_push($formulariosPermitidos, $permisoMenuExpediente->menu);
						}
					}
				}
			}
		}

		return $formulariosPermitidos;
	}

	private function guardarObjeto($objeto) {
		try {
			if( sizeof( $objeto->getErrores() ) == 0 ) {
				$objeto->save();
			}
		} catch (Exception $e) {
			$objeto->addError( $e->getMessage() );
		}
	
		if( sizeof( $objeto->getErrores() ) == 0 ) {
			$this->action_index($objeto);
		} else {
			$this->irAlFormulario( $objeto );
		}
	}

	protected function getDistritos() {
		return ORM::factory( "distritos" )->find_all();
	}

	protected function irAlFormulario( $objeto ) {
		$this->iniciarVistas( $this );
		$this->template = View::factory( 'templates/template' );

		if( $objeto == null ) {
			$objeto = ORM::factory( $this->nombreTabla );
		}

		$this->visor->setObjeto( $objeto );
		$distritos = $this->getDistritos();

		$body = View::factory($this->formulario)
			->bind("visor", $this->visor)
			->bind("puedeGuardar", $this->puedeGuardar)
			->bind("distritos", $distritos);
		$this->template->head = View::factory( $this->head )->bind( "visor", $this->visorHead );
		$this->template->body = $body;
	}

	private function verificarRelaciones($objeto) {
		if($objeto->getCantidadInspecciones() != 0) {
			$objeto->addError("Tiene inspecciones asociadas.");
		}

		if($objeto->getCantidadObras() != 0) {
			$objeto->addError("Tiene obras asociadas.");
		}

		if($objeto->getCantidadAdicionales() != 0) {
			$objeto->addError("Tiene adicionales asociados.");
		}

		if($objeto->getCantidadMovimientos() != 0) {
			$objeto->addError("Tiene movimientos asociados.");
		}

		if($objeto->getCantidadObservaciones() != 0) {
			$objeto->addError("Tiene observaciones asociadas.");
		}

		if($objeto->getCantidadFactibilidad() != 0) {
			$objeto->addError("Tiene factibilidad asociada.");
		}
	}
}
?>