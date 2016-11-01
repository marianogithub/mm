<?php defined('SYSPATH') or die('No direct script access.');
require_once 'application/classes/model/modelo.php';

//// Importante el nombre de nuestra  clase debe de llevar la siguiente sintaxis
////  Model_<Nombre_de_la_tabla>
class Model_Inspeccionesobra extends Modelo {
	protected $_table_names_plural = false;
/// Ojo con esto este campo es true por default pero hace que Kohana maneje a su gusto
/// Los nombres de la tablas agregándole "s" o "es" a las mismas
/// Es decir trata de pluralizar el nombre automáticamente, puede que sea muy útil
/// Pero en lo personal no me gusta prefiero yo usar lo nombres a mi gusto
/// Por ello con esta indicación le decimos a kohana:
/// "Deja el nombre de la tabla como se llama la clase y no le hagas cambios"

	protected $_primary_key = 'idlistado';      // default: id

	protected $_sorting  = array( 'idlistado' => 'ASC' );

	protected $_belongs_to = array(
		'gremioObservacion' => array(
			'model' => 'Gremioobservacion',
			'foreign_key' => 'idgremioobs' )
	);

	public function getInspeccionesFiltradas($idgremioobs) {
		return ORM::factory($this->_table_name)->where("idgremioobs", "=", $idgremioobs)->find_all();
	}
}
?>