<?php defined('SYSPATH') or die('No direct script access.');

class DateUtil
{
	public static $separadorDatePicker = "/";
	public static $formatoFechaBD = "Y-m-d H:i:s";
	public static $formatoFechaVista = "d/m/Y";
	public static $meses = array( "", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Setiembre", "Octubre", "Noviembre", "Diciembre" );
	public static $mesesCorto = array( "", "Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Set", "Oct", "Nov", "Dic" );

	public static function getFormatoDatePicker() {
		return "dd" . DateUtil::$separadorDatePicker . "mm" . DateUtil::$separadorDatePicker . "yy";
	}

	public function stringBDToStringVista( $valueStr ) {
		$valueTime = strtotime( $valueStr );
		return date( DateUtil::$formatoFechaVista, $valueTime );
	}

	public function stringVistaToStringBD( $valueStr ) {
		$arrayDate = explode( DateUtil::$separadorDatePicker, $valueStr );
		return date( DateUtil::$formatoFechaBD, mktime( 0, 0, 0, $arrayDate[1], $arrayDate[0], $arrayDate[2] ) );
	}

	public function getMesStr( $mes ) {
		$mesStr = "";

		if( $mes > 0 && $mes < 13 ) {
			$mesStr = DateUtil::$mesesCorto[ $mes ];
		}

		return $mesStr;
	}
}