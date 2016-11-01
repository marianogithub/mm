<?php defined('SYSPATH') or die('No direct script access.');

require_once 'application/classes/Parametros.php';
require_once 'application/classes/view/VistaGenerica.php';
require_once 'application/classes/view/VistaHead.php';
require_once 'application/classes/util/menuVista.php';
require_once 'application/classes/controller/panel.php';

class Controller_Panelexpediente extends Panel {
	function __construct($request, $response) {
		parent::__construct($request, $response);

		$this->titulo = "Panel Expediente";
		//$this->panelView = "panel/panelExpediente";
	}

	function action_index() {
		$opciones = null;
		$this->listar($this->menu->getPanelExpediente());
	}
}
?>