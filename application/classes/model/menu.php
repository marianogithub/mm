<?php defined('SYSPATH') or die('No direct script access.');
require_once 'application/classes/model/modelo.php';
/**
 *
 */
//// Importante el nombre de nuestra  clase debe de llevar la siguiente sintaxis
////  Model_<Nombre_de_la_tabla>
class Model_Menu extends Modelo {
	private $submenus = null;
	protected $_table_names_plural = false;
/// Ojo con esto este campo es true por default pero hace que Kohana maneje a su gusto
/// Los nombres de la tablas agregándole "s" o "es" a las mismas
/// Es decir trata de pluralizar el nombre automáticamente, puede que sea muy útil
/// Pero en lo personal no me gusta prefiero yo usar lo nombres a mi gusto
/// Por ello con esta indicación le decimos a kohana:
/// "Deja el nombre de la tabla como se llama la clase y no le hagas cambios"

	protected $_primary_key = 'idmenu';      // default: id

	protected $_sorting  = array( 'visible' => 'DESC' );

	protected $_belongs_to = array(
		'padre' => array(
			'model' => 'Menu',
			'foreign_key' => 'idpadre' ),
		'tipoMenu' => array(
			'model' => 'Tipomenu',
			'foreign_key' => 'idtipomenu' )
	);

	public function delete() {
		$objeto = ORM::factory( $this->_table_name, $this->idmenu );

		$objeto->visible = 0;

		$objeto->save();
	}

	public function obtenerMenuActivos()
	{
		$menus = ORM::factory( $this->_table_name )->where( "visible", "=", "1" );

		return $menus->find_all();
	}

	public function getSubmenus() {
		return $this->submenus;
	}

	public function setSubmenus( $submenusParam ) {
		$this->submenus = $submenusParam;
	}

	public function getMenusExpediente() {
		return $this->getMenusPorTipo(ORM::factory( "Tipomenu" )->expediente, "1");
	}

	public function getPanelTemporal() {
		return $this->getMenusPorTipo(ORM::factory( "Tipomenu" )->panelTemporal, "1");
	}

	public function getPanelExpediente() {
		return $this->getMenusPorTipo(ORM::factory( "Tipomenu" )->panelExpediente, "1");
	}

	public function getMenusPorTipo($tipo, $visible) {
		$menus = ORM::factory( $this->_table_name )->where( $this->_primary_key, "IS NOT", null );
		if($tipo != null) {
			$menus->and_where( "idtipomenu", "=", $tipo );
		}
		if($visible != null) {
			$menus->and_where( "visible", "=", $visible );
		}

		return $menus->find_all();
	}
}
?>