<?php defined('SYSPATH') or die('No direct script access.');

require_once 'application/classes/view/VistaHead.php';
require_once 'application/classes/controller/base/controllerBase.php';

class Panel extends ControllerBase {
	private $nombreTabla = "menu";
	protected $panelView;
	protected $menu;

	function __construct($request, $response) {
		parent::__construct($request, $response);

		$this->menu = ORM::factory($this->nombreTabla);
		$this->panelView = "panel/panel";
	}

	protected function listar( $opcionesPanel = null ) {
		$this->iniciarHead();
		$this->template = View::factory( 'templates/template' );
		$opciones = array();

		if(!is_null($opcionesPanel)) {
			$opciones = $opcionesPanel;
		}

		$this->template->head = View::factory( $this->head )
			->bind( "visor", $this->visorHead );
		$this->template->body = View::factory( $this->panelView )
			->bind( "opciones", $opciones );
	}

	protected function iniciarHead() {
		//PARTE GENERICA
		$this->visorHead = new VistaHead();
		//titulo de la pagina.-
		$this->visorHead->setTitulo( $this->titulo );
	}
}
?>