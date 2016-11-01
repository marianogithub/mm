<?php defined('SYSPATH') or die('No direct script access.');
require_once 'application/classes/model/modelo.php';
require_once 'application/classes/util/dateUtil.php';
require_once 'application/classes/util/numberUtil.php';

/**
 *
 */
//// Importante el nombre de nuestra  clase debe de llevar la siguiente sintaxis
////  Model_<Nombre_de_la_tabla>
class Model_Remuneracion extends Modelo{

	protected $_table_names_plural = false;
/// Ojo con esto este campo es true por default pero hace que Kohana maneje a su gusto
/// Los nombres de la tablas agregándole "s" o "es" a las mismas
/// Es decir trata de pluralizar el nombre automáticamente, puede que sea muy útil
/// Pero en lo personal no me gusta prefiero yo usar lo nombres a mi gusto
/// Por ello con esta indicación le decimos a kohana:
/// "Deja el nombre de la tabla como se llama la clase y no le hagas cambios"

	protected $_primary_key = 'idremuneracion';      // default: id

	protected $_sorting  = array( 'mes' => 'ASC', 'anio' => 'ASC', 'idremuneracion' => 'ASC' );

	protected $_belongs_to = array(
		'personal' => array(
			'model' => 'Personal',
			'foreign_key' => 'idpersonal' )
	);

	/*public function getFechaStr() {
		return $this->fechaToStr( $this->fechapago );
	}*/

	public function getImporteStr() {
		return NumberUtil::format( $this->importe );
	}

	public function getMesStr() {
		return DateUtil::$meses[ $this->mes ];
	}

	public function getMesCortoStr() {
		return DateUtil::$mesesCorto[ $this->mes ];
	}

	public function obtenerRemuneraciones( $mes, $anio ) {

		$gastos = ORM::factory( $this->_table_name );

		$gastos->where( "anio", "=", $anio );
		if( $mes > 0 ) {
			$gastos->and_where( "mes", "=", $mes );
		}

		return $gastos->find_all();
	}

	public function save(Validation $validation = NULL) {

		//el mes es obligatorio [1-12]
		if( $this->mes == null || $this->mes < 1 || $this->mes > 12 ) {
			$this->addError( "El mes es incorrecto (" . $this->mes . ")" );
		}

		//el anio es obligatorio
		$anioCargado = ORM::factory( "Anio", $this->anio );
		if( is_null( $anioCargado->idanio ) ) {
			$this->addError( "El a�o es obligatorio." );
		}

		//el personal es obligatorio
		$this->personal = ORM::factory( "Personal", $this->idpersonal );
		if( is_null( $this->personal->idpersonal ) ) {
			$this->addError( "El personal es obligatorio." );
		}

		//El importe ingresado no es v�lido
		if( is_null( $this->importe ) || !is_numeric( $this->importe ) || $this->importe < 0 ) {
			$this->addError( "El importe ingresado no es v�lido ($this->importe)." );
		}

		//No puede superar la fecha indicada en el cierre.-
		$cierre = ORM::factory( "cierre" )->obtenerSueldos();
		if( !is_null( $cierre ) ) {
			$anio = intval($cierre->getAnio());
			$mes = intval( $cierre->getMes() );
			$anioElegido = intval($this->anio);
			$mesElegido = intval($this->mes);
			if( $anio > $anioElegido || ( $anio == $anioElegido && $mes > $mesElegido ) ) {
				$mesStr = DateUtil::$meses[ $mesElegido ];
				$this->addError( "El per�odo $mesStr de $anioElegido no es v�lido ." );
			}
		}

		if( sizeof( $this->getErrores() ) == 0 ) {
			parent::save( $validation );
		}
	}
}
?>