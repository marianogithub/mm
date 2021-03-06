<?php defined('SYSPATH') or die('No direct script access.');
require_once 'application/classes/model/modelo.php';

//// Importante el nombre de nuestra  clase debe de llevar la siguiente sintaxis
////  Model_<Nombre_de_la_tabla>
class Model_Movimiento extends Modelo {
	protected $_table_names_plural = false;
/// Ojo con esto este campo es true por default pero hace que Kohana maneje a su gusto
/// Los nombres de la tablas agregándole "s" o "es" a las mismas
/// Es decir trata de pluralizar el nombre automáticamente, puede que sea muy útil
/// Pero en lo personal no me gusta prefiero yo usar lo nombres a mi gusto
/// Por ello con esta indicación le decimos a kohana:
/// "Deja el nombre de la tabla como se llama la clase y no le hagas cambios"

	protected $_primary_key = 'idmovimiento';      // default: id

	protected $_sorting  = array( 'fechaingreso' => 'DESC' );

	protected $_belongs_to = array(
		'expediente' => array(
			'model' => 'Expediente',
			'foreign_key' => 'idexpte' )
	);

	public function getFechaIngresoStr() {
		return $this->fechaToStr( $this->fechaingreso );
	}
	public function getFechaSalidaStr() {
		return $this->fechaToStr( $this->fechasalida );
	}
	public function getFechaEgresoStr() {
		return $this->fechaToStr( $this->fechaegreso );
	}

	public function getMovimientos($idExpediente) {
		$movimientos = array();

		$movimientos = ORM::factory($this->_table_name)
			->where("idexpte", "=", $idExpediente)
			->find_all();

		return $movimientos;
	}
}
?>