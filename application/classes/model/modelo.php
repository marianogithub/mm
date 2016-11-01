<?php defined('SYSPATH') or die('No direct script access.');
require_once 'application/classes/util/dateUtil.php';

class Modelo extends ORM
{
	private $errores = array();

	public function stringBDToStringVista( $valueStr ) {
		$dateUtil = new DateUtil();
		return $dateUtil->stringBDToStringVista( $valueStr );
	}

	public function stringVistaToStringBD( $valueStr ) {
		$dateUtil = new DateUtil();
		return $dateUtil->stringVistaToStringBD( $valueStr );
	}

	public function addError( $error ) {
		if( !is_null( $error ) && strcmp( "", $error ) != 0 ) {
			if( is_null( $this->errores ) ) {
				$this->errores = array();
			}

			$this->errores[ sizeof( $this->errores ) ] = $error;
		}
	}

	public function getErrores() {
		return $this->errores;
	}

	protected function fechaToStr( $fecha ) {
		$fechaStr = "";

		if( !is_null( $fecha ) ){
			$valueTime = strtotime( $fecha );
			$fechaStr = date( DateUtil::$formatoFechaVista, $valueTime );
		}

		return $fechaStr;
	}
}