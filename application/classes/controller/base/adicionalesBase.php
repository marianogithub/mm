<?php
defined('SYSPATH') OR die('No Direct Script Access');
require_once 'application/classes/Parametros.php';
require_once 'application/classes/controller/AppControllerTemplate.php';

/**
  * 
  */
class AdicionalesBase extends App_Controller_Template {
	protected $idExpediente = null;
	protected $urlVolver = null;
    protected $urlVolverLabel = "Volver a Expedientes";
	protected $isAdmin = false;

	function __construct($request, $response) {
		parent::__construct($request, $response);

		$this->titulo			= "Adicionales de Obra";
		$this->encabezado		= "Adicionales de Obra";
		$this->nombreColumnas	= Array("Permiso y Reparación Rotura", "Adicional Eléctrico", "Agua", "Cloacas",
                                        "Nº Recibo", "Aforos",
                                        "Editar", "Eliminar");
		$this->nombreTabla		= "adicionales";
		$this->formulario		= "forms/adicionalesForm";
		$this->listado			= "lists/adicionalesList";

		$this->isAdmin = false;
	}

	function action_index() {
		if( $this->idExpediente == null ) {
			$parametros = $this->request->param( Parametros::$params );
			$this->idExpediente = Parametros::getValueFromParam( $parametros, Parametros::$params );
		}
		$expediente = $this->obtenerExpediente($this->idExpediente);
		$this->listar(ORM::factory($this->nombreTabla)->getAdicionalesSolicitados($this->idExpediente));

		$this->template->body
			->bind( "expediente", $expediente )
			->bind( "idexpte", $this->idExpediente )
			->bind( "controllerVolver", $this->urlVolver )
            ->bind( "controllerVolverLabel", $this->urlVolverLabel );
	}

    protected function obtenerExpediente($idExpediente) {
        return ORM::factory("expedientes")->getExpediente($idExpediente);
    }

	function action_save() {
		if( $_POST[ "id" ] == null ) {
			$objeto = ORM::factory( $this->nombreTabla );
			$objeto->montopermiso = null;
            $objeto->montoreposicion = null;
            $objeto->montoobraadicional = null;
            $objeto->montoagua = null;
            $objeto->montocloacas = null;
		} else {
			$objeto = ORM::factory( $this->nombreTabla, $_POST[ "id" ] );
		}
        if($this->isAdmin) {
            //$objeto->montopermiso = isset($_POST[ "montopermiso" ]) ? $_POST[ "montopermiso" ] : null;
            //$objeto->montoreposicion = isset($_POST[ "montoreposicion" ]) ? $_POST[ "montoreposicion" ] : null;
            //$objeto->montoobraadicional = isset($_POST[ "montoobraadicional" ]) ? $_POST[ "montoobraadicional" ] : null;
            //$objeto->montoagua = isset($_POST[ "montoagua" ]) ? $_POST[ "montoagua" ] : null;
            //$objeto->montocloacas = isset($_POST[ "montocloacas" ]) ? $_POST[ "montocloacas" ] : null;
            $objeto->numerorecibo = isset($_POST[ "numerorecibo" ]) ? $_POST[ "numerorecibo" ] : "";
            $objeto->numerorecibo = strcmp(trim($objeto->numerorecibo), "") == 0 ? null : $objeto->numerorecibo;
        }

		if(isset($_POST[ "idexpte"])) {
			$objeto->expediente = $_POST[ "idexpte" ];
			$expediente = $this->obtenerExpediente($objeto->expediente);
			if($expediente == null) {
				$objeto->addError( "El expediente no es valido" );
			}
		} else {
			$objeto->addError( "El expediente es oblitatorio" );
		}
        //permiso
		if(isset($_POST[ "idpermiso" ]) && $_POST[ "idpermiso" ] > 0) {
			$objeto->idpermiso = $_POST[ "idpermiso" ];
		} else {
            $objeto->idpermiso = null;
		}
        $objeto->mlpermiso = $_POST[ "mlpermiso" ];
        //reposicion
        //$objeto->montoreposicion = null;
        $objeto->idreposicion = null;
        $objeto->mlreposicion = null;
        /*if(isset($_POST[ "idreposicion" ])) {
            $objeto->idreposicion = $_POST[ "idreposicion" ];
        } else {
            $objeto->addError( "La reparación es obligatoria" );
        }
        $objeto->mlreposicion = $_POST[ "mlreposicion" ];
        */
        //obra adicional
        if(isset($_POST[ "idobrasadicional" ]) && $_POST[ "idobrasadicional" ] > 0) {
            $objeto->idobrasadicional = $_POST[ "idobrasadicional" ];
        } else {
            $objeto->idobrasadicional = null;
        }
        $objeto->unidadobraadicional = $_POST[ "unidadobraadicional" ];
        //agua
        if(isset($_POST[ "idagua" ]) && $_POST[ "idagua" ] > 0) {
            $objeto->idagua = $_POST[ "idagua" ];
        } else {
            $objeto->idagua = null;
        }
        $objeto->unidadagua = $_POST[ "unidadagua" ];
        //cloacas
        if(isset($_POST[ "idcloacas" ]) && $_POST[ "idcloacas" ] > 0) {
            $objeto->idcloacas = $_POST[ "idcloacas" ];
        } else {
            $objeto->idcloacas = null;
        }
        $objeto->unidadcloacas = $_POST[ "unidadcloacas" ];

		try {
			if( sizeof( $objeto->getErrores() ) == 0 ) {
				$objeto->save();
			}
		} catch (Exception $e) {
			$objeto->addError( $e->getMessage() );
		}

		if( sizeof( $objeto->getErrores() ) == 0 ) {
			$this->idExpediente = $objeto->expediente;
            $this->redirigirAlListado("/index/id=" . $objeto->expediente);
		} else {
			$this->irAlFormulario( $objeto );
		}
	}

	function action_edit() {
		$parametros = $this->request->param( Parametros::$params );
		$id = Parametros::getValueFromParam( $parametros, Parametros::$params );

		$this->irAlFormulario( ORM::factory( $this->nombreTabla, $id ) );
	}

	function action_new() {
		$parametros = $this->request->param( Parametros::$params );
		$this->idExpediente = Parametros::getValueFromParam( $parametros, Parametros::$params );
		$this->irAlFormulario( null );
	}

    function action_delete( $objeto = null, $listar = true, $listadoFiltrado = null ) {
		//PARTE GENERICA
		$parametros = $this->request->param( Parametros::$params );
		$id = Parametros::getValueFromParam( $parametros, Parametros::$params );
		$objeto = ORM::factory( $this->nombreTabla, $id );
		if(!is_null($objeto)) {
			$this->idExpediente = $objeto->expediente;
			$expediente = $this->obtenerExpediente($objeto->expediente);
			if(!is_null($expediente)) {
				$objeto->delete();
			}
		}
		$this->action_index();
	}

	private function irAlFormulario( $objeto ) {
		$this->iniciarVistas( $this );
		$this->template = View::factory( 'templates/template' );

		if( $objeto == null ) {
			$objeto = ORM::factory( $this->nombreTabla );
			$objeto->expediente = $this->idExpediente;
		}
        $permisos = ORM::factory( "permisorotura" )->find_all();
        //$reparaciones = ORM::factory( "reparacion" )->find_all();
        $adicionales = ORM::factory( "obrasadicional" )->find_all();
        $aguas = ORM::factory( "agua" )->find_all();
        $cloacas = ORM::factory( "cloacas" )->find_all();

		$this->visor->setObjeto( $objeto );

		$body = View::factory( $this->formulario )
            ->bind( "visor", $this->visor )
            ->bind( "permisos", $permisos )
            //->bind( "reparaciones", $reparaciones )
            ->bind( "adicionales", $adicionales )
            ->bind( "aguas", $aguas )
            ->bind( "cloacas", $cloacas )
            ->bind( "isAdmin", $this->isAdmin );
		$this->template->head = View::factory( $this->head )->bind( "visor", $this->visorHead );
		$this->template->body = $body;
	}
}
?>