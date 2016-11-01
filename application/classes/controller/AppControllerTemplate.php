<?php defined('SYSPATH') or die('No direct script access.');

require_once 'application/classes/Parametros.php';
require_once 'application/classes/view/VistaGenerica.php';
require_once 'application/classes/view/VistaHead.php';
require_once 'application/classes/util/menuVista.php';
require_once 'application/classes/util/labelABM.php';
require_once 'application/classes/controller/base/controllerBase.php';

class App_Controller_Template extends ControllerBase {
	protected $visor;                   //objeto que usamos para devolver las cosas a la pagina.-
	protected $encabezado;              //mensaje que se va a mostrar en el encabezado.-
	protected $nombreColumnas;          //nombres de las columnas que vamos a mostrar en el listado.-
	protected $nombreTabla;             //nombre de la tabla principal.-
	protected $nombreTablaAsociada;     //nombre de la tabla asociada a la principal.-
	protected $formulario;              //path del formulario para cargar los datos.-
	protected $listado;                 //path del listado de los datos.-
    protected $routeParams;             //nombre del path param donde vienen los parametros.-
    protected $queryParamName;          //nombre del query param para obtener el id.-
    //LABELS que mostramos en la página.-
    protected $labelABM;

    public function __construct(Request $request, Response $response) {
        parent::__construct($request, $response);
        $this->labelABM = ORM::factory("parametro")->getLabelABM();
        $this->routeParams = Parametros::$params;
        $this->queryParamName = Parametros::$params;
    }

    /////////////////FUNCIONALIDADES PUBLICAS A LOS CONTROLADORES/////////////////
    /**
     * Este metodo implementa la eliminacion para todos los controladores que hereden de la clase.-
     * Si no queremos que los controladores eliminen o queremos implementar una funcionalidad distinta, debemos sobreescribir el metodo en la subclase.-
     *
     * @param null $listar, true/false: determina si debemos llamar al metodo listar despues de eliminar.-
     * @param true $listadoFiltrado, el listado ya filtrado de lo que se quiere mostrar. Si es nulo, hace la llamada a la BD para listar.-
     */
    function action_delete( $objeto = null, $listar = true, $listadoFiltrado = null ) {
        $parametros = $this->request->param( $this->routeParams );
        $id = Parametros::getValueFromParam( $parametros, $this->queryParamName );

        if($objeto == null || !is_object($objeto)) {
            $objeto = ORM::factory( $this->nombreTabla, $id );
        }
        try {
            if( $objeto->pk() != null) {
                $objeto->delete();
            }
        } catch(Exception $e) {

        }

        if( $listar ) {
            $this->listar( $listadoFiltrado );
        }
    }

    /////////////////METODOS UTILES A LOS CONTROLADORES/////////////////

    /**
     *
     * @param null $listadoFiltrado
     */
    protected function listar( $listadoFiltrado = null ) {
		$this->template = View::factory( 'templates/template' );

		$this->iniciarVistas( $this );
		if( is_null($listadoFiltrado) ) {
			$listado = ORM::factory( $this->nombreTabla )->find_all();
		} else {
			$listado = $listadoFiltrado;
		}
		$this->visor->setListado( $listado );

		$this->template->head = View::factory( $this->head )->bind( "visor", $this->visorHead );
		$this->template->body = View::factory( $this->listado )->bind( "visor", $this->visor );
	}

    protected function redirigirAlListado($extraURL = null) {
        $controllerUtil = new ControllerUtil();
        $this->request->redirect( $controllerUtil->getControllerName(get_class($this)) . ($extraURL != null ? $extraURL : "") );
    }

	protected function iniciarVistas( $controller ) {
		$this->visorHead = new VistaHead();
		//titulo de la pagina.-
		$this->visorHead->setTitulo( $this->titulo );

		$this->visor = new VistaGenerica();
		//encabezado de la pagina.-
		$this->visor->setEncabezado( $this->encabezado );
		//columnas de la tabla.-
		$this->visor->setNombreColumnas( $this->nombreColumnas );
		//nombre de este controlador.-
		$this->visor->setNombreControlador( get_class($controller) );
        //etiquetas genericas
        $this->visor->setNuevoLabel($this->labelABM->nuevoLabel);
        $this->visor->setEditarLabel($this->labelABM->editarLabel);
        $this->visor->setEliminarLabel($this->labelABM->eliminarLabel);
        $this->visor->setConfirmarLabel($this->labelABM->confirmarLabel);
        $this->visor->setCancelarLabel($this->labelABM->cancelarLabel);
        $this->visor->setVolverLabel($this->labelABM->volverLabel);
        $this->visor->setConfirmSi($this->labelABM->confirmSi);
        $this->visor->setConfirmNo($this->labelABM->confirmNo);
        $this->visor->setConfirmMsj($this->labelABM->confirmMsj);
	}
}
?>