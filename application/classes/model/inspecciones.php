<?php defined('SYSPATH') or die('No direct script access.');
require_once 'application/classes/model/modelo.php';
require_once 'application/classes/util/dateUtil.php';

//// Importante el nombre de nuestra  clase debe de llevar la siguiente sintaxis
////  Model_<Nombre_de_la_tabla>
class Model_Inspecciones extends Modelo {
	protected $_table_names_plural = false;
/// Ojo con esto este campo es true por default pero hace que Kohana maneje a su gusto
/// Los nombres de la tablas agregándole "s" o "es" a las mismas
/// Es decir trata de pluralizar el nombre automáticamente, puede que sea muy útil
/// Pero en lo personal no me gusta prefiero yo usar lo nombres a mi gusto
/// Por ello con esta indicación le decimos a kohana:
/// "Deja el nombre de la tabla como se llama la clase y no le hagas cambios"

	protected $_primary_key = 'idinspeccion';      // default: id

	protected $_sorting  = array( 'idinspeccion' => 'ASC' );

	protected $_belongs_to = array(
		'gremioobservacion' => array(
			'model' => 'Gremioobservacion',
			'foreign_key' => 'idgremioobs' ),
		'usuario' => array(
				'model' => 'Usuario',
				'foreign_key' => 'idusuario' ),
		'inspeccionobra' => array(
				'model' => 'Inspeccionesobra',
				'foreign_key' => 'idlistado' ),
		'nivel' => array(
			'model' => 'Nivel',
			'foreign_key' => 'idnivel' )
	);

	public function getFechasolicitudStr() {
		return $this->fechaToStr( $this->fechasolicitud );
	}
	public function getFechainspeccionStr() {
		return $this->fechaToStr( $this->fechainspeccion );
	}
	// public function getFechaEfectivainspeccionStr() {
	// 	return $this->fechaToStr( $this->fechaefectivainspeccion );
	// }


	public function getCartelStr() {
		return (strcmp("1",$this->cartel) == 0) ? "Si" : "No";
	}

	public function getInspeccionesSolicitadas($idExpediente) {
		$inspecciones = array();

		$inspecciones = ORM::factory($this->_table_name)
			->where("idexpte", "=", $idExpediente)
			->find_all();

		return $inspecciones;
	}

	public function filtrarInspeccionesSolicitadas($fechaInicial, $fechaFinal, $iddistrito) {
		$inspecciones = ORM::factory($this->_table_name);
		$dateUtil = new DateUtil();

		if(strcmp("", $fechaInicial) != 0) {
			$inspecciones->where("fechainspeccion", ">=", $dateUtil->stringVistaToStringBD($fechaInicial));
		}

		if(strcmp("", $fechaFinal) != 0) {
			$inspecciones->where("fechainspeccion", "<=", $dateUtil->stringVistaToStringBD($fechaFinal));
		}

		if(strcmp("", $iddistrito) != 0) {
			//$inspecciones->where("fechainspeccion", ">=", $iddistrito);
		}

		return $inspecciones->find_all();
	}
}
?>