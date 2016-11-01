<?php defined('SYSPATH') or die('No direct script access.');
require_once 'application/classes/model/modelo.php';

//// Importante el nombre de nuestra  clase debe de llevar la siguiente sintaxis
////  Model_<Nombre_de_la_tabla>
class Model_Observacionexpte extends Modelo {
	protected $_table_names_plural = false;
/// Ojo con esto este campo es true por default pero hace que Kohana maneje a su gusto
/// Los nombres de la tablas agregándole "s" o "es" a las mismas
/// Es decir trata de pluralizar el nombre automáticamente, puede que sea muy útil
/// Pero en lo personal no me gusta prefiero yo usar lo nombres a mi gusto
/// Por ello con esta indicación le decimos a kohana:
/// "Deja el nombre de la tabla como se llama la clase y no le hagas cambios"

	protected $_primary_key = 'idobsexpte';      // default: id

	protected $_sorting  = array( 'fechaobs' => 'DESC' );

	protected $_belongs_to = array(
		'expediente' => array(
			'model' => 'Expedientes',
			'foreign_key' => 'expte' )
	);

	public function getFechaobsStr() {
		return $this->fechaToStr( $this->fechaobs );
	}
	public function getFechaaprobacionStr() {
		return $this->fechaToStr( $this->fechaaprobacion );
	}

	public function getObservaciones($idExpediente) {
		$observaciones = ORM::factory($this->_table_name)
			->where("expte", "=", $idExpediente)
			->find_all();

		return $observaciones;
	}
}
?>